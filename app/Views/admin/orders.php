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

<?php

$statusColors = [
    'pending'   => 'bg-yellow-100 text-yellow-800',
    'delivered' => 'bg-green-100 text-green-800',
];
?>

<h1 class="text-2xl font-bold text-gray-900 mb-6">Order Management</h1>

<!-- Stats Cards -->
<div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-6">
    <?php
    $statusCounts = ['pending' => 0, 'delivered' => 0];
    foreach ($orders as $o) {
        if (isset($statusCounts[$o['status']])) $statusCounts[$o['status']]++;
    }
    ?>
    <div class="bg-white rounded-xl border border-gray-100 p-4">
        <p class="text-xs font-medium text-gray-500 uppercase">Total Orders</p>
        <p class="text-2xl font-bold text-gray-900 mt-1"><?= count($orders) ?></p>
    </div>
    <div class="bg-white rounded-xl border border-gray-100 p-4">
        <p class="text-xs font-medium text-gray-500 uppercase">Pending</p>
        <p class="text-2xl font-bold text-yellow-600 mt-1"><?= $statusCounts['pending'] ?></p>
    </div>
    <div class="bg-white rounded-xl border border-gray-100 p-4">
        <p class="text-xs font-medium text-gray-500 uppercase">Delivered</p>
        <p class="text-2xl font-bold text-green-600 mt-1"><?= $statusCounts['delivered'] ?></p>
    </div>
</div>

<!-- Search and Filter -->
<?php $qs = '&' . http_build_query(array_filter(['search' => $search ?? '', 'status' => ($status ?? 'all') !== 'all' ? $status : ''])); ?>
<form method="GET" action="<?= base_url('admin/orders') ?>" class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
    <div class="relative w-full sm:w-64">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
        <input type="text" name="search" placeholder="Search Order ID or Customer..."
               value="<?= esc($search ?? '') ?>"
               class="w-full pl-10 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition" />
    </div>
    <div class="flex items-center gap-2">
        <span class="text-sm text-gray-500">Filter by:</span>
        <select name="status" onchange="this.form.submit()" class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none bg-white">
            <option value="all" <?= ($status ?? 'all') === 'all' ? 'selected' : '' ?>>All Status</option>
            <option value="pending" <?= ($status ?? '') === 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="delivered" <?= ($status ?? '') === 'delivered' ? 'selected' : '' ?>>Delivered</option>
        </select>
    </div>
</form>

<!-- Table -->
<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-primary-800 text-white">
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Order ID</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Consumer Name</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Total Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $order): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">#<?= esc($order['order_id']) ?></td>
                        <td class="px-6 py-4 text-sm text-gray-700"><?= esc($order['consumer_name'] ?? 'N/A') ?></td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">&#8369;<?= number_format($order['total_amount'] ?? 0, 2) ?></td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full <?= $statusColors[$order['status']] ?? 'bg-gray-100 text-gray-800' ?>">
                                <?= ucfirst(esc($order['status'])) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500"><?= date('M d, Y', strtotime($order['created_at'])) ?></td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-1">
                                <a href="<?= base_url('admin/orders/' . $order['order_id']) ?>" class="p-1.5 text-gray-400 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition" title="View">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.64 0 8.577 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.64 0-8.577-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-sm text-gray-400">No orders found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<?php
$currentPage = $currentPage ?? 1;
$totalPages  = $totalPages ?? 1;
?>
<?php if ($totalPages > 1): ?>
<div class="flex items-center justify-center gap-2 mt-6">
    <?php if ($currentPage > 1): ?>
        <a href="<?= base_url('admin/orders?page=' . ($currentPage - 1) . $qs) ?>" class="px-3 py-1.5 text-sm text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50 transition">Prev</a>
    <?php endif; ?>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="<?= base_url('admin/orders?page=' . $i . $qs) ?>"
           class="px-3 py-1.5 text-sm rounded-lg transition <?= $i === $currentPage ? 'bg-primary-700 text-white' : 'text-gray-600 border border-gray-200 hover:bg-gray-50' ?>">
            <?= $i ?>
        </a>
    <?php endfor; ?>
    <?php if ($currentPage < $totalPages): ?>
        <a href="<?= base_url('admin/orders?page=' . ($currentPage + 1) . $qs) ?>" class="px-3 py-1.5 text-sm text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50 transition">Next</a>
    <?php endif; ?>
</div>
<?php endif; ?>

<?= $this->endSection() ?>
