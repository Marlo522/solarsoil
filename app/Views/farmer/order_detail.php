<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('sidebar') ?>
<a href="<?= base_url('farmer/dashboard') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/></svg>
    Dashboard
</a>
<a href="<?= base_url('farmer/products') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
    My Products
</a>
<a href="<?= base_url('farmer/orders') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-primary-700 bg-primary-50 rounded-lg">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/></svg>
    Orders
</a>
<a href="<?= base_url('farmer/profile') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
    Profile
</a>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
$orderStatus  = $order['status'] ?? 'pending';
$subtotal     = $subtotal ?? array_sum(array_column($orderItems ?? [], 'subtotal'));
$shippingFee  = $order['shipping_fee'] ?? 0;
$totalAmount  = $order['total_amount'] ?? ($subtotal + $shippingFee);
?>

<!-- Back Button -->
<a href="<?= base_url('farmer/orders') ?>" class="inline-flex items-center gap-2 text-gray-500 hover:text-primary-700 mb-6 transition">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"/></svg>
</a>

<div class="bg-white rounded-xl border border-gray-200 p-8">

    <!-- Header with Status -->
    <div class="flex items-start justify-between mb-6 pb-6 border-b border-gray-200">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Order #ORD<?= esc($order['order_id']) ?></h1>
            <p class="text-gray-600 mt-1">Placed on: <?= esc(date('F j, Y, g:i a', strtotime($order['created_at']))) ?></p>
        </div>
        <span class="px-4 py-2 text-sm font-semibold rounded-full <?= $orderStatus === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($orderStatus === 'delivered' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800') ?>">
            <?= esc(ucfirst($orderStatus)) ?>
        </span>
    </div>

    <!-- Customer & Order Information -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">

        <!-- Customer Information -->
        <div>
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Customer Information</h2>
            <div class="space-y-3">
                <div>
                    <p class="text-sm font-medium text-gray-500">Customer Name</p>
                    <p class="text-sm text-gray-900"><?= esc(($consumer['first_name'] ?? '') . ' ' . ($consumer['last_name'] ?? '')) ?></p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Email</p>
                    <p class="text-sm text-gray-900"><?= esc($consumer['email'] ?? 'N/A') ?></p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Contact Number</p>
                    <p class="text-sm text-gray-900"><?= esc($consumer['contact_number'] ?? 'N/A') ?></p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Delivery Address</p>
                    <p class="text-sm text-gray-900"><?= esc($consumer['address'] ?? 'N/A') ?></p>
                </div>
            </div>
        </div>

        <!-- Order Details -->
        <div>
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Details</h2>
            <div class="space-y-3">
                <div>
                    <p class="text-sm font-medium text-gray-500">Order Date</p>
                    <p class="text-sm text-gray-900"><?= esc(date('F j, Y', strtotime($order['created_at']))) ?></p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Shipping Method</p>
                    <p class="text-sm text-gray-900"><?= esc($order['shipping_method'] ?? 'N/A') ?></p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Payment Method</p>
                    <p class="text-sm text-gray-900"><?= esc($order['payment_method'] ?? 'N/A') ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Items Table (only my products) -->
    <div class="mb-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">My Items in This Order</h2>
        <?php if (!empty($orderItems)): ?>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 border border-gray-200 rounded-lg">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Unit Price</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($orderItems as $item): ?>
                        <tr>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-3">
                                    <?php if (!empty($item['image'])): ?>
                                        <img src="<?= base_url('public/uploads/products/' . esc($item['image'])) ?>" alt="<?= esc($item['name']) ?>" class="w-12 h-12 object-cover rounded-md shrink-0">
                                    <?php else: ?>
                                        <div class="w-12 h-12 bg-gray-100 rounded-md flex items-center justify-center shrink-0">
                                            <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909"/></svg>
                                        </div>
                                    <?php endif; ?>
                                    <p class="text-sm font-medium text-gray-900"><?= esc($item['name']) ?></p>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-center text-sm text-gray-900"><?= esc($item['quantity']) ?></td>
                            <td class="px-4 py-4 text-right text-sm text-gray-900">&#8369;<?= number_format($item['price'], 2) ?></td>
                            <td class="px-4 py-4 text-right text-sm font-medium text-gray-900">&#8369;<?= number_format($item['subtotal'], 2) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-gray-500 text-sm">No items found for this order.</p>
        <?php endif; ?>
    </div>

    <!-- Order Summary -->
    <div class="border-t border-gray-200 pt-6">
        <div class="max-w-sm ml-auto space-y-2">
            <div class="flex justify-between items-center">
                <span class="text-sm text-gray-700">Subtotal:</span>
                <span class="text-sm font-medium text-gray-900">&#8369;<?= number_format($subtotal, 2) ?></span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-gray-700">Shipping Fee:</span>
                <span class="text-sm font-medium text-gray-900">&#8369;<?= number_format($shippingFee, 2) ?></span>
            </div>
            <div class="flex justify-between items-center border-t border-gray-200 pt-2 mt-2">
                <span class="text-sm font-semibold text-gray-900">Total:</span>
                <span class="text-lg font-bold text-primary-700">&#8369;<?= number_format($totalAmount, 2) ?></span>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
