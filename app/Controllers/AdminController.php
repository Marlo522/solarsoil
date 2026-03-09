<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\CartItemModel;


class AdminController extends BaseController
{
    protected $userModel;
    protected $productModel;
    protected $orderModel;
    protected $cartItemModel;
    protected int $perPage = 10;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->orderModel = new OrderModel();
        $this->cartItemModel = new CartItemModel();
    }

    public function farmers()
    {
        $page = max(1, (int) ($this->request->getGet('page') ?? 1));
        $offset = ($page - 1) * $this->perPage;

        $farmers = $this->userModel
            ->where('role', 'seller')
            ->orderBy('user_id', 'DESC')
            ->findAll($this->perPage, $offset);

        $totalFarmers = $this->userModel->where('role', 'seller')->countAllResults(false);
        $totalPages = max(1, (int) ceil($totalFarmers / $this->perPage));

        return view('admin/farmers', [
            'title'       => 'Farmer Management - SolarSoil',
            'farmers'     => $farmers,
            'currentPage' => $page,
            'totalPages'  => $totalPages,
            'pager'       => $totalPages > 1,
        ]);
    }

    public function farmerDetail(int $id)
    {
        $farmer = $this->userModel->where('user_id', $id)->where('role', 'seller')->first();

        if (!$farmer) {
            return redirect()->to(base_url('admin/farmers'))->with('error', 'Farmer not found.');
        }

        $totalProducts = 0;
        $totalOrders = 0;

        return view('admin/farmer_detail', [
            'title'         => 'Farmer #FRM' . $id . ' - SolarSoil',
            'farmer'        => $farmer,
            'totalProducts' => $totalProducts,
            'totalOrders'   => $totalOrders,
        ]);
    }

    public function consumers()
    {
        $page = max(1, (int) ($this->request->getGet('page') ?? 1));
        $offset = ($page - 1) * $this->perPage;

        $consumers = $this->userModel
            ->where('role', 'consumer')
            ->orderBy('user_id', 'DESC')
            ->findAll($this->perPage, $offset);

        $totalConsumers = $this->userModel->where('role', 'consumer')->countAllResults(false);
        $totalPages = max(1, (int) ceil($totalConsumers / $this->perPage));

        return view('admin/consumers', [
            'title'       => 'Consumer Management - SolarSoil',
            'consumers'   => $consumers,
            'currentPage' => $page,
            'totalPages'  => $totalPages,
            'pager'       => $totalPages > 1,
        ]);
    }

    public function consumerDetail(int $id)
    {
        $consumer = $this->userModel->where('user_id', $id)->where('role', 'consumer')->first();

        if (!$consumer) {
            return redirect()->to(base_url('admin/consumers'))->with('error', 'Consumer not found.');
        }

        $totalOrders = 0;

        return view('admin/consumer_detail', [
            'title'       => 'Consumer #CMR' . $id . ' - SolarSoil',
            'consumer'    => $consumer,
            'totalOrders' => $totalOrders,
        ]);
    }

    public function orders()
    {
        $page = max(1, (int) ($this->request->getGet('page') ?? 1));
        $offset = ($page - 1) * $this->perPage;

        $orders = $this->orderModel->orderBy('order_id', 'DESC')->findAll($this->perPage, $offset);
        $totalOrders = $this->orderModel->countAllResults(false);
        $totalPages = max(1, (int) ceil($totalOrders / $this->perPage));

        // Enrich orders with consumer info and calculate totals
        foreach ($orders as &$order) {
            // Get consumer information
            $consumer = $this->userModel->where('user_id', $order['user_id'])->first();
            $order['consumer_name'] = $consumer ? $consumer['first_name'] . ' ' . $consumer['last_name'] : 'Unknown';
            
            // Calculate total amount from cart items
            $cartItems = $this->cartItemModel->where('order_id', $order['order_id'])->findAll();
            $subtotal = 0;
            
            foreach ($cartItems as $item) {
                $product = $this->productModel->where('product_id', $item['product_id'])->first();
                if ($product) {
                    $subtotal += $product['price'] * $item['quantity'];
                }
            }
            
            // Add shipping fee
            $shippingFee = 0;
            if ($order['shipping_method'] == 'Standard Shipping') {
                $shippingFee = 50.00;
            } elseif ($order['shipping_method'] == 'Express Shipping') {
                $shippingFee = 150.00;
            }
            
            $order['total_amount'] = $subtotal + $shippingFee;
        }

        return view('admin/orders', [
            'title' => 'Order Management - SolarSoil',
            'orders' => $orders,
            'currentPage' => $page,
            'totalPages' => $totalPages,
        ]);
    }

    public function order_detail(int $id)
    {
        $order = $this->orderModel->where('order_id', $id)->first();

        if (!$order) {
            return redirect()->to(base_url('admin/orders'))->with('error', 'Order not found.');
        }
        
        $consumer = $this->userModel->where('user_id', $order['user_id'])->first();

        
        // Get cart items for this order
        $cartItems = $this->cartItemModel->where('order_id', $id)->findAll();
        
        // Fetch product details for each cart item and calculate total
        $orderItems = [];
        $subtotal = 0;
        
        foreach ($cartItems as $item) {
            $product = $this->productModel->where('product_id', $item['product_id'])->first();
            if ($product) {
                // Get farmer/seller information
                $farmer = $this->userModel->where('user_id', $product['user_id'])->first();
                $farmerName = $farmer ? $farmer['first_name'] . ' ' . $farmer['last_name'] : 'Unknown';
                
                $itemTotal = $product['price'] * $item['quantity'];
                $orderItems[] = [
                    'product_id' => $product['product_id'],
                    'name' => $product['name'],
                    'image' => $product['image'],
                    'price' => $product['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $itemTotal,
                    'farmer' => $farmerName
                ];
                $subtotal += $itemTotal;
            }
        }
        
        // Calculate shipping fee based on shipping method
        $shippingFee = 0;
        if ($order['shipping_method'] == 'Standard Shipping') {
            $shippingFee = 50.00;
        } elseif ($order['shipping_method'] == 'Express Shipping') {
            $shippingFee = 150.00;
        }
        
        $totalAmount = $subtotal + $shippingFee;
        
        // Get order status
        $orderStatus = $order['status'] ?? 'pending';

        return view('admin/order_detail', [
            'title' => 'Order #ORD' . $id . ' - SolarSoil',
            'order' => $order,
            'consumer' => $consumer,
            'orderItems' => $orderItems,
            'subtotal' => $subtotal,
            'shippingFee' => $shippingFee,
            'totalAmount' => $totalAmount,
            'orderStatus' => $orderStatus
        ]);
    }
}
