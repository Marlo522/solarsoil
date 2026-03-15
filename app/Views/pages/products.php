<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-6">
        <a href="<?= base_url('/') ?>" class="hover:text-primary-600 transition">Home</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
        <span class="text-gray-900 font-medium">All Products</span>
    </nav>

    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Sidebar: Categories -->
        <aside class="lg:w-64 shrink-0" x-data="{ open: false }">
            <button @click="open = !open" class="lg:hidden w-full flex items-center justify-between px-4 py-3 bg-white border border-gray-200 rounded-lg mb-4">
                <span class="text-sm font-medium text-gray-700">Filter by Category</span>
                <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 text-gray-400 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
            </button>

            <div :class="open ? 'block' : 'hidden'" class="lg:block bg-white border border-gray-100 rounded-xl p-5">
                <h3 class="font-semibold text-gray-900 text-sm mb-4">Categories</h3>
                <ul class="space-y-1">
                    <?php
                    $selectedCategory = $selectedCategory ?? 'All';
                    $categoryList = $categoryList ?? ['All', 'Vegetables', 'Fruits', 'Grains', 'Herbs', 'Dairy', 'Organic'];
                    foreach ($categoryList as $cat):
                        $catUrl = base_url('products') . '?category=' . urlencode($cat === 'All' ? '' : $cat);
                        // Preserve existing search/price/sort when switching category
                        if (!empty($search)) $catUrl .= '&search=' . urlencode($search);
                        if (!empty($minPrice)) $catUrl .= '&min_price=' . urlencode($minPrice);
                        if (!empty($maxPrice)) $catUrl .= '&max_price=' . urlencode($maxPrice);
                        if (($sort ?? 'latest') !== 'latest') $catUrl .= '&sort=' . urlencode($sort);
                        $isActive = ($cat === $selectedCategory) || ($cat === 'All' && empty($selectedCategory));
                    ?>
                    <li>
                        <a href="<?= $catUrl ?>"
                            class="block px-3 py-2 text-sm rounded-lg transition <?= $isActive ? 'bg-primary-50 text-primary-700 font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' ?>">
                            <?= esc($cat) ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <!-- Price Range -->
                <form method="GET" action="<?= base_url('products') ?>" class="mt-6 pt-6 border-t border-gray-100">
                    <!-- Preserve category and search when applying price filter -->
                    <?php if (!empty($selectedCategory) && $selectedCategory !== 'All'): ?>
                        <input type="hidden" name="category" value="<?= esc($selectedCategory) ?>">
                    <?php endif; ?>
                    <?php if (!empty($search)): ?>
                        <input type="hidden" name="search" value="<?= esc($search) ?>">
                    <?php endif; ?>
                    <?php if (!empty($sort) && $sort !== 'latest'): ?>
                        <input type="hidden" name="sort" value="<?= esc($sort) ?>">
                    <?php endif; ?>
                    <h3 class="font-semibold text-gray-900 text-sm mb-4">Price Range</h3>
                    <div class="flex items-center gap-2">
                        <input type="number" name="min_price" value="<?= esc($minPrice ?? '') ?>" placeholder="Min" min="0" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <span class="text-gray-400 text-sm">-</span>
                        <input type="number" name="max_price" value="<?= esc($maxPrice ?? '') ?>" placeholder="Max" min="0" class="w-full px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                    </div>
                    <button type="submit" class="w-full mt-3 px-3 py-2 bg-primary-600 text-white text-xs font-medium rounded-lg hover:bg-primary-700 transition">Apply Filter</button>
                    <?php if (!empty($minPrice) || !empty($maxPrice)): ?>
                        <a href="<?= base_url('products') . (!empty($selectedCategory) && $selectedCategory !== 'All' ? '?category=' . urlencode($selectedCategory) : '') ?>" class="block text-center mt-2 text-xs text-gray-500 hover:text-primary-600">Clear price filter</a>
                    <?php endif; ?>
                </form>
            </div>
        </aside>

        <!-- Main: Product Grid -->
        <div class="flex-1">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900"><?= ($selectedCategory && $selectedCategory !== 'All') ? esc($selectedCategory) : 'All Products' ?></h1>
                    <p class="text-sm text-gray-500 mt-1">
                        <?php if (!empty($search)): ?>Results for "<?= esc($search) ?>" &mdash; <?php endif; ?>
                        Showing <?= count($products ?? []) ?> products
                    </p>
                </div>
                <form method="GET" action="<?= base_url('products') ?>" class="flex items-center gap-3">
                    <!-- Preserve category and price filters -->
                    <?php if (!empty($selectedCategory) && $selectedCategory !== 'All'): ?>
                        <input type="hidden" name="category" value="<?= esc($selectedCategory) ?>">
                    <?php endif; ?>
                    <?php if (!empty($minPrice)): ?>
                        <input type="hidden" name="min_price" value="<?= esc($minPrice) ?>">
                    <?php endif; ?>
                    <?php if (!empty($maxPrice)): ?>
                        <input type="hidden" name="max_price" value="<?= esc($maxPrice) ?>">
                    <?php endif; ?>
                    <!-- Search Bar -->
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                        <input type="text" name="search" value="<?= esc($search ?? '') ?>" placeholder="Search products..."
                               class="w-48 sm:w-64 pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-primary-500 transition" />
                    </div>
                    <select name="sort" onchange="this.form.submit()" class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <option value="latest" <?= ($sort ?? 'latest') === 'latest' ? 'selected' : '' ?>>Sort by: Latest</option>
                        <option value="price_asc" <?= ($sort ?? '') === 'price_asc' ? 'selected' : '' ?>>Price: Low to High</option>
                        <option value="price_desc" <?= ($sort ?? '') === 'price_desc' ? 'selected' : '' ?>>Price: High to Low</option>
                        <option value="name_asc" <?= ($sort ?? '') === 'name_asc' ? 'selected' : '' ?>>Name: A-Z</option>
                    </select>
                </form>
            </div>

            <!-- Products Grid -->
            <?php $allProducts = $products ?? []; ?>

            <?php if (empty($allProducts)): ?>
                <div class="text-center py-20">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/></svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-1">No products found</h3>
                    <p class="text-sm text-gray-500">Try adjusting your filters or check back later.</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                    <?php foreach ($allProducts as $product): ?>
                        <?= view('components/product_card', ['product' => $product]) ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
