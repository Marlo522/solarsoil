<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('sidebar') ?>
<a href="<?= base_url('admin/dashboard') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-primary-700 bg-primary-50 rounded-lg">
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
<a href="<?= base_url('admin/orders') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg transition">
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



<!-- Stats -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-xl border border-gray-100 p-6 text-center">
        <div class="w-16 h-16 bg-primary-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
            <span class="text-3xl">👨‍🌾</span>
        </div>
        <h3 class="font-semibold text-gray-900 text-sm mb-1">Farmers</h3>
        <p class="text-xs text-gray-400"><?= $totalFarmers ?> registered</p>
    </div>
    <div class="bg-white rounded-xl border border-gray-100 p-6 text-center">
        <div class="w-16 h-16 bg-primary-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
            <span class="text-3xl">🛒</span>
        </div>
        <h3 class="font-semibold text-gray-900 text-sm mb-1">Orders</h3>
        <p class="text-xs text-gray-400"><?= $totalOrders ?> total</p>
    </div>
    <div class="bg-white rounded-xl border border-gray-100 p-6 text-center">
        <div class="w-16 h-16 bg-primary-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
            <span class="text-3xl">👥</span>
        </div>
        <h3 class="font-semibold text-gray-900 text-sm mb-1">Consumers</h3>
        <p class="text-xs text-gray-400"><?= $totalConsumers ?> registered</p>
    </div>
    <div class="bg-white rounded-xl border border-gray-100 p-6 text-center">
        <div class="w-16 h-16 bg-primary-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
            <span class="text-3xl">🌾</span>
        </div>
        <h3 class="font-semibold text-gray-900 text-sm mb-1">Products</h3>
        <p class="text-xs text-gray-400"><?= $totalProducts ?> available</p>
    </div>
</div>

<div x-data="{ activeTab: 'farmers' }" class="space-y-6">
    <!-- Tab navigation -->
    <div class="flex gap-1 bg-gray-100 rounded-lg p-1 w-fit">
        <button @click="activeTab = 'farmers'" :class="activeTab === 'farmers' ? 'bg-white text-gray-900 shadow-sm' : 'text-gray-500 hover:text-gray-700'" class="px-4 py-2 text-sm font-medium rounded-md transition">Farmers</button>
        <button @click="activeTab = 'consumers'" :class="activeTab === 'consumers' ? 'bg-white text-gray-900 shadow-sm' : 'text-gray-500 hover:text-gray-700'" class="px-4 py-2 text-sm font-medium rounded-md transition">Consumers</button>
        <button @click="activeTab = 'orders'" :class="activeTab === 'orders' ? 'bg-white text-gray-900 shadow-sm' : 'text-gray-500 hover:text-gray-700'" class="px-4 py-2 text-sm font-medium rounded-md transition">Orders</button>
    </div>

    <!-- Farmers Table -->
    <div x-show="activeTab === 'farmers'" class="bg-white rounded-xl border border-gray-100">
        <div class="flex items-center justify-between p-6 border-b border-gray-100">
            <h2 class="font-semibold text-gray-900">Registered Farmers</h2>
            <span class="text-sm text-gray-500"><?= count($farmers) ?> total</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php foreach ($farmers as $f): ?>
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center text-xs font-semibold text-primary-700">
                                    <?= strtoupper(substr($f['first_name'], 0, 1) . substr($f['last_name'], 0, 1)) ?>
                                </div>
                                <span class="text-sm font-medium text-gray-900"><?= esc($f['first_name'] . ' ' . $f['last_name']) ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600"><?= esc($f['email']) ?></td>
                        <td class="px-6 py-4 text-sm text-gray-600"><?= esc($f['contact_number']) ?></td>
                        <td class="px-6 py-4">
                            <?php if ($f['isActive']): ?>
                                <span class="px-2.5 py-0.5 text-xs font-medium bg-green-50 text-green-700 rounded-full">Active</span>
                            <?php else: ?>
                                <span class="px-2.5 py-0.5 text-xs font-medium bg-amber-50 text-amber-700 rounded-full">Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500"><?= date('M d, Y', strtotime($f['date_joined'])) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Consumers Table -->
    <div x-show="activeTab === 'consumers'" x-cloak class="bg-white rounded-xl border border-gray-100">
        <div class="flex items-center justify-between p-6 border-b border-gray-100">
            <h2 class="font-semibold text-gray-900">Registered Consumers</h2>
            <span class="text-sm text-gray-500"><?= count($consumers) ?> total</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php foreach ($consumers as $c): ?>
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-amber-100 rounded-full flex items-center justify-center text-xs font-semibold text-amber-700">
                                    <?= strtoupper(substr($c['first_name'], 0, 1) . substr($c['last_name'], 0, 1)) ?>
                                </div>
                                <span class="text-sm font-medium text-gray-900"><?= esc($c['first_name'] . ' ' . $c['last_name']) ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600"><?= esc($c['email']) ?></td>
                        <td class="px-6 py-4 text-sm text-gray-600"><?= esc($c['contact_number']) ?></td>
                        <td class="px-6 py-4">
                            <?php if ($c['isActive']): ?>
                                <span class="px-2.5 py-0.5 text-xs font-medium bg-green-50 text-green-700 rounded-full">Active</span>
                            <?php else: ?>
                                <span class="px-2.5 py-0.5 text-xs font-medium bg-amber-50 text-amber-700 rounded-full">Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500"><?= date('M d, Y', strtotime($c['date_joined'])) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Orders Table -->
    <div x-show="activeTab === 'orders'" x-cloak class="bg-white rounded-xl border border-gray-100">
        <div class="flex items-center justify-between p-6 border-b border-gray-100">
            <h2 class="font-semibold text-gray-900">Orders</h2>
            <span class="text-sm text-gray-500"><?= count($orders) ?> total</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php foreach ($orders as $o): ?>
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">#<?= $o['order_id'] ?></td>
                        <td class="px-6 py-4 text-sm text-gray-600"><?= esc($o['customer']) ?></td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">&#8369;<?= number_format($o['total'], 2) ?></td>
                        <td class="px-6 py-4">
                            <?php
                            $statusColors = [
                                'pending' => 'bg-amber-50 text-amber-700',
                                'processing' => 'bg-blue-50 text-blue-700',
                                'shipped' => 'bg-purple-50 text-purple-700',
                                'delivered' => 'bg-green-50 text-green-700',
                                'cancelled' => 'bg-red-50 text-red-700',
                            ];
                            $sColor = $statusColors[$o['status']] ?? 'bg-gray-50 text-gray-700';
                            ?>
                            <span class="px-2.5 py-0.5 text-xs font-medium <?= $sColor ?> rounded-full capitalize"><?= esc($o['status']) ?></span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500"><?= date('M d, Y', strtotime($o['created_at'])) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
