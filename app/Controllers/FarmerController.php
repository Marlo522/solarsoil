<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\CartItemModel;
use App\Models\UserModel;

class FarmerController extends BaseController
{
    protected $productModel;
    protected $orderModel;
    protected $cartItemModel;
    protected $userModel;

    public function __construct()
    {
        $this->productModel  = model('ProductModel');
        $this->orderModel    = model('OrderModel');
        $this->cartItemModel = model('CartItemModel');
        $this->userModel     = model('UserModel');
    }

    public function index()
{
    $userId = session()->get('user_id');

    // Farmer products
    $farmerProducts = $this->productModel
        ->where('user_id', $userId)
        ->findAll();

    $totalProducts = count($farmerProducts);

    $farmerProductIds = array_column($farmerProducts, 'product_id');

    $ordersToday = 0;
    $pendingOrders = 0;

    if (!empty($farmerProductIds)) {

        $cartItems = $this->cartItemModel
            ->whereIn('product_id', $farmerProductIds)
            ->where('order_id IS NOT NULL')
            ->findAll();

        $orderIds = array_unique(array_column($cartItems, 'order_id'));

        foreach ($orderIds as $orderId) {

            $order = $this->orderModel
                ->where('order_id', $orderId)
                ->first();

            if (!$order) continue;

            // orders today
            if (date('Y-m-d', strtotime($order['created_at'])) === date('Y-m-d')) {
                $ordersToday++;
            }

            // pending orders
            if (($order['status'] ?? '') === 'pending') {
                $pendingOrders++;
            }
        }
    }

    $stats = [
        [
            'label' => 'Orders Today',
            'value' => $ordersToday,
            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z"/></svg>',
            'color' => 'bg-blue-50 text-blue-600'
        ],
        [
            'label' => 'Pending Orders',
            'value' => $pendingOrders,
            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
            'color' => 'bg-amber-50 text-amber-600'
        ],
        [
            'label' => 'Total Products',
            'value' => $totalProducts,
            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>',
            'color' => 'bg-primary-50 text-primary-600'
        ]
    ];

    return view('farmer/dashboard', [
        'title' => 'Farmer Dashboard',
        'farmerProducts' => $farmerProducts,
        'totalProducts' => $totalProducts,
        'stats' => $stats
    ]);
}

    public function products()
    {
        $userId = session()->get('user_id');

        $products = $this->productModel
            ->where('user_id', $userId)
            ->orderBy('product_id', 'DESC')
            ->findAll();

        // Add status based on stock
        foreach ($products as &$product) {
            $product['status'] = ($product['stock_quantity'] ?? 0) > 0 ? 'active' : 'out_of_stock';
        }

        return view('farmer/products', [
            'title'    => 'My Products - SolarSoil',
            'products' => $products,
        ]);
    }

    public function productDetail(int $id)
    {
        $product = $this->productModel
            ->where('product_id', $id)
            ->where('user_id', session()->get('user_id'))
            ->first();

        if (!$product) {
            return redirect()->to(base_url('farmer/products'));
        }

        $product['status'] = ($product['stock_quantity'] ?? 0) > 0 ? 'active' : 'out_of_stock';

        return view('farmer/product_detail', [
            'title'   => 'Product #PRD' . $id . ' - SolarSoil',
            'product' => $product,
        ]);
    }

    public function orders()
    {
        $userId = session()->get('user_id');

        // Get all products belonging to this farmer
        $farmerProductIds = array_column(
            $this->productModel->where('user_id', $userId)->findAll(),
            'product_id'
        );

        $orders = [];

        if (!empty($farmerProductIds)) {
            // Find cart items that contain this farmer's products and have an order_id
            $cartItems = $this->cartItemModel
                ->whereIn('product_id', $farmerProductIds)
                ->where('order_id IS NOT NULL')
                ->findAll();

            // Group by order_id
            $orderIds = array_unique(array_column($cartItems, 'order_id'));

            foreach ($orderIds as $orderId) {
                $order = $this->orderModel->where('order_id', $orderId)->first();
                if (!$order) continue;

                $consumer = $this->userModel->where('user_id', $order['user_id'])->first();
                $order['consumer_name'] = $consumer
                    ? $consumer['first_name'] . ' ' . $consumer['last_name']
                    : 'Unknown';

                // Calculate total for this farmer's items only
                $orderCartItems = array_filter($cartItems, fn($ci) => $ci['order_id'] == $orderId);
                $subtotal = 0;
                $productNames = [];
                foreach ($orderCartItems as $ci) {
                    $product = $this->productModel->where('product_id', $ci['product_id'])->first();
                    if ($product) {
                        $subtotal += $product['price'] * $ci['quantity'];
                        $productNames[] = $product['name'];
                    }
                }

                $order['total_amount'] = $subtotal;
                $order['products'] = implode(', ', $productNames);

                $orders[] = $order;
            }

            // Sort newest first
            usort($orders, fn($a, $b) => ($b['order_id'] ?? 0) - ($a['order_id'] ?? 0));
        }

        return view('farmer/orders', [
            'title'  => 'My Orders - SolarSoil',
            'orders' => $orders,
        ]);
    }

    public function orderDetail(int $id)
    {
        $userId = session()->get('user_id');
        $order  = $this->orderModel->where('order_id', $id)->first();

        if (!$order) {
            return redirect()->to(base_url('farmer/orders'));
        }

        $consumer = $this->userModel->where('user_id', $order['user_id'])->first();

        // Get only this farmer's items in the order
        $farmerProductIds = array_column(
            $this->productModel->where('user_id', $userId)->findAll(),
            'product_id'
        );

        $cartItems  = [];
        $orderItems = [];
        $subtotal   = 0;

        if (!empty($farmerProductIds)) {
            $cartItems = $this->cartItemModel
                ->where('order_id', $id)
                ->whereIn('product_id', $farmerProductIds)
                ->findAll();

            foreach ($cartItems as $ci) {
                $product = $this->productModel->where('product_id', $ci['product_id'])->first();
                if ($product) {
                    $itemTotal    = $product['price'] * $ci['quantity'];
                    $orderItems[] = [
                        'product_id' => $product['product_id'],
                        'name'       => $product['name'],
                        'image'      => $product['image'],
                        'price'      => $product['price'],
                        'quantity'   => $ci['quantity'],
                        'subtotal'   => $itemTotal,
                    ];
                    $subtotal += $itemTotal;
                }
            }
        }

        $shippingFee = 0;
        if (($order['shipping_method'] ?? '') == 'Standard Shipping') {
            $shippingFee = 50.00;
        } elseif (($order['shipping_method'] ?? '') == 'Express Shipping') {
            $shippingFee = 150.00;
        }

        return view('farmer/order_detail', [
            'title'       => 'Order #ORD' . $id . ' - SolarSoil',
            'order'       => $order,
            'consumer'    => $consumer,
            'orderItems'  => $orderItems,
            'subtotal'    => $subtotal,
            'shippingFee' => $shippingFee,
            'orderStatus' => $order['status'] ?? 'pending',
        ]);
    }

    public function addProduct()
    {
        $productModel = new ProductModel();

        $image = $this->request->getFile('image');
        $imageName = null;

        if ($image && $image->isValid() && !$image->hasMoved()) {

            $imageName = $image->getRandomName();

            $image->move(ROOTPATH . 'public/uploads/products', $imageName);
        }

        $data = [
            'user_id' => session()->get('user_id'),
            'name' => $this->request->getPost('name'),
            'category' => $this->request->getPost('category'),
            'price' => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName
        ];

        $productModel->insert($data);

        return redirect()->to(base_url('farmer/dashboard'));
    }

    public function editProduct($id)
{
    $productModel = new ProductModel();

    $product = $productModel->find($id);

    $data = [
        'name' => $this->request->getPost('name'),
        'category' => $this->request->getPost('category'),
        'price' => $this->request->getPost('price'),
        'stock_quantity' => $this->request->getPost('stock_quantity'),
        'description' => $this->request->getPost('description')
    ];

    $image = $this->request->getFile('image');

    if ($image && $image->isValid() && !$image->hasMoved()) {

        $imageName = $image->getRandomName();

        $image->move(ROOTPATH . 'public/uploads/products', $imageName);

        // delete old image
        if (!empty($product['image'])) {
            $oldPath = ROOTPATH . 'public/uploads/products/' . $product['image'];
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $data['image'] = $imageName;
    }

    $productModel->update($id, $data);

    return redirect()->to(base_url('farmer/dashboard'));
}

public function deleteProduct($id)
{
    $productModel = new ProductModel();

    $product = $productModel->find($id);

    if ($product) {

        // delete image if exists
        if (!empty($product['image'])) {
            $imagePath = FCPATH . 'uploads/products/' . $product['image'];

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $productModel->delete($id);
    }

    return redirect()->to(base_url('farmer/dashboard'));
}


}