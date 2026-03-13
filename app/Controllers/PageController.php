<?php

namespace App\Controllers;

class PageController extends BaseController
{
    public function home(): string
    {
        return view('pages/home', ['pageTitle' => 'Home']);
    }

    public function products(): string
    {
        $productModel = new \App\Models\ProductModel();

        $category = $this->request->getGet('category');

        if ($category && $category !== 'All') {
            $productModel->where('category', $category);
        }

        $products = $productModel->where('isDeleted', 0)->findAll();

        return view('pages/products', [
            'pageTitle' => 'Products',
            'products' => $products,
            'selectedCategory' => $category ?? 'All'
        ]);
    }

    public function productDetail(int $id): string
    {
        $productModel = new \App\Models\ProductModel();

        $product = $productModel->where('product_id', $id)
            ->where('isDeleted', 0)
            ->first();

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Product not found.');
        }

        return view('pages/product_detail', [
            'pageTitle' => $product['name'] . ' - Product Detail',
            'product' => $product
        ]);
    }

    public function about(): string
    {
        return view('pages/about', ['pageTitle' => 'About']);
    }

    public function login(): string
    {
        return view('pages/login', ['pageTitle' => 'Login']);
    }

    public function register(): string
    {
        return view('pages/register', ['pageTitle' => 'Register']);
    }

    public function cart(): string
    {
        $userId = session()->get('user_id');
        $cartItems = [];

        if ($userId) {
            $cartModel = new \App\Models\CartModel();
            $cartItemModel = new \App\Models\CartItemModel();

            $cart = $cartModel->where('user_id', $userId)->first();

            if ($cart) {
                // Fetch active cart items and join with products
                $cartItems = $cartItemModel
                    ->select('cart_items.*, products.name as product_name, products.image as product_image, products.price')
                    ->join('products', 'products.product_id = cart_items.product_id')
                    ->where('cart_items.cart_id', $cart['cart_id'])
                    ->where('cart_items.inCart', 1)
                    ->findAll();

                // Add subtotal for each item
                foreach ($cartItems as &$item) {
                    $item['subtotal'] = $item['quantity'] * $item['price'];
                }
            }
        }

        return view('pages/cart', [
            'pageTitle' => 'Cart',
            'cartItems' => $cartItems
        ]);
    }

    public function checkout()
    {
        $userId = session()->get('user_id');
        $cartItems = [];

        if ($userId) {
            $cartModel = new \App\Models\CartModel();
            $cartItemModel = new \App\Models\CartItemModel();

            $cart = $cartModel->where('user_id', $userId)->first();

            if ($cart) {
                // Fetch active cart items and join with products
                $cartItems = $cartItemModel
                    ->select('cart_items.*, products.name as product_name, products.image as product_image, products.price')
                    ->join('products', 'products.product_id = cart_items.product_id')
                    ->where('cart_items.cart_id', $cart['cart_id'])
                    ->where('cart_items.inCart', 1)
                    ->findAll();

                // Add subtotal for each item
                foreach ($cartItems as &$item) {
                    $item['subtotal'] = $item['quantity'] * $item['price'];
                }
            }
        }

        if (empty($cartItems)) {
            return redirect()->to('/cart')->with('error', 'Your cart is empty.');
        }

        return view('pages/checkout', [
            'pageTitle' => 'Checkout',
            'cartItems' => $cartItems
        ]);
    }

    public function processCheckout()
    {
        $validationRules = [
            'full_name' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'email' => 'required|valid_email',
            'payment_method' => 'required',
            'shipping_method' => 'required',
            'shipping_cost' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'total_amount' => 'required|numeric'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('error', 'Please fill all required fields correctly.');
        }

        $sessionData = $this->request->getPost();
        session()->set('checkout_data', $sessionData);

        return redirect()->to('/confirmation');
    }

    public function confirmation()
    {
        $checkoutData = session()->get('checkout_data');
        if (!$checkoutData) {
            return redirect()->to('/checkout')->with('error', 'Please complete the checkout form first.');
        }

        $userId = session()->get('user_id');
        $cartItems = [];

        if ($userId) {
            $cartModel = new \App\Models\CartModel();
            $cartItemModel = new \App\Models\CartItemModel();

            $cart = $cartModel->where('user_id', $userId)->first();

            if ($cart) {
                $cartItems = $cartItemModel
                    ->select('cart_items.*, products.name as product_name, products.image as product_image, products.price')
                    ->join('products', 'products.product_id = cart_items.product_id')
                    ->where('cart_items.cart_id', $cart['cart_id'])
                    ->where('cart_items.inCart', 1)
                    ->findAll();

                foreach ($cartItems as &$item) {
                    $item['subtotal'] = $item['quantity'] * $item['price'];
                }
            }
        }

        if (empty($cartItems)) {
            return redirect()->to('/cart')->with('error', 'Your cart is empty.');
        }

        return view('pages/confirmation', [
            'pageTitle' => 'Order Confirmation',
            'checkoutData' => $checkoutData,
            'cartItems' => $cartItems
        ]);
    }

    public function placeOrder()
    {
        $userId = session()->get('user_id');
        $checkoutData = session()->get('checkout_data');

        if (!$userId || !$checkoutData) {
            return redirect()->to('/checkout')->with('error', 'Session expired or invalid. Please try again.');
        }

        $cartModel = new \App\Models\CartModel();
        $cartItemModel = new \App\Models\CartItemModel();
        $orderModel = new \App\Models\OrderModel();

        // 1. Get current cart
        $currentCart = $cartModel->where('user_id', $userId)->first();

        if (!$currentCart) {
            return redirect()->to('/')->with('error', 'No active cart found.');
        }

        // 2. Create the Order record
        $orderData = [
            'user_id' => $userId,
            'cart_id' => $currentCart['cart_id'], // Link to the original cart for record keeping
            'shipping_method' => $checkoutData['shipping_method'] ?? 'standard',
            'payment_method' => $checkoutData['payment_method'] ?? 'cod',
            'status' => 'Pending',
            'created_at' => date('Y-m-d H:i:s'),
            'isCompleted' => 0,
            'total' => $checkoutData['total_amount'] ?? 0
        ];

        $orderId = $orderModel->insert($orderData);

        if (!$orderId) {
            return redirect()->to('/checkout')->with('error', 'Failed to place order. Please try again.');
        }

        // 3. Update Cart Items (Link to order, remove from active cart view)
        $cartItemModel->where('cart_id', $currentCart['cart_id'])
            ->where('inCart', 1)
            ->set(['inCart' => 0, 'order_id' => $orderId])
            ->update();

        // 4. Create a NEW empty cart for the user for their next shopping session
        $cartModel->insert(['user_id' => $userId]);

        // Clean up session
        session()->remove('checkout_data');

        return redirect()->to('/')->with('success', 'Order placed successfully!');
    }

    public function profile(): string
    {
        return view('pages/profile', ['pageTitle' => 'Profile']);
    }

    public function adminDashboard(): string
    {
        return view('admin/dashboard', ['pageTitle' => 'Admin Dashboard']);
    }

    public function farmerProfile(): string
    {
        return view('farmer/profile', ['pageTitle' => 'Profile']);
    }
}
