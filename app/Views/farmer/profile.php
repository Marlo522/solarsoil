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
<a href="<?= base_url('farmer/orders') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/></svg>
    Orders
</a>
<a href="<?= base_url('farmer/profile') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-primary-700 bg-primary-50 rounded-lg">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
    Profile
</a>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
$fullName = trim(
    $user['first_name'] . ' ' .
    ($user['middle_name'] ? $user['middle_name'] . ' ' : '') .
    $user['last_name'] .
    ($user['suffix'] ? ' ' . $user['suffix'] : '')
);
?>

<div x-data="{ tab: 'profile' }">
    <!-- Tabs -->
    <div class="flex gap-1 bg-gray-100 rounded-lg p-1 w-fit mb-6">
        <button @click="tab = 'profile'" :class="tab === 'profile' ? 'bg-white text-gray-900 shadow-sm' : 'text-gray-500 hover:text-gray-700'" class="px-4 py-2 text-sm font-medium rounded-md transition">Personal Info</button>
        <button @click="tab = 'settings'" :class="tab === 'settings' ? 'bg-white text-gray-900 shadow-sm' : 'text-gray-500 hover:text-gray-700'" class="px-4 py-2 text-sm font-medium rounded-md transition">Settings</button>
    </div>

    <!-- Personal Info -->
    <div x-show="tab === 'profile'">
        <div class="bg-white rounded-xl border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-primary-100 text-primary-700 rounded-2xl flex items-center justify-center text-xl font-bold">
                        <?= strtoupper(substr($user['first_name'], 0, 1) . substr($user['last_name'], 0, 1)) ?>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900"><?= esc($fullName) ?></h2>
                        <span class="inline-flex px-2.5 py-0.5 text-xs font-medium rounded-full bg-green-50 text-green-700 capitalize"><?= esc($user['role']) ?></span>
                    </div>
                </div>
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
                    <span class="inline-flex px-2.5 py-0.5 text-xs font-medium rounded-full bg-green-50 text-green-700 capitalize"><?= esc($user['role']) ?></span>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Date Joined</label>
                    <p class="text-sm font-medium text-gray-900"><?= date('F j, Y', strtotime($user['date_joined'])) ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Settings -->
    <div x-show="tab === 'settings'" x-cloak>
        <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-6">
            <h2 class="text-lg font-semibold text-gray-900">Account Settings</h2>
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
        </div>
    </div>
</div>

<?= $this->endSection() ?>
