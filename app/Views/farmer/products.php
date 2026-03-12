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

<?php
$productStatusColors = [
    'active'       => 'bg-green-50 text-green-700',
    'inactive'     => 'bg-gray-100 text-gray-600',
    'out_of_stock' => 'bg-red-50 text-red-700',
];
$products = $products ?? [];
?>

<div x-data="{
    showAddModal: false,
    showEditModal: false,
    showDeleteModal: false,
    editProduct: { product_id: '', name: '', category: '', price: '', stock_quantity: '', description: '' },
    deleteProduct: { product_id: '', name: '' },
    openEdit(product) {
        this.editProduct = { ...product, description: product.description || '' };
        this.showEditModal = true;
    },
    openDelete(product) {
        this.deleteProduct = { product_id: product.product_id, name: product.name };
        this.showDeleteModal = true;
    }
}">

<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-900">My Products</h1>
    <button @click="showAddModal = true" class="inline-flex items-center gap-2 px-4 py-2 bg-primary-600 text-white text-sm font-medium rounded-lg hover:bg-primary-700 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
        Add Product
    </button>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
    <?php
    $totalProducts  = count($products);
    $activeProducts = count(array_filter($products, fn($p) => ($p['status'] ?? '') === 'active'));
    $outOfStock     = count(array_filter($products, fn($p) => ($p['stock_quantity'] ?? 1) == 0));
    $categories     = count(array_unique(array_column($products, 'category')));
    ?>
    <div class="bg-white rounded-xl border border-gray-100 p-4">
        <p class="text-xs font-medium text-gray-500 uppercase">Total Products</p>
        <p class="text-2xl font-bold text-gray-900 mt-1"><?= $totalProducts ?></p>
    </div>
    <div class="bg-white rounded-xl border border-gray-100 p-4">
        <p class="text-xs font-medium text-gray-500 uppercase">Active</p>
        <p class="text-2xl font-bold text-green-600 mt-1"><?= $activeProducts ?></p>
    </div>
    <div class="bg-white rounded-xl border border-gray-100 p-4">
        <p class="text-xs font-medium text-gray-500 uppercase">Out of Stock</p>
        <p class="text-2xl font-bold text-red-600 mt-1"><?= $outOfStock ?></p>
    </div>
    <div class="bg-white rounded-xl border border-gray-100 p-4">
        <p class="text-xs font-medium text-gray-500 uppercase">Categories</p>
        <p class="text-2xl font-bold text-primary-600 mt-1"><?= $categories ?></p>
    </div>
</div>

<!-- Search and Filter -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
    <div class="relative w-full sm:w-64">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
        <input type="text" placeholder="Search product ID or name..."
               class="w-full pl-10 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition" />
    </div>
    <div class="flex items-center gap-3">
        <div class="flex items-center gap-2">
            <span class="text-sm text-gray-500">Category:</span>
            <select class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none bg-white">
                <option value="all">All</option>
                <option value="vegetables">Vegetables</option>
                <option value="fruits">Fruits</option>
                <option value="herbs">Herbs</option>
                <option value="grains">Grains</option>
                <option value="dairy">Dairy</option>
                <option value="organic">Organic</option>
            </select>
        </div>
        <div class="flex items-center gap-2">
            <span class="text-sm text-gray-500">Status:</span>
            <select class="px-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none bg-white">
                <option value="all">All</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="out_of_stock">Out of Stock</option>
            </select>
        </div>
    </div>
</div>

<!-- Table -->
<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-primary-800 text-white">
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Product ID</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Product Name</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Stock</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Date Added</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">#PRD<?= esc($product['product_id']) ?></td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-gray-100 rounded-lg overflow-hidden shrink-0">
                                    <?php if (!empty($product['image'])): ?>
                                        <img src="<?= base_url('public/uploads/products/' . esc($product['image'])) ?>" alt="<?= esc($product['name']) ?>" class="w-full h-full object-cover">
                                    <?php else: ?>
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909"/></svg>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <span class="text-sm font-medium text-gray-900"><?= esc($product['name']) ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700"><?= esc($product['category']) ?></td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">&#8369;<?= number_format($product['price'], 2) ?></td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            <?php if (($product['stock_quantity'] ?? 0) == 0): ?>
                                <span class="text-red-600 font-medium">0</span>
                            <?php elseif ($product['stock_quantity'] <= 20): ?>
                                <span class="text-amber-600 font-medium"><?= esc($product['stock_quantity']) ?></span>
                            <?php else: ?>
                                <?= esc($product['stock_quantity']) ?>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php
                            $status = $product['status'] ?? 'active';
                            $statusLabel = match($status) {
                                'active'       => 'Active',
                                'inactive'     => 'Inactive',
                                'out_of_stock' => 'Out of Stock',
                                default        => ucfirst($status),
                            };
                            ?>
                            <span class="px-2.5 py-0.5 text-xs font-medium rounded-full <?= $productStatusColors[$status] ?? 'bg-gray-50 text-gray-700' ?>">
                                <?= $statusLabel ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500"><?= date('M d, Y', strtotime($product['created_at'] ?? 'now')) ?></td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-1">
                                <a href="<?= base_url('farmer/products/' . $product['product_id']) ?>" class="p-1.5 text-gray-400 hover:text-primary-600 hover:bg-primary-50 rounded-lg transition" title="View">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </a>
                                <button @click="openEdit(<?= esc(json_encode($product), 'attr') ?>)" class="p-1.5 text-gray-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg>
                                </button>
                                <button @click="openDelete(<?= esc(json_encode($product), 'attr') ?>)" class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Delete">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="px-6 py-12 text-center text-sm text-gray-400">No products found. Add your first product!</td>
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
        <a href="<?= base_url('farmer/products?page=' . ($currentPage - 1)) ?>" class="px-3 py-1.5 text-sm text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50 transition">Prev</a>
    <?php endif; ?>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="<?= base_url('farmer/products?page=' . $i) ?>"
           class="px-3 py-1.5 text-sm rounded-lg transition <?= $i === $currentPage ? 'bg-primary-700 text-white' : 'text-gray-600 border border-gray-200 hover:bg-gray-50' ?>">
            <?= $i ?>
        </a>
    <?php endfor; ?>
    <?php if ($currentPage < $totalPages): ?>
        <a href="<?= base_url('farmer/products?page=' . ($currentPage + 1)) ?>" class="px-3 py-1.5 text-sm text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50 transition">Next</a>
    <?php endif; ?>
</div>
<?php endif; ?>

<!-- ===== ADD PRODUCT MODAL ===== -->
<div x-show="showAddModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="fixed inset-0 bg-black/40" @click="showAddModal = false"></div>
    <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto" @click.stop>
        <div class="flex items-center justify-between p-6 border-b border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900">Add New Product</h3>
            <button @click="showAddModal = false" class="p-1.5 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form action="<?= base_url('farmer/products/add') ?>" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Product Name</label>
                <input type="text" name="name" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition" placeholder="e.g. Fresh Tomatoes">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Category</label>
                    <select name="category" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
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
                    <input type="number" name="price" step="0.01" min="0" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition" placeholder="0.00">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Stock Quantity</label>
                    <input type="number" name="stock_quantity" min="0" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition" placeholder="0">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Unit</label>
                    <select name="unit" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition">
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
                <textarea name="description" rows="3" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition resize-none" placeholder="Describe your product..."></textarea>
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
                    <p class="text-sm text-gray-500">Click to upload or drag and drop</p>
                    <p class="text-xs text-gray-400 mt-1">PNG, JPG up to 5MB</p>
                    <input type="file" name="image" accept="image/*" class="hidden" @change="imagePreview = URL.createObjectURL($event.target.files[0])">
                </label>
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" @click="showAddModal = false" class="flex-1 px-4 py-2.5 text-sm font-medium text-gray-700 border border-gray-200 hover:bg-gray-50 rounded-lg transition">Cancel</button>
                <button type="submit" class="flex-1 px-4 py-2.5 text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 rounded-lg transition">Add Product</button>
            </div>
        </form>
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
        <form :action="'<?= base_url('farmer/products/edit/') ?>' + editProduct.product_id"
              method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            <input type="hidden" name="product_id" :value="editProduct.product_id">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Product Name</label>
                <input type="text" name="name" x-model="editProduct.name" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition" placeholder="e.g. Fresh Tomatoes">
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
                    <input type="number" name="price" step="0.01" min="0" x-model="editProduct.price" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition" placeholder="0.00">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Stock Quantity</label>
                    <input type="number" name="stock_quantity" min="0" x-model="editProduct.stock_quantity" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition" placeholder="0">
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
                <textarea name="description" rows="3" x-model="editProduct.description" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 transition resize-none" placeholder="Describe your product..."></textarea>
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
            <p class="text-sm text-gray-500 mb-6">Are you sure you want to delete <span class="font-medium text-gray-700" x-text="deleteProduct.name"></span>? This action cannot be undone.</p>
            <div class="flex gap-3">
                <button type="button" @click="showDeleteModal = false" class="flex-1 px-4 py-2.5 text-sm font-medium text-gray-700 border border-gray-200 hover:bg-gray-50 rounded-lg transition">Cancel</button>
                <form :action="'<?= base_url('farmer/products/delete/') ?>' + deleteProduct.product_id" method="POST" class="flex-1">
                    <input type="hidden" name="product_id" :value="deleteProduct.product_id">
                    <button type="submit" class="w-full px-4 py-2.5 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div><!-- end x-data wrapper -->

<?= $this->endSection() ?>
