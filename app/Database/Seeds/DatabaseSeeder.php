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
            ['first_name' => 'Juan', 'middle_name' => 'Santos', 'last_name' => 'Dela Cruz', 'suffix' => null, 'address' => '123 Quezon Avenue, Quezon City', 'contact_number' => '09123456789', 'role' => 'consumer', 'email' => 'juan@email.com', 'password' => password_hash('password123', PASSWORD_DEFAULT), 'token' => null, 'date_joined' => date('Y-m-d H:i:s'), 'isActive' => 1],
            ['first_name' => 'Maria', 'middle_name' => null, 'last_name' => 'Reyes', 'suffix' => null, 'address' => '456 Manila Street, Manila', 'contact_number' => '09111111111', 'role' => 'seller', 'email' => 'maria@email.com', 'password' => password_hash('password123', PASSWORD_DEFAULT), 'token' => null, 'date_joined' => date('Y-m-d H:i:s'), 'isActive' => 1],
            ['first_name' => 'Pedro', 'middle_name' => 'Lopez', 'last_name' => 'Garcia', 'suffix' => null, 'address' => '789 Pasig Boulevard, Pasig City', 'contact_number' => '09222222222', 'role' => 'consumer', 'email' => 'pedro@email.com', 'password' => password_hash('password123', PASSWORD_DEFAULT), 'token' => null, 'date_joined' => date('Y-m-d H:i:s'), 'isActive' => 1],
            ['first_name' => 'Ana', 'middle_name' => null, 'last_name' => 'Torres', 'suffix' => 'Jr.', 'address' => '101 Ayala Avenue, Makati City', 'contact_number' => '09333333333', 'role' => 'seller', 'email' => 'ana@email.com', 'password' => password_hash('password123', PASSWORD_DEFAULT), 'token' => null, 'date_joined' => date('Y-m-d H:i:s'), 'isActive' => 1],
            ['first_name' => 'Admin', 'middle_name' => null, 'last_name' => 'User', 'suffix' => null, 'address' => 'Metro Manila, Philippines', 'contact_number' => '09444444444', 'role' => 'admin', 'email' => 'admin@email.com', 'password' => password_hash('admin123', PASSWORD_DEFAULT), 'token' => null, 'date_joined' => date('Y-m-d H:i:s'), 'isActive' => 1]
        ];

        foreach ($userData as $user) {
            $db->table('users')->insert($user);
            $userIds[] = $db->insertID();
        }

        echo "✓ Users seeded: " . count($userIds) . " records\n";

        // PRODUCTS - Insert individually to capture IDs
        $productIds = [];
        
        $productData = [
            ['user_id' => $userIds[1], 'image' => 'tomato.jpg', 'name' => 'Fresh Tomatoes', 'price' => 80.00, 'stock_quantity' => 100, 'description' => 'Organic red tomatoes, farm fresh', 'category' => 'Vegetables', 'isDeleted' => 0, 'date_added' => date('Y-m-d H:i:s')],
            ['user_id' => $userIds[1], 'image' => 'carrot.jpg', 'name' => 'Carrots', 'price' => 60.00, 'stock_quantity' => 150, 'description' => 'Sweet and crunchy carrots', 'category' => 'Vegetables', 'isDeleted' => 0, 'date_added' => date('Y-m-d H:i:s')],
            ['user_id' => $userIds[1], 'image' => 'banana.jpg', 'name' => 'Bananas', 'price' => 50.00, 'stock_quantity' => 200, 'description' => 'Ripe Cavendish bananas', 'category' => 'Fruits', 'isDeleted' => 0, 'date_added' => date('Y-m-d H:i:s')],
            ['user_id' => $userIds[1], 'image' => 'lettuce.jpg', 'name' => 'Lettuce', 'price' => 40.00, 'stock_quantity' => 80, 'description' => 'Fresh green lettuce', 'category' => 'Vegetables', 'isDeleted' => 0, 'date_added' => date('Y-m-d H:i:s')],
            ['user_id' => $userIds[1], 'image' => 'mango.jpg', 'name' => 'Mangoes', 'price' => 120.00, 'stock_quantity' => 60, 'description' => 'Sweet Philippine mangoes', 'category' => 'Fruits', 'isDeleted' => 0, 'date_added' => date('Y-m-d H:i:s')],
            ['user_id' => $userIds[3], 'image' => 'potato.jpg', 'name' => 'Potatoes', 'price' => 70.00, 'stock_quantity' => 120, 'description' => 'Fresh potatoes for cooking', 'category' => 'Vegetables', 'isDeleted' => 0, 'date_added' => date('Y-m-d H:i:s')],
            ['user_id' => $userIds[3], 'image' => 'apple.jpg', 'name' => 'Apples', 'price' => 150.00, 'stock_quantity' => 90, 'description' => 'Crisp red apples', 'category' => 'Fruits', 'isDeleted' => 0, 'date_added' => date('Y-m-d H:i:s')],
            ['user_id' => $userIds[3], 'image' => 'cucumber.jpg', 'name' => 'Cucumber', 'price' => 45.00, 'stock_quantity' => 100, 'description' => 'Fresh green cucumber', 'category' => 'Vegetables', 'isDeleted' => 0, 'date_added' => date('Y-m-d H:i:s')],
            ['user_id' => $userIds[3], 'image' => 'orange.jpg', 'name' => 'Oranges', 'price' => 100.00, 'stock_quantity' => 110, 'description' => 'Juicy sweet oranges', 'category' => 'Fruits', 'isDeleted' => 0, 'date_added' => date('Y-m-d H:i:s')],
            ['user_id' => $userIds[1], 'image' => 'spinach.jpg', 'name' => 'Spinach', 'price' => 55.00, 'stock_quantity' => 70, 'description' => 'Fresh organic spinach', 'category' => 'Vegetables', 'isDeleted' => 0, 'date_added' => date('Y-m-d H:i:s')]
        ];

        foreach ($productData as $product) {
            $db->table('products')->insert($product);
            $productIds[] = $db->insertID();
        }

        echo "✓ Products seeded: " . count($productIds) . " records\n";

        // CARTS - Create carts for consumers
        $cartIds = [];
        
        $cartData = [
            ['user_id' => $userIds[0]], // Juan's cart
            ['user_id' => $userIds[2]]  // Pedro's cart
        ];

        foreach ($cartData as $cart) {
            $db->table('carts')->insert($cart);
            $cartIds[] = $db->insertID();
        }

        echo "✓ Carts seeded: " . count($cartIds) . " records\n";

        // ORDERS - Create sample orders
        $orderIds = [];
        
        $orderData = [
            ['user_id' => $userIds[0], 'cart_id' => $cartIds[0], 'shipping_method' => 'Standard Shipping', 'payment_method' => 'Cash on Delivery', 'status' => 'pending', 'created_at' => date('Y-m-d H:i:s'), 'isCompleted' => 0],
            ['user_id' => $userIds[2], 'cart_id' => $cartIds[1], 'shipping_method' => 'Express Shipping', 'payment_method' => 'GCash', 'status' => 'completed', 'created_at' => date('Y-m-d H:i:s', strtotime('-2 days')), 'isCompleted' => 1]
        ];

        foreach ($orderData as $order) {
            $db->table('orders')->insert($order);
            $orderIds[] = $db->insertID();
        }

        echo "✓ Orders seeded: " . count($orderIds) . " records\n";

        // CART ITEMS - Add items to carts
        $cartItemData = [
            // Juan's cart items (order pending)
            ['cart_id' => $cartIds[0], 'product_id' => $productIds[0], 'quantity' => 2, 'inCart' => 1, 'order_id' => $orderIds[0]],
            ['cart_id' => $cartIds[0], 'product_id' => $productIds[2], 'quantity' => 3, 'inCart' => 1, 'order_id' => $orderIds[0]],
            ['cart_id' => $cartIds[0], 'product_id' => $productIds[4], 'quantity' => 1, 'inCart' => 1, 'order_id' => $orderIds[0]],
            
            // Pedro's cart items (order completed)
            ['cart_id' => $cartIds[1], 'product_id' => $productIds[5], 'quantity' => 4, 'inCart' => 0, 'order_id' => $orderIds[1]],
            ['cart_id' => $cartIds[1], 'product_id' => $productIds[6], 'quantity' => 2, 'inCart' => 0, 'order_id' => $orderIds[1]],
            ['cart_id' => $cartIds[1], 'product_id' => $productIds[8], 'quantity' => 3, 'inCart' => 0, 'order_id' => $orderIds[1]]
        ];

        foreach ($cartItemData as $cartItem) {
            $db->table('cart_items')->insert($cartItem);
        }

        echo "✓ Cart items seeded: " . count($cartItemData) . " records\n";
        
        echo "\n✓✓ Database seeding completed successfully!\n";
    }
}