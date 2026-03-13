<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6">
        <a href="<?= base_url('/') ?>" class="hover:text-primary-600 transition">Home</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
        <a href="<?= base_url('cart') ?>" class="hover:text-primary-600 transition">Cart</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
        <a href="<?= base_url('checkout') ?>" class="hover:text-primary-600 transition">Checkout</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
        <span class="text-gray-900 font-medium">Confirmation</span>
    </nav>

    <!-- Steps -->
    <div class="flex items-center justify-center gap-4 mb-10">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm font-medium">1</div>
            <span class="text-sm font-medium text-primary-700 hidden sm:inline">Cart</span>
        </div>
        <div class="w-12 h-0.5 bg-primary-600"></div>
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm font-medium">2</div>
            <span class="text-sm font-medium text-primary-700 hidden sm:inline">Checkout</span>
        </div>
        <div class="w-12 h-0.5 bg-primary-200"></div>
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm font-medium">3</div>
            <span class="text-sm font-medium text-primary-700 hidden sm:inline">Confirmation</span>
        </div>
    </div>

    <h1 class="text-2xl font-bold text-gray-900 mb-8 text-center">Review Your Order</h1>

    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Left: Details Summary -->
        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-white rounded-xl border border-gray-100 p-6">
                <h2 class="font-semibold text-gray-900 mb-5 flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                    Shipping Details
                </h2>
                <div class="grid sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="block text-gray-500 mb-1">Full Name</span>
                        <span class="font-medium text-gray-900"><?= esc($checkoutData['full_name'] ?? '') ?></span>
                    </div>
                    <div>
                        <span class="block text-gray-500 mb-1">Contact Number</span>
                        <span class="font-medium text-gray-900"><?= esc($checkoutData['contact_number'] ?? '') ?></span>
                    </div>
                    <div>
                        <span class="block text-gray-500 mb-1">Email</span>
                        <span class="font-medium text-gray-900"><?= esc($checkoutData['email'] ?? '') ?></span>
                    </div>
                    <div>
                        <span class="block text-gray-500 mb-1">Shipping Method</span>
                        <span class="font-medium text-gray-900"><?= ucfirst(esc($checkoutData['shipping_method'] ?? '')) ?> Shipping (&#8369;<?= number_format($checkoutData['shipping_cost'] ?? 0, 2) ?>)</span>
                    </div>
                    <div class="sm:col-span-2">
                        <span class="block text-gray-500 mb-1">Delivery Address</span>
                        <span class="font-medium text-gray-900"><?= esc($checkoutData['address'] ?? '') ?></span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-100 p-6">
                <h2 class="font-semibold text-gray-900 mb-5 flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/></svg>
                    Payment Method
                </h2>
                <div class="text-sm">
                    <span class="font-medium text-gray-900">
                        <?php 
                        $pymt = $checkoutData['payment_method'] ?? '';
                        if ($pymt === 'cod') {
                            echo 'Cash on Delivery';
                        } elseif ($pymt === 'card') {
                            echo 'Credit / Debit Card';
                        } elseif ($pymt === 'gcash') {
                            echo 'GCash';
                        } else {
                            echo strtoupper(esc($pymt));
                        }
                        ?>
                    </span>
                </div>
            </div>
            
            <div class="bg-white rounded-xl border border-gray-100 p-6">
                <h3 class="font-semibold text-gray-900 mb-4">Order Items</h3>
                <div class="space-y-3">
                    <?php foreach ($cartItems as $item): ?>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gray-50 rounded-lg overflow-hidden shrink-0">
                            <img src="<?= !empty($item['product_image']) ? base_url('uploads/products/' . esc($item['product_image'])) : 'https://images.unsplash.com/photo-1488459716781-31db52582fe9?w=100&h=100&fit=crop' ?>" alt="<?= esc($item['product_name']) ?>" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate"><?= esc($item['product_name']) ?></p>
                            <p class="text-xs text-gray-400">Qty: <?= $item['quantity'] ?> &times; &#8369;<?= number_format($item['price'], 2) ?></p>
                        </div>
                        <span class="text-sm font-semibold text-gray-900">&#8369;<?= number_format($item['subtotal'], 2) ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
        </div>

        <!-- Right: Final Summary & Submit -->
        <div class="lg:col-span-1 space-y-4">
            <div class="bg-white rounded-xl border border-gray-100 p-6">
                <h3 class="font-semibold text-gray-900 mb-4">Final Summary</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Subtotal</span>
                        <span class="font-medium text-gray-900">&#8369;<?= number_format($checkoutData['subtotal'] ?? 0, 2) ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Shipping Fee</span>
                        <span class="font-medium text-gray-900">&#8369;<?= number_format($checkoutData['shipping_cost'] ?? 0, 2) ?></span>
                    </div>
                    <div class="border-t border-gray-100 pt-3 flex justify-between">
                        <span class="font-semibold text-gray-900">Total</span>
                        <span class="font-bold text-lg text-primary-700">&#8369;<?= number_format($checkoutData['total_amount'] ?? 0, 2) ?></span>
                    </div>
                </div>
            </div>

            <form action="<?= base_url('order/place') ?>" method="POST">
                <?= csrf_field() ?>
                <button type="submit" class="w-full px-6 py-3.5 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700 transition shadow-sm text-sm flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    Finalize & Confirm Order
                </button>
            </form>
            
            <div class="text-center mt-3">
                <a href="<?= base_url('checkout') ?>" class="text-sm text-gray-500 hover:text-primary-600 transition">Return to Checkout to edit details</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
