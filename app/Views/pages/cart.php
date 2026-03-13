<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
$cartItems = $cartItems ?? [];
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
        <span class="text-gray-900 font-medium">Shopping Cart</span>
    </nav>

    <h1 class="text-2xl font-bold text-gray-900 mb-8">Shopping Cart <span class="text-gray-400 font-normal text-lg">(<?= count($cartItems) ?> items)</span></h1>

    <?php if (empty($cartItems)): ?>
        <!-- Empty Cart -->
        <div class="text-center py-20">
            <svg class="w-20 h-20 text-gray-200 mx-auto mb-6" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121 0 2.002-.881 1.745-1.97l-1.876-7.89A1.125 1.125 0 0016.744 3H7.106l-.383-1.437A1.125 1.125 0 005.636.728H2.25M6.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/></svg>
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Your cart is empty</h2>
            <p class="text-sm text-gray-500 mb-6">Looks like you haven't added any products yet.</p>
            <a href="<?= base_url('products') ?>" class="inline-flex items-center gap-2 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition">
                Browse Products
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
            </a>
        </div>
    <?php else: ?>
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl border border-gray-100 p-6">
                    <!-- Table Header (desktop) -->
                    <div class="hidden sm:grid grid-cols-12 gap-4 pb-3 border-b border-gray-100 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="col-span-5">Product</div>
                        <div class="col-span-2 text-center">Price</div>
                        <div class="col-span-2 text-center">Quantity</div>
                        <div class="col-span-2 text-right">Subtotal</div>
                        <div class="col-span-1"></div>
                    </div>

                    <!-- Items -->
                    <?php foreach ($cartItems as $item): ?>
                        <?= view('components/cart_item_row', ['item' => $item]) ?>
                    <?php endforeach; ?>

                    <!-- Continue Shopping -->
                    <div class="mt-6 pt-4 border-t border-gray-100">
                        <a href="<?= base_url('products') ?>" class="inline-flex items-center gap-1 text-sm text-primary-600 font-medium hover:text-primary-700 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <?= view('components/order_summary', ['summary' => ['subtotal' => $subtotal, 'shipping' => $shipping, 'discount' => $discount, 'total' => $total]]) ?>

                <a href="<?= base_url('checkout') ?>" class="block w-full mt-4 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition shadow-sm text-center text-sm">
                    Proceed to Checkout
                </a>

                <!-- Secure Checkout Notice -->
                <div class="flex items-center justify-center gap-2 mt-4 text-xs text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/></svg>
                    Secure checkout
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
