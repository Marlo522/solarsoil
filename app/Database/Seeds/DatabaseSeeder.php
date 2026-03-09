<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // Disable foreign key checks
        $db->query('SET FOREIGN_KEY_CHECKS=0');

        // Clear existing data
        $db->table('cart_items')->truncate();
        $db->table('orders')->truncate();
        $db->table('carts')->truncate();
        $db->table('products')->truncate();
        $db->table('users')->truncate();

        // Re-enable foreign key checks
        $db->query('SET FOREIGN_KEY_CHECKS=1');

        // USERS - Insert individually to capture IDs
        $userIds = [];
        
        $userData = [
            ['first_name' => 'Juan', 'middle_name' => 'Santos', 'last_name' => 'Dela Cruz', 'suffix' => null, 'address' => 'Quezon City', 'contact_number' => '09123456789', 'role' => 'consumer', 'email' => 'juan@email.com', 'password' => password_hash('password123', PASSWORD_DEFAULT), 'token' => null, 'date_joined' => date('Y-m-d H:i:s'), 'isActive' => 1],
            ['first_name' => 'Maria', 'middle_name' => null, 'last_name' => 'Reyes', 'suffix' => null, 'address' => 'Manila', 'contact_number' => '09111111111', 'role' => 'seller', 'email' => 'maria@email.com', 'password' => password_hash('password123', PASSWORD_DEFAULT), 'token' => null, 'date_joined' => date('Y-m-d H:i:s'), 'isActive' => 1],
            ['first_name' => 'Pedro', 'middle_name' => 'Lopez', 'last_name' => 'Garcia', 'suffix' => null, 'address' => 'Pasig', 'contact_number' => '09222222222', 'role' => 'consumer', 'email' => 'pedro@email.com', 'password' => password_hash('password123', PASSWORD_DEFAULT), 'token' => null, 'date_joined' => date('Y-m-d H:i:s'), 'isActive' => 1],
            ['first_name' => 'Ana', 'middle_name' => null, 'last_name' => 'Torres', 'suffix' => null, 'address' => 'Makati', 'contact_number' => '09333333333', 'role' => 'seller', 'email' => 'ana@email.com', 'password' => password_hash('password123', PASSWORD_DEFAULT), 'token' => null, 'date_joined' => date('Y-m-d H:i:s'), 'isActive' => 1],
            ['first_name' => 'Admin', 'middle_name' => null, 'last_name' => 'User', 'suffix' => null, 'address' => 'Philippines', 'contact_number' => '09444444444', 'role' => 'admin', 'email' => 'admin@email.com', 'password' => password_hash('admin123', PASSWORD_DEFAULT), 'token' => null, 'date_joined' => date('Y-m-d H:i:s'), 'isActive' => 1]
        ];

        foreach ($userData as $user) {
            $db->table('users')->insert($user);
            $userIds[] = $db->insertID();
        }

        // PRODUCTS - Insert individually to capture IDs
        $productIds = [];
        
        $productData = [
            ['user_id' => $userIds[2], 'image' => 'tomato.jpg', 'name' => 'Fresh Tomatoes', 'price' => 80, 'stock_quantity' => 100, 'description' => 'Organic red tomatoes, farm fresh', 'category' => 'Vegetables'],
            ['user_id' => $userIds[2], 'image' => 'carrot.jpg', 'name' => 'Carrots', 'price' => 60, 'stock_quantity' => 150, 'description' => 'Sweet and crunchy carrots', 'category' => 'Vegetables'],
            ['user_id' => $userIds[2], 'image' => 'banana.jpg', 'name' => 'Bananas', 'price' => 50, 'stock_quantity' => 200, 'description' => 'Ripe Cavendish bananas', 'category' => 'Fruits'],
            ['user_id' => $userIds[2], 'image' => 'lettuce.jpg', 'name' => 'Lettuce', 'price' => 40, 'stock_quantity' => 80, 'description' => 'Fresh green lettuce', 'category' => 'Vegetables'],
            ['user_id' => $userIds[2], 'image' => 'mango.jpg', 'name' => 'Mangoes', 'price' => 120, 'stock_quantity' => 60, 'description' => 'Sweet Philippine mangoes', 'category' => 'Fruits'],
            ['user_id' => $userIds[2], 'image' => 'potato.jpg', 'name' => 'Potatoes', 'price' => 70, 'stock_quantity' => 120, 'description' => 'Fresh potatoes for cooking', 'category' => 'Vegetables'],
            ['user_id' => $userIds[3], 'image' => 'apple.jpg', 'name' => 'Apples', 'price' => 150, 'stock_quantity' => 90, 'description' => 'Crisp red apples', 'category' => 'Fruits'],
            ['user_id' => $userIds[3], 'image' => 'cucumber.jpg', 'name' => 'Cucumber', 'price' => 45, 'stock_quantity' => 100, 'description' => 'Fresh green cucumber', 'category' => 'Vegetables'],
            ['user_id' => $userIds[3], 'image' => 'orange.jpg', 'name' => 'Oranges', 'price' => 100, 'stock_quantity' => 110, 'description' => 'Juicy sweet oranges', 'category' => 'Fruits']
        ];

        foreach ($productData as $product) {
            $db->table('products')->insert($product);
            $productIds[] = $db->insertID();
        }


        // ORDERS - Use actual user and cart IDs
        $orderIds = [];
        $isCompletedStates = [1, 0, 1, 0, 1];
        foreach ($userIds as $index => $userId) {
            $db->table('orders')->insert([
                'user_id' => $userId,
                'cart_id' => $cartIds[$index],
                'isCompleted' => $isCompletedStates[$index]
            ]);
            $orderIds[] = $db->insertID();
        }

        // CART ITEMS - Use actual cart, product, and order IDs
        $quantities = [1, 2, 1, 3, 1];
        foreach ($cartIds as $index => $cartId) {
            $db->table('cart_items')->insert([
                'cart_id' => $cartId,
                'product_id' => $productIds[$index],
                'quantity' => $quantities[$index],
                'inCart' => 1,
                'order_id' => $orderIds[$index]
            ]);
        }
    }
}