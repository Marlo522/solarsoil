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
<a href="<?= base_url('admin/consumers') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-primary-700 bg-primary-50 rounded-lg">
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

<div x-data="{
    showToggleModal: false,
    toggleUser: { id: null, name: '', isActive: true },
    openToggle(id, name, isActive) {
        this.toggleUser = { id, name, isActive };
        this.showToggleModal = true;
    }
}">
<h1 class="text-2xl font-bold text-gray-900 mb-6">Consumers Management</h1>

<!-- Search and Filter -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
    <div class="relative w-full sm:w-64">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
        <input type="text" placeholder="Search Consumer ID..."
               class="w-full pl-10 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition" />
    </div>
    <div class="flex items-center gap-2">
        <span class="text-sm text-gray-500">Filter by:</span>
        <select class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none bg-white">
            <option value="all">All</option>
            <option value="active">Active</option>
            <option value="pending">Pending</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>
</div>

<!-- Table -->
<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-primary-800 text-white">
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Consumer ID</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Consumer Name</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Address</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Date Joined</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php if (!empty($consumers)): ?>
                    <?php foreach ($consumers as $consumer): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">#CMR<?= esc($consumer['user_id']) ?></td>
                        <td class="px-6 py-4 text-sm text-gray-700"><?= esc($consumer['first_name'] . ' ' . $consumer['last_name']) ?></td>
                        <td class="px-6 py-4 text-sm text-gray-700"><?= esc($consumer['address'] ?? 'N/A') ?></td>
                        <td class="px-6 py-4 text-sm">
                            <?php if ($consumer['isActive']): ?>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
                            <?php else: ?>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500"><?= date('F j, Y', strtotime($consumer['date_joined'] ?? $consumer['created_at'] ?? 'now')) ?></td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-1">
                                <a href="<?= base_url('admin/consumers/' . $consumer['user_id']) ?>" class="p-1.5 text-gray-400 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition" title="View">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.64 0 8.577 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.64 0-8.577-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </a>
                                <?php if ($consumer['isActive']): ?>
                                <button @click="openToggle(<?= $consumer['user_id'] ?>, '<?= esc($consumer['first_name'] . ' ' . $consumer['last_name'], 'js') ?>', true)" class="p-1.5 text-gray-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition" title="Deactivate">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                                </button>
                                <?php else: ?>
                                <button @click="openToggle(<?= $consumer['user_id'] ?>, '<?= esc($consumer['first_name'] . ' ' . $consumer['last_name'], 'js') ?>', false)" class="p-1.5 text-gray-400 hover:text-green-600 hover:bg-green-50 rounded-lg transition" title="Activate">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </button>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-400">No consumers found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<?php if (!empty($pager)): ?>
<div class="flex items-center justify-center gap-2 mt-6">
    <?php if ($currentPage > 1): ?>
        <a href="<?= base_url('admin/consumers?page=' . ($currentPage - 1)) ?>" class="px-3 py-1.5 text-sm text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50 transition">Prev</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="<?= base_url('admin/consumers?page=' . $i) ?>"
           class="px-3 py-1.5 text-sm rounded-lg transition <?= $i === $currentPage ? 'bg-primary-700 text-white' : 'text-gray-600 border border-gray-200 hover:bg-gray-50' ?>">
            <?= $i ?>
        </a>
    <?php endfor; ?>

    <?php if ($currentPage < $totalPages): ?>
        <a href="<?= base_url('admin/consumers?page=' . ($currentPage + 1)) ?>" class="px-3 py-1.5 text-sm text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50 transition">Next</a>
    <?php endif; ?>
</div>
<?php endif; ?>

<!-- Deactivate/Activate Confirmation Modal -->
<div x-show="showToggleModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40" @click="showToggleModal = false">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm p-6" @click.stop>
        <div class="text-center">
            <!-- Deactivate icon -->
            <template x-if="toggleUser.isActive">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-amber-100 mb-4">
                    <svg class="h-6 w-6 text-amber-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/></svg>
                </div>
            </template>
            <!-- Activate icon -->
            <template x-if="!toggleUser.isActive">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </template>
            <h3 class="text-lg font-semibold text-gray-900 mb-2" x-text="toggleUser.isActive ? 'Deactivate Consumer' : 'Activate Consumer'"></h3>
            <p class="text-sm text-gray-500 mb-6">Are you sure you want to <span x-text="toggleUser.isActive ? 'deactivate' : 'activate'" class="font-medium"></span> <span x-text="toggleUser.name" class="font-medium"></span>?</p>
        </div>
        <div class="flex gap-3">
            <button @click="showToggleModal = false" class="flex-1 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition">Cancel</button>
            <template x-if="toggleUser.isActive">
                <a :href="`<?= base_url('admin/consumers/deactivate/') ?>` + toggleUser.id" class="flex-1 px-4 py-2 text-sm font-medium text-white bg-amber-500 rounded-lg hover:bg-amber-600 transition text-center">Deactivate</a>
            </template>
            <template x-if="!toggleUser.isActive">
                <a :href="`<?= base_url('admin/consumers/activate/') ?>` + toggleUser.id" class="flex-1 px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 transition text-center">Activate</a>
            </template>
        </div>
    </div>
</div>
</div><!-- end x-data -->

<?= $this->endSection() ?>
