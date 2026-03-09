<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('sidebar') ?>
<a href="<?= base_url('admin/dashboard') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/></svg>
    Dashboard
</a>
<a href="<?= base_url('admin/farmers') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/></svg>
    Farmers
</a>
<a href="<?= base_url('admin/consumers') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
    Consumers
</a>
<a href="<?= base_url('admin/orders') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-primary-700 bg-primary-50 rounded-lg">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/></svg>
    Orders
</a>
<a href="<?= base_url('admin/products') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
    Products
</a>
<a href="<?= base_url('admin/profile') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
    Profile
</a>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Back Button -->
<a href="<?= base_url('admin/orders') ?>" class="inline-flex items-center gap-2 text-gray-500 hover:text-primary-700 mb-6 transition">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"/></svg>
</a>

<div class="bg-white rounded-xl border border-gray-200 p-8">
    <!-- Header with Status -->
    <div class="flex items-start justify-between mb-6 pb-6 border-b border-gray-200">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Order #ORD<?= esc($order['order_id']) ?></h1>
            <p class="text-gray-600 mt-1">Placed on: <?= esc(date('F j, Y, g:i a', strtotime($order['created_at']))) ?></p>
        </div>
        <span class="px-4 py-2 text-sm font-semibold rounded-full <?= $orderStatus === 'pending' ? 'bg-yellow-100 text-yellow-800' : ($orderStatus === 'completed' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800') ?>">
            <?= esc(ucfirst($orderStatus)) ?>
        </span>
    </div>

    <!-- Customer & Order Information -->
    <div class="grid grid-cols-2 gap-8 mb-8">
        <!-- Customer Information -->
        <div>
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Customer Information</h2>
            <div class="space-y-3">
                <div>
                    <p class="text-sm font-medium text-gray-500">Customer Name</p>
                    <p class="text-sm text-gray-900"><?= esc($consumer['first_name'] . ' ' . $consumer['last_name']) ?></p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Email</p>
                    <p class="text-sm text-gray-900"><?= esc($consumer['email']) ?></p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Contact Number</p>
                    <p class="text-sm text-gray-900"><?= esc($consumer['contact_number']) ?></p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Delivery Address</p>
                    <p class="text-sm text-gray-900"><?= esc($consumer['address']) ?></p>
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
                    <p class="text-sm text-gray-900"><?= esc($order['shipping_method']) ?></p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Payment Method</p>
                    <p class="text-sm text-gray-900"><?= esc($order['payment_method']) ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Items Table -->
    <div class="mb-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Items in this Order</h2>
        <?php if (!empty($orderItems)): ?>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 border border-gray-200 rounded-lg">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Farmer</th>
                            <th scope="col" class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                            <th scope="col" class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th scope="col" class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($orderItems as $item): ?>
                            <tr>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="<?= base_url('uploads/' . esc($item['image'])) ?>" alt="<?= esc($item['name']) ?>" class="w-12 h-12 object-cover rounded-md">
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-900"><?= esc($item['name']) ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm text-gray-900"><?= esc($item['farmer']) ?></p>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                    <p class="text-sm text-gray-900"><?= esc($item['quantity']) ?></p>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-right">
                                    <p class="text-sm text-gray-900">₱<?= esc(number_format($item['price'], 2)) ?></p>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-right">
                                    <p class="text-sm font-medium text-gray-900">₱<?= esc(number_format($item['subtotal'], 2)) ?></p>
                                </td>
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
                <span class="text-sm font-medium text-gray-900">₱<?= esc(number_format($subtotal, 2)) ?></span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-gray-700">Shipping Fee:</span>
                <span class="text-sm font-medium text-gray-900">₱<?= esc(number_format($shippingFee, 2)) ?></span>
            </div>
            <div class="flex justify-between items-center pt-3 border-t border-gray-200">
                <span class="text-base font-bold text-gray-900">Total:</span>
                <span class="text-lg font-bold text-primary-700">₱<?= esc(number_format($totalAmount, 2)) ?></span>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
