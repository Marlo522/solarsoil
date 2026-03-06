<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
$user = $user ?? [
    'user_id' => 1, 'first_name' => 'Juan', 'middle_name' => 'Santos', 'last_name' => 'Dela Cruz',
    'suffix' => '', 'email' => 'juan@email.com', 'contact_number' => '09123456789',
    'address' => 'Quezon City', 'role' => 'consumer', 'date_joined' => '2026-03-06 10:48:45'
];
$orders = $orders ?? [
    ['order_id' => 1, 'created_at' => '2026-03-06 10:48:45', 'isCompleted' => 1, 'total' => 460.00, 'item_count' => 3],
    ['order_id' => 2, 'created_at' => '2026-03-05 14:20:00', 'isCompleted' => 0, 'total' => 280.00, 'item_count' => 2],
];
$fullName = trim($user['first_name'] . ' ' . ($user['middle_name'] ? $user['middle_name'] . ' ' : '') . $user['last_name'] . ($user['suffix'] ? ' ' . $user['suffix'] : ''));
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6">
        <a href="<?= base_url('/') ?>" class="hover:text-primary-600 transition">Home</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
        <span class="text-gray-900 font-medium">My Profile</span>
    </nav>

    <div class="grid lg:grid-cols-4 gap-8" x-data="{ tab: 'profile' }">
        <!-- Sidebar -->
        <aside class="lg:col-span-1">
            <div class="bg-white rounded-xl border border-gray-100 p-6">
                <!-- Avatar -->
                <div class="text-center mb-6">
                    <div class="w-20 h-20 bg-primary-100 text-primary-700 rounded-2xl flex items-center justify-center mx-auto text-2xl font-bold mb-3">
                        <?= strtoupper(substr($user['first_name'], 0, 1) . substr($user['last_name'], 0, 1)) ?>
                    </div>
                    <h3 class="font-semibold text-gray-900"><?= esc($fullName) ?></h3>
                    <p class="text-xs text-gray-500 capitalize"><?= esc($user['role']) ?></p>
                </div>

                <!-- Nav -->
                <nav class="space-y-1">
                    <button @click="tab = 'profile'" :class="tab === 'profile' ? 'bg-primary-50 text-primary-700' : 'text-gray-600 hover:bg-gray-50'" class="w-full flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-lg transition text-left">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                        My Profile
                    </button>
                    <button @click="tab = 'orders'" :class="tab === 'orders' ? 'bg-primary-50 text-primary-700' : 'text-gray-600 hover:bg-gray-50'" class="w-full flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-lg transition text-left">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/></svg>
                        My Orders
                    </button>
                    <button @click="tab = 'address'" :class="tab === 'address' ? 'bg-primary-50 text-primary-700' : 'text-gray-600 hover:bg-gray-50'" class="w-full flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-lg transition text-left">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                        Delivery Address
                    </button>
                    <button @click="tab = 'settings'" :class="tab === 'settings' ? 'bg-primary-50 text-primary-700' : 'text-gray-600 hover:bg-gray-50'" class="w-full flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-lg transition text-left">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Settings
                    </button>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="lg:col-span-3">
            <!-- My Profile -->
            <div x-show="tab === 'profile'" x-cloak>
                <div class="bg-white rounded-xl border border-gray-100 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-semibold text-gray-900">Personal Information</h2>
                        <button class="px-4 py-2 text-sm font-medium text-primary-600 border border-primary-200 hover:bg-primary-50 rounded-lg transition">Edit Profile</button>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Full Name</label>
                            <p class="text-sm font-medium text-gray-900"><?= esc($fullName) ?></p>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Email</label>
                            <p class="text-sm font-medium text-gray-900"><?= esc($user['email']) ?></p>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Contact Number</label>
                            <p class="text-sm font-medium text-gray-900"><?= esc($user['contact_number']) ?></p>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Address</label>
                            <p class="text-sm font-medium text-gray-900"><?= esc($user['address']) ?></p>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Role</label>
                            <span class="inline-flex px-2.5 py-0.5 text-xs font-medium rounded-full capitalize <?= $user['role'] === 'consumer' ? 'bg-blue-50 text-blue-700' : ($user['role'] === 'seller' ? 'bg-green-50 text-green-700' : 'bg-purple-50 text-purple-700') ?>"><?= esc($user['role']) ?></span>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Date Joined</label>
                            <p class="text-sm font-medium text-gray-900"><?= date('F j, Y', strtotime($user['date_joined'])) ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- My Orders -->
            <div x-show="tab === 'orders'" x-cloak>
                <div class="bg-white rounded-xl border border-gray-100 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-6">My Orders</h2>
                    <?php if (empty($orders)): ?>
                        <div class="text-center py-12">
                            <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/></svg>
                            <p class="text-sm text-gray-500">No orders yet</p>
                        </div>
                    <?php else: ?>
                        <div class="space-y-4">
                            <?php foreach ($orders as $order): ?>
                            <div class="border border-gray-100 rounded-lg p-4 hover:border-gray-200 transition">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center gap-3">
                                        <span class="text-sm font-semibold text-gray-900">Order #<?= $order['order_id'] ?></span>
                                        <?php if ($order['isCompleted']): ?>
                                            <span class="px-2.5 py-0.5 text-xs font-medium bg-green-50 text-green-700 rounded-full">Completed</span>
                                        <?php else: ?>
                                            <span class="px-2.5 py-0.5 text-xs font-medium bg-amber-50 text-amber-700 rounded-full">Pending</span>
                                        <?php endif; ?>
                                    </div>
                                    <span class="text-sm font-bold text-gray-900">&#8369;<?= number_format($order['total'], 2) ?></span>
                                </div>
                                <div class="flex items-center justify-between text-xs text-gray-500">
                                    <span><?= date('M j, Y \a\t g:ia', strtotime($order['created_at'])) ?></span>
                                    <span><?= $order['item_count'] ?> item(s)</span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Delivery Address -->
            <div x-show="tab === 'address'" x-cloak>
                <div class="bg-white rounded-xl border border-gray-100 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-semibold text-gray-900">Delivery Address</h2>
                        <button class="px-4 py-2 text-sm font-medium text-primary-600 border border-primary-200 hover:bg-primary-50 rounded-lg transition">Edit Address</button>
                    </div>
                    <div class="border border-gray-100 rounded-lg p-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-primary-600 mt-0.5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                            <div>
                                <p class="text-sm font-medium text-gray-900 mb-1"><?= esc($fullName) ?></p>
                                <p class="text-sm text-gray-600"><?= esc($user['address']) ?></p>
                                <p class="text-sm text-gray-500 mt-1"><?= esc($user['contact_number']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings -->
            <div x-show="tab === 'settings'" x-cloak>
                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-6">
                    <h2 class="text-lg font-semibold text-gray-900">Account Settings</h2>
                    <!-- Change Password -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 mb-4">Change Password</h3>
                        <form class="space-y-4 max-w-md">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Current Password</label>
                                <input type="password" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">New Password</label>
                                <input type="password" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Confirm New Password</label>
                                <input type="password" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                            </div>
                            <button type="button" class="px-6 py-2.5 bg-primary-600 text-white text-sm font-medium rounded-lg hover:bg-primary-700 transition">Update Password</button>
                        </form>
                    </div>
                    <!-- Logout -->
                    <div class="pt-6 border-t border-gray-100">
                        <a href="<?= base_url('logout') ?>" class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-red-600 border border-red-200 hover:bg-red-50 rounded-lg transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/></svg>
                            Log Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
