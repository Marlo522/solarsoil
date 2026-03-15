<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-primary-800 via-primary-700 to-primary-600">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1500937386664-56d1dfef3854?w=1600&h=700&fit=crop" alt="Farm landscape" class="w-full h-full object-cover opacity-20">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-primary-900/80 to-primary-700/40"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-36">
        <div class="max-w-2xl">
            <span class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 backdrop-blur-sm text-primary-100 text-sm rounded-full mb-6">
                <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></span>
                Farm-fresh produce delivered daily
            </span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                Fresh From Farm<br>
                <span class="text-primary-200">to Your Table</span>
            </h1>
            <p class="text-lg text-primary-100/80 leading-relaxed mb-8 max-w-lg">
                Connect directly with local farmers and get the freshest produce delivered to your doorstep. Support sustainable agriculture.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="<?= base_url('products') ?>" class="inline-flex items-center px-7 py-3.5 bg-white text-primary-700 font-semibold rounded-xl hover:bg-primary-50 transition shadow-lg shadow-primary-900/30">
                    Shop Now
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="bg-white border-y border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="flex items-center justify-between mb-10">
            <div>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Featured Products</h2>
                <p class="text-gray-500">Handpicked fresh produce from our trusted farmers</p>
            </div>
            <a href="<?= base_url('products') ?>" class="hidden sm:inline-flex items-center gap-1 px-4 py-2 text-sm font-medium text-primary-700 hover:bg-primary-50 rounded-lg transition">
                View All
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php $featuredProducts = $products ?? []; ?>
            <?php if (empty($featuredProducts)): ?>
                <p class="col-span-4 text-center text-sm text-gray-400 py-10">No featured products available at the moment.</p>
            <?php else: ?>
                <?php foreach ($featuredProducts as $product): ?>
                    <?= view('components/product_card', ['product' => $product]) ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="sm:hidden text-center mt-8">
            <a href="<?= base_url('products') ?>" class="inline-flex items-center gap-1 px-6 py-2.5 text-sm font-medium text-primary-700 border border-primary-200 hover:bg-primary-50 rounded-lg transition">
                View All Products
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- Why Buy From Farmers -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3">Why Buy Directly From Farmers?</h2>
        <p class="text-gray-500 max-w-lg mx-auto">Discover the benefits of connecting directly with local agricultural producers</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl border border-gray-100 p-6 text-center hover:shadow-lg transition">
            <div class="w-14 h-14 bg-green-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">100% Fresh</h3>
            <p class="text-sm text-gray-500 leading-relaxed">Products come straight from the farm, ensuring maximum freshness and quality.</p>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 p-6 text-center hover:shadow-lg transition">
            <div class="w-14 h-14 bg-amber-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-amber-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">Fair Prices</h3>
            <p class="text-sm text-gray-500 leading-relaxed">No middlemen means better prices for you and fair income for our farmers.</p>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 p-6 text-center hover:shadow-lg transition">
            <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/></svg>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">Fast Delivery</h3>
            <p class="text-sm text-gray-500 leading-relaxed">Quick and reliable delivery right to your doorstep within hours of harvest.</p>
        </div>
        <div class="bg-white rounded-xl border border-gray-100 p-6 text-center hover:shadow-lg transition">
            <div class="w-14 h-14 bg-primary-50 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 10-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.692-.8 1.257l.228 1.378"/></svg>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">Eco-Friendly</h3>
            <p class="text-sm text-gray-500 leading-relaxed">Support sustainable farming practices and help reduce food miles in your community.</p>
        </div>
    </div>
</section>

<!-- Farmer Community Section -->
<section class="relative overflow-hidden bg-earth-500">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=1600&h=600&fit=crop" alt="Farmers harvesting" class="w-full h-full object-cover opacity-15">
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-6">Join Our Farmer Community</h2>
                <p class="text-earth-100/80 text-lg leading-relaxed mb-8">Are you a local farmer? Join SolarSoil and start selling your fresh produce directly to consumers. No middlemen, fair prices, and a platform built for you.</p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-3 text-earth-100">
                        <svg class="w-5 h-5 text-green-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                        <span class="text-sm">Free to register and start selling</span>
                    </li>
                    <li class="flex items-center gap-3 text-earth-100">
                        <svg class="w-5 h-5 text-green-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                        <span class="text-sm">Manage your products with an easy dashboard</span>
                    </li>
                    <li class="flex items-center gap-3 text-earth-100">
                        <svg class="w-5 h-5 text-green-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                        <span class="text-sm">Reach thousands of customers across the Philippines</span>
                    </li>
                    <li class="flex items-center gap-3 text-earth-100">
                        <svg class="w-5 h-5 text-green-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                        <span class="text-sm">Secure and timely payments</span>
                    </li>
                </ul>
                <a href="<?= base_url('register') ?>" class="inline-flex items-center px-7 py-3.5 bg-white text-earth-600 font-semibold rounded-xl hover:bg-gray-50 transition shadow-lg">
                    Become a Seller
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
            </div>
            <div class="hidden lg:grid grid-cols-2 gap-4">
                <div class="space-y-4">
                    <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=400&h=300&fit=crop" alt="Farmer with produce" class="rounded-xl w-full object-cover h-48 shadow-lg">
                    <img src="https://images.unsplash.com/photo-1595855759920-86582396756a?w=400&h=200&fit=crop" alt="Fresh vegetables" class="rounded-xl w-full object-cover h-36 shadow-lg">
                </div>
                <div class="space-y-4 pt-8">
                    <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?w=400&h=200&fit=crop" alt="Vegetable market" class="rounded-xl w-full object-cover h-36 shadow-lg">
                    <img src="https://images.unsplash.com/photo-1607305387299-a3d9611cd469?w=400&h=300&fit=crop" alt="Harvesting crops" class="rounded-xl w-full object-cover h-48 shadow-lg">
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
