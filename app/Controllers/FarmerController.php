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
        $farmerProducts = $this->productModel
            ->where('user_id', session()->get('user_id'))
            ->findAll();
        $totalProducts = count($farmerProducts);

        return view('farmer/dashboard', [
            'title'          => 'Farmer Dashboard - SolarSoil',
            'farmerProducts' => $farmerProducts,
            'totalProducts'  => $totalProducts,
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