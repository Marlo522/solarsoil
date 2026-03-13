<?php

namespace App\Controllers;

class CartController extends BaseController
{
    public function add()
    {
        // Only allow POST requests
        if ($this->request->getMethod() !== 'POST') {
            return redirect()->back();
        }

        // Get the current user
        $userId = session()->get('user_id');
        if (!$userId) {
            session()->setFlashdata('error', 'Please log in to add items to your cart.');
            return redirect()->to(base_url('login'));
        }

        // Must be consumer
        if (session()->get('role') !== 'consumer') {
            session()->setFlashdata('error', 'Only consumers can add items to cart.');
            return redirect()->back();
        }

        $productId = $this->request->getPost('product_id');
        if (!$productId) {
            return redirect()->back();
        }

        $cartModel = new \App\Models\CartModel();
        $cartItemModel = new \App\Models\CartItemModel();
        $productModel = new \App\Models\ProductModel();

        // Check stock availability first
        $product = $productModel->find($productId);
        if (!$product || $product['stock_quantity'] <= 0) {
            session()->setFlashdata('error', 'Product is out of stock or does not exist.');
            return redirect()->back();
        }

        // Find existing cart for user
        $cart = $cartModel->where('user_id', $userId)->first();
        if (!$cart) {
            // Create a new cart
            $cartModel->insert(['user_id' => $userId]);
            $cartId = $cartModel->insertID();
        }
        else {
            $cartId = $cart['cart_id'];
        }

        // Check if item already exists in the cart and hasn't been ordered
        $existingItem = $cartItemModel->where([
            'cart_id' => $cartId,
            'product_id' => $productId,
            'inCart' => 1
        ])->first();

        if ($existingItem) {
            // Increment the quantity
            $cartItemModel->update($existingItem['cartitem_id'], [
                'quantity' => $existingItem['quantity'] + 1
            ]);
            // Deduct stock
            $productModel->update($productId, [
                'stock_quantity' => $product['stock_quantity'] - 1
            ]);
            session()->setFlashdata('success', 'Increased product quantity in your cart.');
        }
        else {
            // Add new cart item
            $cartItemModel->insert([
                'cart_id' => $cartId,
                'product_id' => $productId,
                'quantity' => 1,
                'inCart' => 1,
                'order_id' => null
            ]);
            // Deduct stock
            $productModel->update($productId, [
                'stock_quantity' => $product['stock_quantity'] - 1
            ]);
            session()->setFlashdata('success', 'Product added to your cart.');
        }

        return redirect()->back();
    }

    public function update()
    {
        if ($this->request->getMethod() !== 'POST') {
            return redirect()->back();
        }

        $userId = session()->get('user_id');
        if (!$userId || session()->get('role') !== 'consumer') {
            return redirect()->back();
        }

        $cartitemId = $this->request->getPost('cartitem_id');
        $action = $this->request->getPost('action');

        if (!$cartitemId || !$action) {
            return redirect()->back();
        }

        $cartModel = new \App\Models\CartModel();
        $cartItemModel = new \App\Models\CartItemModel();
        $productModel = new \App\Models\ProductModel();

        // Verify that the cartitem belongs to the user's cart
        $cart = $cartModel->where('user_id', $userId)->first();
        if (!$cart) {
            return redirect()->back();
        }

        $item = $cartItemModel->where([
            'cartitem_id' => $cartitemId,
            'cart_id' => $cart['cart_id'],
            'inCart' => 1
        ])->first();

        if ($item) {
            $product = $productModel->find($item['product_id']);

            if ($action === 'increase') {
                if ($product && $product['stock_quantity'] > 0) {
                    $cartItemModel->update($item['cartitem_id'], [
                        'quantity' => $item['quantity'] + 1
                    ]);
                    $productModel->update($product['product_id'], [
                        'stock_quantity' => $product['stock_quantity'] - 1
                    ]);
                } else {
                    session()->setFlashdata('error', 'Cannot add more, product is out of stock.');
                }
            } elseif ($action === 'decrease') {
                if ($item['quantity'] > 1) {
                    $cartItemModel->update($item['cartitem_id'], [
                        'quantity' => $item['quantity'] - 1
                    ]);
                    if ($product) {
                        $productModel->update($product['product_id'], [
                            'stock_quantity' => $product['stock_quantity'] + 1
                        ]);
                    }
                } else {
                    $cartItemModel->delete($item['cartitem_id']);
                    if ($product) {
                        $productModel->update($product['product_id'], [
                            'stock_quantity' => $product['stock_quantity'] + $item['quantity']
                        ]);
                    }
                }
            }
        }

        return redirect()->back();
    }

    public function remove()
    {
        if ($this->request->getMethod() !== 'POST') {
            return redirect()->back();
        }

        $userId = session()->get('user_id');
        if (!$userId || session()->get('role') !== 'consumer') {
            return redirect()->back();
        }

        $cartitemId = $this->request->getPost('cartitem_id');

        if (!$cartitemId) {
            return redirect()->back();
        }

        $cartModel = new \App\Models\CartModel();
        $cartItemModel = new \App\Models\CartItemModel();
        $productModel = new \App\Models\ProductModel();

        $cart = $cartModel->where('user_id', $userId)->first();
        if (!$cart) {
            return redirect()->back();
        }

        $item = $cartItemModel->where([
            'cartitem_id' => $cartitemId,
            'cart_id' => $cart['cart_id'],
            'inCart' => 1
        ])->first();

        if ($item) {
            $product = $productModel->find($item['product_id']);
            
            // Restore product stock completely based on the cart item quantity
            if ($product) {
                $productModel->update($product['product_id'], [
                    'stock_quantity' => $product['stock_quantity'] + $item['quantity']
                ]);
            }

            $cartItemModel->delete($item['cartitem_id']);
            session()->setFlashdata('success', 'Item removed from your cart.');
        }

        return redirect()->back();
    }
}
