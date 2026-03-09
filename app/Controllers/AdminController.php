<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\OrderModel;

class AdminController extends BaseController
{
    protected $userModel;
    protected $productModel;
    protected $orderModel;
    protected int $perPage = 10;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->orderModel = new OrderModel();
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
}
