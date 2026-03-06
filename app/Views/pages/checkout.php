<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
$cartItems = $cartItems ?? [
    ['product_name' => 'Fresh Tomatoes', 'price' => 80.00, 'quantity' => 2, 'subtotal' => 160.00],
    ['product_name' => 'Mangoes', 'price' => 120.00, 'quantity' => 1, 'subtotal' => 120.00],
    ['product_name' => 'Carrots', 'price' => 60.00, 'quantity' => 3, 'subtotal' => 180.00],
];
$subtotal = array_sum(array_column($cartItems, 'subtotal'));
$shipping = 50.00;
$discount = 0;
$total = $subtotal + $shipping - $discount;
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6">
        <a href="<?= base_url('/') ?>" class="hover:text-primary-600 transition">Home</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
        <a href="<?= base_url('cart') ?>" class="hover:text-primary-600 transition">Cart</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
        <span class="text-gray-900 font-medium">Checkout</span>
    </nav>

    <!-- Steps -->
    <div class="flex items-center justify-center gap-4 mb-10">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm font-medium">1</div>
            <span class="text-sm font-medium text-primary-700 hidden sm:inline">Cart</span>
        </div>
        <div class="w-12 h-0.5 bg-primary-200"></div>
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm font-medium">2</div>
            <span class="text-sm font-medium text-primary-700 hidden sm:inline">Checkout</span>
        </div>
        <div class="w-12 h-0.5 bg-gray-200"></div>
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-gray-200 text-gray-500 rounded-full flex items-center justify-center text-sm font-medium">3</div>
            <span class="text-sm font-medium text-gray-400 hidden sm:inline">Confirmation</span>
        </div>
    </div>

    <h1 class="text-2xl font-bold text-gray-900 mb-8">Checkout</h1>

    <form action="<?= base_url('checkout') ?>" method="POST">
        <?= csrf_field() ?>
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Left: Forms -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Shipping Information -->
                <div class="bg-white rounded-xl border border-gray-100 p-6">
                    <h2 class="font-semibold text-gray-900 mb-5 flex items-center gap-2">
                        <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                        Shipping Address
                    </h2>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Full Name</label>
                            <input type="text" name="full_name" required
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition"
                                placeholder="Juan Dela Cruz" value="<?= session()->get('first_name') ? esc(session()->get('first_name') . ' ' . session()->get('last_name')) : '' ?>">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Delivery Address</label>
                            <textarea name="address" rows="2" required
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition resize-none"
                                placeholder="Street, Barangay, City, Province"><?= esc(session()->get('address') ?? '') ?></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Contact Number</label>
                            <input type="tel" name="contact_number" required
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition"
                                placeholder="09123456789" value="<?= esc(session()->get('contact_number') ?? '') ?>">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                            <input type="email" name="email" required
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition"
                                placeholder="you@email.com" value="<?= esc(session()->get('email') ?? '') ?>">
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white rounded-xl border border-gray-100 p-6" x-data="{ payment: 'cod' }">
                    <h2 class="font-semibold text-gray-900 mb-5 flex items-center gap-2">
                        <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/></svg>
                        Payment Method
                    </h2>
                    <div class="grid sm:grid-cols-3 gap-3">
                        <label :class="payment === 'card' ? 'border-primary-500 bg-primary-50 ring-1 ring-primary-500' : 'border-gray-200 hover:border-gray-300'" class="relative flex flex-col items-center gap-2 p-4 border rounded-xl cursor-pointer transition">
                            <input type="radio" name="payment_method" value="card" x-model="payment" class="sr-only">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/></svg>
                            <span class="text-sm font-medium text-gray-700">Card</span>
                        </label>
                        <label :class="payment === 'gcash' ? 'border-primary-500 bg-primary-50 ring-1 ring-primary-500' : 'border-gray-200 hover:border-gray-300'" class="relative flex flex-col items-center gap-2 p-4 border rounded-xl cursor-pointer transition">
                            <input type="radio" name="payment_method" value="gcash" x-model="payment" class="sr-only">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"/></svg>
                            <span class="text-sm font-medium text-gray-700">GCash</span>
                        </label>
                        <label :class="payment === 'cod' ? 'border-primary-500 bg-primary-50 ring-1 ring-primary-500' : 'border-gray-200 hover:border-gray-300'" class="relative flex flex-col items-center gap-2 p-4 border rounded-xl cursor-pointer transition">
                            <input type="radio" name="payment_method" value="cod" x-model="payment" class="sr-only">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"/></svg>
                            <span class="text-sm font-medium text-gray-700">Cash on Delivery</span>
                        </label>
                    </div>

                    <!-- Card Details (shown only for card) -->
                    <div x-show="payment === 'card'" x-cloak class="mt-5 pt-5 border-t border-gray-100 grid sm:grid-cols-2 gap-4">
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Card Number</label>
                            <input type="text" placeholder="1234 5678 9012 3456" maxlength="19"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Expiry Date</label>
                            <input type="text" placeholder="MM/YY" maxlength="5"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">CVV</label>
                            <input type="text" placeholder="123" maxlength="4"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                        </div>
                    </div>

                    <!-- GCash (shown only for gcash) -->
                    <div x-show="payment === 'gcash'" x-cloak class="mt-5 pt-5 border-t border-gray-100">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">GCash Number</label>
                            <input type="tel" placeholder="09123456789"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Summary -->
            <div class="lg:col-span-1 space-y-4">
                <!-- Items -->
                <div class="bg-white rounded-xl border border-gray-100 p-6">
                    <h3 class="font-semibold text-gray-900 mb-4">Order Items</h3>
                    <div class="space-y-3">
                        <?php foreach ($cartItems as $item): ?>
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-gray-50 rounded-lg overflow-hidden shrink-0">
                                <img src="https://images.unsplash.com/photo-1488459716781-31db52582fe9?w=100&h=100&fit=crop" alt="<?= esc($item['product_name']) ?>" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate"><?= esc($item['product_name']) ?></p>
                                <p class="text-xs text-gray-400">Qty: <?= $item['quantity'] ?></p>
                            </div>
                            <span class="text-sm font-semibold text-gray-900">&#8369;<?= number_format($item['subtotal'], 2) ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?= view('components/order_summary', ['summary' => ['subtotal' => $subtotal, 'shipping' => $shipping, 'discount' => $discount, 'total' => $total]]) ?>

                <button type="submit" class="w-full px-6 py-3.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition shadow-sm text-sm">
                    Confirm Order
                </button>

                <div class="flex items-center justify-center gap-2 text-xs text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/></svg>
                    Secure checkout &middot; SSL encrypted
                </div>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
