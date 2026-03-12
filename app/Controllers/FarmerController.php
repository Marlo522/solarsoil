<?php

namespace App\Controllers;

use App\Models\ProductModel;

class FarmerController extends BaseController
{

    public function index()
        {
         

            $productModel = model('ProductModel');
            $farmerProducts = $productModel->where('user_id', session()->get('user_id'))->findAll();
            $totalProducts = count($farmerProducts);
            $data = [
                'title' => 'Farmer Dashboard - SolarSoil',
                'farmerProducts' => $farmerProducts,
                'totalProducts' => $totalProducts
            ];

            return view('dashboard/farmer_dashboard', $data);
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

    $data = [
        'name' => $this->request->getPost('name'),
        'category' => $this->request->getPost('category'),
        'price' => $this->request->getPost('price'),
        'stock_quantity' => $this->request->getPost('stock_quantity'),
        'description' => $this->request->getPost('description')
    ];

    $productModel->update($id, $data);

    return redirect()->to(base_url('farmer/dashboard'));
}




}