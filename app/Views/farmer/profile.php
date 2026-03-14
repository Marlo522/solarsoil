<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('sidebar') ?>

<a href="<?= base_url('farmer/dashboard') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/></svg>
    Dashboard
</a>

<a href="<?= base_url('farmer/products') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4"/></svg>
    My Products
</a>

<a href="<?= base_url('farmer/orders') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5"/></svg>
    Orders
</a>

<a href="<?= base_url('farmer/profile') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-primary-700 bg-primary-50 rounded-lg">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0"/></svg>
    Profile
</a>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
$fullName = trim(
    $user['first_name'].' '.
    ($user['middle_name'] ? $user['middle_name'].' ' : '').
    $user['last_name'].
    ($user['suffix'] ? ' '.$user['suffix'] : '')
);
?>

<div x-data="{ tab: 'profile', showEditProfile:false }">

<!-- Tabs -->
<div class="flex gap-1 bg-gray-100 rounded-lg p-1 w-fit mb-6">
    <button @click="tab='profile'" :class="tab==='profile' ? 'bg-white shadow-sm text-gray-900' : 'text-gray-500'" class="px-4 py-2 text-sm rounded-md">Personal Info</button>
    <button @click="tab='settings'" :class="tab==='settings' ? 'bg-white shadow-sm text-gray-900' : 'text-gray-500'" class="px-4 py-2 text-sm rounded-md">Settings</button>
</div>

<!-- PROFILE -->
<div x-show="tab==='profile'">

<div class="bg-white rounded-xl border border-gray-100 p-6">

<div class="flex items-center justify-between mb-6">

<div class="flex items-center gap-4">

<div class="w-16 h-16 bg-primary-100 text-primary-700 rounded-2xl flex items-center justify-center text-xl font-bold">
<?= strtoupper(substr($user['first_name'],0,1).substr($user['last_name'],0,1)) ?>
</div>

<div>
<h2 class="text-lg font-semibold text-gray-900"><?= esc($fullName) ?></h2>
<span class="inline-flex px-2.5 py-0.5 text-xs font-medium rounded-full bg-green-50 text-green-700 capitalize"><?= esc($user['role']) ?></span>
</div>

</div>

<button @click="showEditProfile=true"
class="px-4 py-2 text-sm font-medium text-primary-600 border border-primary-200 hover:bg-primary-50 rounded-lg transition">
Edit Profile
</button>

</div>

<div class="grid sm:grid-cols-2 gap-6">

<div>
<label class="text-xs text-gray-500 uppercase">Full Name</label>
<p class="text-sm font-medium"><?= esc($fullName) ?></p>
</div>

<div>
<label class="text-xs text-gray-500 uppercase">Email</label>
<p class="text-sm font-medium"><?= esc($user['email']) ?></p>
</div>

<div>
<label class="text-xs text-gray-500 uppercase">Contact Number</label>
<p class="text-sm font-medium"><?= esc($user['contact_number']) ?></p>
</div>

<div>
<label class="text-xs text-gray-500 uppercase">Address</label>
<p class="text-sm font-medium"><?= esc($user['address']) ?></p>
</div>

<div>
<label class="text-xs text-gray-500 uppercase">Role</label>
<span class="px-2 py-1 text-xs bg-green-50 text-green-700 rounded-full"><?= esc($user['role']) ?></span>
</div>

<div>
<label class="text-xs text-gray-500 uppercase">Date Joined</label>
<p class="text-sm font-medium"><?= date('F j, Y', strtotime($user['date_joined'])) ?></p>
</div>

</div>

</div>

</div>

<!-- SETTINGS -->
<div x-show="tab === 'settings'" x-cloak>

    <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-6">

        <h2 class="text-lg font-semibold text-gray-900">Account Settings</h2>

        <div>
            <h3 class="text-sm font-semibold text-gray-900 mb-4">Change Password</h3>

            <form action="<?= base_url('farmer/password/update') ?>" method="POST" class="space-y-4 max-w-md">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Current Password
                    </label>

                    <input
                        type="password"
                        name="current_password"
                        required
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        New Password
                    </label>

                    <input
                        type="password"
                        name="new_password"
                        required
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Confirm New Password
                    </label>

                    <input
                        type="password"
                        name="confirm_password"
                        required
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                </div>

                <button
                    type="submit"
                    class="px-6 py-2.5 bg-primary-600 text-white text-sm font-medium rounded-lg hover:bg-primary-700 transition">

                    Update Password

                </button>

            </form>
        </div>

    </div>

</div>
<!-- EDIT PROFILE MODAL -->

<div x-show="showEditProfile" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4">

<div class="fixed inset-0 bg-black/40" @click="showEditProfile=false"></div>

<div class="relative bg-white rounded-2xl shadow-xl w-full max-w-lg" @click.stop>

<div class="flex items-center justify-between p-6 border-b">
<h3 class="text-lg font-semibold">Edit Profile</h3>

<button @click="showEditProfile=false" class="text-gray-400 hover:text-gray-600">
✕
</button>
</div>

<form action="<?= base_url('farmer/profile/update') ?>" method="POST" class="p-6 space-y-4">

<input type="text" placeholder="First Name" name="first_name" value="<?= esc($user['first_name']) ?>" class="w-full px-4 py-2 border rounded-lg">

<input type="text" placeholder="Middle Name" name="middle_name" value="<?= esc($user['middle_name']) ?>" class="w-full px-4 py-2 border rounded-lg">

<input type="text" placeholder="Last Name" name="last_name" value="<?= esc($user['last_name']) ?>" class="w-full px-4 py-2 border rounded-lg">

<input type="text" placeholder="Contact Number" name="contact_number" value="<?= esc($user['contact_number']) ?>" class="w-full px-4 py-2 border rounded-lg">

<textarea placeholder="Address" name="address" class="w-full px-4 py-2 border rounded-lg"><?= esc($user['address']) ?></textarea>

<div class="flex gap-3">
<button type="button" @click="showEditProfile=false" class="flex-1 border rounded-lg py-2">Cancel</button>

<button type="submit" class="flex-1 bg-primary-600 text-white rounded-lg py-2 hover:bg-primary-700">
Save Changes
</button>
</div>

</form>

</div>

</div>

</div>

<?= $this->endSection() ?>