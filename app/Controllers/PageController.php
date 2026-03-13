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

    public function checkout(): string
    {
        return view('pages/checkout', ['pageTitle' => 'Checkout']);
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
