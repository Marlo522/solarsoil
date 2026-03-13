<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
// Product data is now injected by the controller securely.
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-8">
        <a href="<?= base_url('/') ?>" class="hover:text-primary-600 transition">Home</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
        <a href="<?= base_url('products') ?>" class="hover:text-primary-600 transition">Products</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
        <span class="text-gray-900 font-medium"><?= esc($product['name']) ?></span>
    </nav>

    <div class="grid lg:grid-cols-2 gap-10">
        <!-- Left: Images -->
        <div x-data="{ activeImage: 0 }">
            <!-- Main Image -->
            <div class="aspect-square bg-gray-50 rounded-2xl overflow-hidden mb-4">
                <img src="https://images.unsplash.com/photo-1488459716781-31db52582fe9?w=700&h=700&fit=crop"
                     alt="<?= esc($product['name']) ?>"
                     class="w-full h-full object-cover">
            </div>
            <!-- Thumbnails -->
            <div class="grid grid-cols-4 gap-3">
                <?php for ($i = 0; $i < 4; $i++): ?>
                <button @click="activeImage = <?= $i ?>"
                    :class="activeImage === <?= $i ?> ? 'ring-2 ring-primary-500' : 'ring-1 ring-gray-200'"
                    class="aspect-square bg-gray-50 rounded-lg overflow-hidden transition">
                    <img src="https://images.unsplash.com/photo-1488459716781-31db52582fe9?w=200&h=200&fit=crop"
                         alt="Thumbnail" class="w-full h-full object-cover">
                </button>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Right: Product Info -->
        <div>
            <!-- Category Badge -->
            <span class="inline-flex items-center px-3 py-1 bg-primary-50 text-primary-700 text-xs font-medium rounded-full mb-4"><?= esc($product['category']) ?></span>

            <h1 class="text-3xl font-bold text-gray-900 mb-2"><?= esc($product['name']) ?></h1>

            <!-- Rating (placeholder) -->
            <div class="flex items-center gap-2 mb-6">
                <div class="flex text-amber-400">
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <?php endfor; ?>
                </div>
                <span class="text-sm text-gray-500">(4.8) &middot; 128 reviews</span>
            </div>

            <!-- Price -->
            <div class="flex items-baseline gap-3 mb-6">
                <span class="text-3xl font-bold text-primary-700">&#8369;<?= number_format($product['price'], 2) ?></span>
                <span class="text-sm text-gray-400">per kg</span>
            </div>

            <!-- Description -->
            <div class="mb-8">
                <h3 class="text-sm font-semibold text-gray-900 mb-2">Description</h3>
                <p class="text-sm text-gray-600 leading-relaxed"><?= esc($product['description']) ?></p>
            </div>

            <!-- Stock -->
            <div class="flex items-center gap-2 mb-8">
                <?php if ($product['stock_quantity'] > 0): ?>
                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                    <span class="text-sm text-green-700 font-medium">In Stock</span>
                    <span class="text-sm text-gray-400">&middot; <?= $product['stock_quantity'] ?> available</span>
                <?php else: ?>
                    <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                    <span class="text-sm text-red-600 font-medium">Out of Stock</span>
                <?php endif; ?>
            </div>

            <!-- Quantity + Actions -->
            <div x-data="{ qty: 1 }" class="space-y-4">
                <form action="<?= base_url('cart/add') ?>" method="POST">
                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                    
                    <!-- We actually handle native add from product detail by forcing the CartController 
                         to increment safely, but standard CI implementation expects only adding 1 currently 
                         without deeper logic changes. We will mimic single adds for now or ignore qty visual stepper.
                    -->
                    
                    <!-- Quantity -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                        <div class="inline-flex items-center border border-gray-200 rounded-lg overflow-hidden opacity-50 cursor-not-allowed">
                            <span class="px-5 py-2.5 text-sm font-medium text-gray-900 border-x border-gray-200 min-w-[3rem] text-center">1</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Quantity is adjusted in the Cart.</p>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-3">
                        <button type="submit" class="flex-1 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition shadow-sm <?= $product['stock_quantity'] <= 0 ? 'opacity-50 cursor-not-allowed' : '' ?>" <?= $product['stock_quantity'] <= 0 ? 'disabled' : '' ?>>
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121 0 2.002-.881 1.745-1.97l-1.876-7.89A1.125 1.125 0 0016.744 3H7.106"/></svg>
                                Add to Cart
                            </span>
                        </button>
                        <button type="button" class="px-6 py-3 bg-earth-500 text-white font-semibold rounded-xl hover:bg-earth-600 transition shadow-sm <?= $product['stock_quantity'] <= 0 ? 'opacity-50 cursor-not-allowed' : '' ?>" <?= $product['stock_quantity'] <= 0 ? 'disabled' : '' ?>>
                            Buy Now
                        </button>
                    </div>
                </form>
            </div>

            <!-- Meta -->
            <div class="mt-8 pt-6 border-t border-gray-100 space-y-3">
                <div class="flex items-center gap-3 text-sm">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/></svg>
                    <span class="text-gray-600">Free delivery for orders over &#8369;500</span>
                </div>
                <div class="flex items-center gap-3 text-sm">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                    <span class="text-gray-600">Quality guaranteed fresh from the farm</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
