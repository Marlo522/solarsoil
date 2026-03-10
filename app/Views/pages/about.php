<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Banner -->
<section class="relative overflow-hidden bg-gradient-to-br from-primary-800 via-primary-700 to-primary-600">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1500937386664-56d1dfef3854?w=1600&h=500&fit=crop" alt="Farm landscape" class="w-full h-full object-cover opacity-20">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-primary-900/80 to-primary-700/40"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28 text-center">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4">About SolarSoil</h1>
        <p class="text-lg text-primary-100/80 max-w-2xl mx-auto">Connecting local farmers directly with consumers for fresher produce, fairer prices, and a more sustainable food system.</p>
    </div>
</section>

<!-- Mission Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid lg:grid-cols-2 gap-12 items-center">
        <div>
            <span class="inline-flex items-center px-3 py-1 bg-primary-50 text-primary-700 text-xs font-semibold rounded-full mb-4">Our Mission</span>
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Empowering Farmers, Nourishing Communities</h2>
            <p class="text-gray-600 leading-relaxed mb-4">
                SolarSoil was built with a simple vision — to bridge the gap between hardworking local farmers and the communities they serve. We believe everyone deserves access to fresh, affordable produce while farmers earn what they truly deserve.
            </p>
            <p class="text-gray-600 leading-relaxed">
                By removing middlemen from the supply chain, we ensure that farmers get fair prices for their harvest and consumers enjoy produce that's fresher, healthier, and more affordable.
            </p>
        </div>
        <div class="rounded-2xl overflow-hidden shadow-lg">
            <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=600&h=400&fit=crop" alt="Farmer in field" class="w-full h-80 object-cover">
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="bg-gray-50 border-y border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-12">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3">What We Stand For</h2>
            <p class="text-gray-500 max-w-lg mx-auto">Our core values guide everything we do at SolarSoil</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl border border-gray-100 p-6 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Freshness Guaranteed</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Products go straight from the farm to your table — no long storage, no preservatives, just pure freshness.</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-100 p-6 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Fair Trade</h3>
                <p class="text-sm text-gray-500 leading-relaxed">We ensure farmers receive fair compensation for their hard work, creating a sustainable livelihood for rural communities.</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-100 p-6 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-primary-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 10-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036"/></svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Sustainability</h3>
                <p class="text-sm text-gray-500 leading-relaxed">By reducing food miles and supporting local agriculture, we help protect the environment for future generations.</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-100 p-6 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/></svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Community First</h3>
                <p class="text-sm text-gray-500 leading-relaxed">We strengthen local communities by connecting producers and consumers, building relationships built on trust.</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-100 p-6 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Passion for Quality</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Every product on our platform is carefully curated to meet the highest standards of quality and taste.</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-100 p-6 hover:shadow-lg transition">
                <div class="w-12 h-12 bg-violet-50 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Innovation</h3>
                <p class="text-sm text-gray-500 leading-relaxed">We leverage technology to make farm-to-table commerce seamless, efficient, and accessible to everyone.</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3">How It Works</h2>
        <p class="text-gray-500 max-w-lg mx-auto">Getting fresh produce from local farmers is easy with SolarSoil</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="text-center">
            <div class="w-16 h-16 bg-primary-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <span class="text-2xl font-bold text-primary-700">1</span>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">Browse Products</h3>
            <p class="text-sm text-gray-500 leading-relaxed">Explore a wide variety of fresh produce listed by verified local farmers in your area.</p>
        </div>
        <div class="text-center">
            <div class="w-16 h-16 bg-primary-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <span class="text-2xl font-bold text-primary-700">2</span>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">Place Your Order</h3>
            <p class="text-sm text-gray-500 leading-relaxed">Add items to your cart and checkout securely. Your order goes directly to the farmer.</p>
        </div>
        <div class="text-center">
            <div class="w-16 h-16 bg-primary-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <span class="text-2xl font-bold text-primary-700">3</span>
            </div>
            <h3 class="font-semibold text-gray-900 mb-2">Enjoy Fresh Produce</h3>
            <p class="text-sm text-gray-500 leading-relaxed">Receive farm-fresh products delivered right to your doorstep within hours of harvest.</p>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="relative overflow-hidden bg-earth-500">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=1600&h=400&fit=crop" alt="Farmers" class="w-full h-full object-cover opacity-15">
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Ready to Get Started?</h2>
        <p class="text-earth-100/80 text-lg mb-8 max-w-xl mx-auto">Whether you're a consumer looking for fresh produce or a farmer ready to sell, SolarSoil is the platform for you.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="<?= base_url('products') ?>" class="inline-flex items-center px-7 py-3.5 bg-white text-earth-600 font-semibold rounded-xl hover:bg-gray-50 transition shadow-lg">
                Shop Now
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
            </a>
            <a href="<?= base_url('register') ?>" class="inline-flex items-center px-7 py-3.5 bg-transparent text-white font-semibold rounded-xl border-2 border-white/30 hover:bg-white/10 transition">
                Become a Seller
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
