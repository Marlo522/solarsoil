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
        return view('pages/products', ['pageTitle' => 'Products']);
    }

    public function productDetail(int $id): string
    {
        return view('pages/product_detail', ['pageTitle' => 'Product Detail', 'productId' => $id]);
    }

    public function about(): string
    {
        return view('pages/home', ['pageTitle' => 'About']);
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
        return view('pages/cart', ['pageTitle' => 'Cart']);
    }

    public function checkout(): string
    {
        return view('pages/checkout', ['pageTitle' => 'Checkout']);
    }

    public function profile(): string
    {
        return view('pages/profile', ['pageTitle' => 'Profile']);
    }

    public function farmerDashboard(): string
    {
        return view('dashboard/farmer_dashboard', ['pageTitle' => 'Farmer Dashboard']);
    }

    public function adminDashboard(): string
    {
        return view('dashboard/admin_dashboard', ['pageTitle' => 'Admin Dashboard']);
    }

    public function farmerProfile(): string
    {
        return view('dashboard/farmer_profile', ['pageTitle' => 'Profile']);
    }

    public function adminProfile(): string
    {
        return view('admin/admin_profile', ['pageTitle' => 'Profile']);
    }
}
