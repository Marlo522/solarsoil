<?= $this->extend('layouts/dashboard') ?>

<?= $this->section('sidebar') ?>
<a href="<?= base_url('farmer/dashboard') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/></svg>
    Dashboard
</a>
<a href="<?= base_url('farmer/products') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-primary-700 bg-primary-50 rounded-lg">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
    My Products
</a>
<a href="<?= base_url('farmer/orders') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/></svg>
    Orders
</a>
<a href="<?= base_url('farmer/profile') ?>" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
    Profile
</a>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Back Button -->
<a href="<?= base_url('farmer/products') ?>" class="inline-flex items-center gap-2 text-gray-500 hover:text-primary-700 mb-4 transition">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"/></svg>
</a>

<?php
$productStatusColors = [
    'active'       => 'bg-green-50 text-green-700',
    'inactive'     => 'bg-gray-100 text-gray-600',
    'out_of_stock' => 'bg-red-50 text-red-700',
];
$status = $product['status'] ?? 'active';
$statusLabel = match($status) {
    'active'       => 'Active',
    'inactive'     => 'Inactive',
    'out_of_stock' => 'Out of Stock',
    default        => ucfirst($status),
};
?>

<div x-data="{
    showEditModal: false,
    showDeleteModal: false,
    editProduct: <?= json_encode($product) ?>
}">

<div class="bg-white rounded-xl border border-gray-200 p-8">
    <!-- Header -->
    <div class="flex items-start justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">#PRD<?= esc($product['product_id']) ?></h1>
            <h2 class="text-lg font-semibold text-gray-700 mt-1"><?= esc($product['name']) ?></h2>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-3 py-1 text-xs font-semibold rounded-full <?= $productStatusColors[$status] ?? 'bg-gray-50 text-gray-700' ?>">
                <?= $statusLabel ?>
            </span>
            <button @click="showEditModal = true" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-amber-700 bg-amber-50 hover:bg-amber-100 rounded-lg transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/></svg>
                Edit
            </button>
            <button @click="showDeleteModal = true" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-red-700 bg-red-50 hover:bg-red-100 rounded-lg transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                Delete
            </button>
        </div>
    </div>

    <hr class="my-6 border-gray-100">

    <!-- Product Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Product Image -->
        <div class="lg:col-span-1">
            <div class="aspect-square rounded-lg overflow-hidden bg-gray-100 border border-gray-200">
                <?php if (!empty($product['image'])): ?>
                    <img src="<?= base_url('public/uploads/products/' . esc($product['image'])) ?>" alt="<?= esc($product['name']) ?>" class="w-full h-full object-cover">
                <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-24 h-24 text-gray-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                        </svg>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Product Details -->
        <div class="lg:col-span-2">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-5">
                <div>
                    <p class="text-sm font-semibold text-gray-700 mb-1">Description</p>
                    <p class="text-base text-gray-900"><?= esc($product['description'] ?? 'N/A') ?></p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-700 mb-1">Price</p>
                    <p class="text-2xl font-bold text-primary-700">&#8369;<?= number_format($product['price'], 2) ?></p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-700 mb-1">Stock Quantity</p>
                    <p class="text-base text-gray-900"><?= esc($product['stock_quantity']) ?> <?= esc($product['unit'] ?? 'units') ?></p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-700 mb-1">Category</p>
                    <p class="text-base text-gray-900"><?= esc($product['category'] ?? 'N/A') ?></p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-700 mb-1">Unit</p>
                    <p class="text-base text-gray-900"><?= esc($product['unit'] ?? 'N/A') ?></p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-700 mb-1">Date Added</p>
                    <p class="text-base text-gray-900"><?= date('M j, Y', strtotime($product['created_at'] ?? 'now')) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== EDIT PRODUCT MODAL ===== -->
<div x-show="showEditModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="fixed inset-0 bg-black/40" @click="showEditModal = false"></div>
    <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto" @click.stop>
        <div class="flex items-center justify-between p-6 border-b border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900">Edit Product</h3>
            <button @click="showEditModal = false" class="p-1.5 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form action="<?= base_url('farmer/products/edit/' . $product['product_id']) ?>"
              method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Product Name</label>
                <input type="text" name="name" x-model="editProduct.name" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Category</label>
                    <select name="category" x-model="editProduct.category" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                        <option value="">Select</option>
                        <option>Vegetables</option>
                        <option>Fruits</option>
                        <option>Grains</option>
                        <option>Herbs</option>
                        <option>Dairy</option>
                        <option>Organic</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Price (&#8369;)</label>
                    <input type="number" name="price" step="0.01" min="0" x-model="editProduct.price" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Stock Quantity</label>
                    <input type="number" name="stock_quantity" min="0" x-model="editProduct.stock_quantity" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Unit</label>
                    <select name="unit" x-model="editProduct.unit" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
                        <option value="kg">kg</option>
                        <option value="g">g</option>
                        <option value="piece">piece</option>
                        <option value="bundle">bundle</option>
                        <option value="pack">pack</option>
                        <option value="liter">liter</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Description</label>
                <textarea name="description" rows="3" x-model="editProduct.description" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition resize-none"></textarea>
            </div>
            <div x-data="{ imagePreview: null }">
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Product Image</label>
                <label class="border-2 border-dashed border-gray-200 rounded-lg p-6 text-center hover:border-primary-300 transition cursor-pointer block">
                    <template x-if="imagePreview">
                        <img :src="imagePreview" class="w-32 h-32 object-cover rounded-lg mx-auto mb-3">
                    </template>
                    <template x-if="!imagePreview">
                        <svg class="w-8 h-8 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909"/></svg>
                    </template>
                    <p class="text-sm text-gray-500">Click to upload a new image</p>
                    <p class="text-xs text-gray-400 mt-1">PNG, JPG up to 5MB</p>
                    <input type="file" name="image" accept="image/*" class="hidden" @change="imagePreview = URL.createObjectURL($event.target.files[0])">
                </label>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" @click="showEditModal = false" class="flex-1 px-4 py-2.5 text-sm font-medium text-gray-700 border border-gray-200 hover:bg-gray-50 rounded-lg transition">Cancel</button>
                <button type="submit" class="flex-1 px-4 py-2.5 text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 rounded-lg transition">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<!-- ===== DELETE PRODUCT MODAL ===== -->
<div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="fixed inset-0 bg-black/40" @click="showDeleteModal = false"></div>
    <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-sm" @click.stop>
        <div class="p-6 text-center">
            <div class="w-14 h-14 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Delete Product</h3>
            <p class="text-sm text-gray-500 mb-6">Are you sure you want to delete <span class="font-medium text-gray-700"><?= esc($product['name']) ?></span>? This action cannot be undone.</p>
            <div class="flex gap-3">
                <button type="button" @click="showDeleteModal = false" class="flex-1 px-4 py-2.5 text-sm font-medium text-gray-700 border border-gray-200 hover:bg-gray-50 rounded-lg transition">Cancel</button>
                <form action="<?= base_url('farmer/products/delete/' . $product['product_id']) ?>" method="POST" class="flex-1">
                    <button type="submit" class="w-full px-4 py-2.5 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div><!-- end x-data wrapper -->

<?= $this->endSection() ?>
