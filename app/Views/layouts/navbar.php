<!-- Navbar -->
<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm" x-data="{ mobileOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Left: Logo -->
            <a href="<?= base_url('/') ?>" class="flex items-center gap-2 shrink-0">
                <div class="w-9 h-9 bg-primary-600 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 007.92 12.446A9 9 0 1112 2.992z"/><path stroke-linecap="round" stroke-linejoin="round" d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89-.66M17 8l-4 1m4-1l1 4"/></svg>
                </div>
                <span class="text-xl font-bold text-primary-700">Solar<span class="text-earth-500">Soil</span></span>
            </a>

            <!-- Center: Links (desktop) -->
            <div class="hidden md:flex items-center gap-1">
                <a href="<?= base_url('/') ?>" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-primary-700 hover:bg-primary-50 rounded-lg transition">Home</a>
                <a href="<?= base_url('products') ?>" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-primary-700 hover:bg-primary-50 rounded-lg transition">All Products</a>
                <a href="<?= base_url('about') ?>" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-primary-700 hover:bg-primary-50 rounded-lg transition">About</a>
            </div>

            <!-- Right: Cart + Auth -->
            <div class="hidden md:flex items-center gap-3">
                <a href="<?= base_url('cart') ?>" class="relative p-2 text-gray-500 hover:text-primary-700 hover:bg-primary-50 rounded-lg transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121 0 2.002-.881 1.745-1.97l-1.876-7.89A1.125 1.125 0 0016.744 3H7.106l-.383-1.437A1.125 1.125 0 005.636 .728H2.25M6.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/></svg>
                    <?php if (isset($cartCount) && $cartCount > 0): ?>
                        <span class="absolute -top-1 -right-1 w-5 h-5 bg-primary-600 text-white text-xs font-bold rounded-full flex items-center justify-center"><?= esc($cartCount) ?></span>
                    <?php endif; ?>
                </a>
                <?php if (session()->get('user_id')): ?>
                    <a href="<?= base_url('profile') ?>" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-700 hover:bg-primary-50 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                        Profile
                    </a>
                    <a href="<?= base_url('logout') ?>" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-red-500 hover:text-red-700 hover:bg-red-50 rounded-lg transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3-3l3-3m0 0l-3-3m3 3H9"/></svg>
                        Logout
                    </a>
                <?php else: ?>
                    <a href="<?= base_url('login') ?>" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-primary-700 hover:bg-primary-50 rounded-lg transition">Log In</a>
                    <a href="<?= base_url('register') ?>" class="px-5 py-2 text-sm font-semibold text-white bg-primary-600 hover:bg-primary-700 rounded-lg transition shadow-sm">Sign Up</a>
                <?php endif; ?>
            </div>

            <!-- Mobile toggle -->
            <button @click="mobileOpen = !mobileOpen" class="md:hidden p-2 text-gray-500 hover:text-primary-700 rounded-lg">
                <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Mobile menu -->
        <div x-show="mobileOpen" x-cloak x-transition class="md:hidden pb-4 border-t border-gray-100 mt-2 pt-3 space-y-1">
            <a href="<?= base_url('/') ?>" class="block px-4 py-2 text-sm font-medium text-gray-600 hover:text-primary-700 hover:bg-primary-50 rounded-lg">Home</a>
            <a href="<?= base_url('products') ?>" class="block px-4 py-2 text-sm font-medium text-gray-600 hover:text-primary-700 hover:bg-primary-50 rounded-lg">All Products</a>
            <a href="<?= base_url('about') ?>" class="block px-4 py-2 text-sm font-medium text-gray-600 hover:text-primary-700 hover:bg-primary-50 rounded-lg">About</a>
            <a href="<?= base_url('cart') ?>" class="block px-4 py-2 text-sm font-medium text-gray-600 hover:text-primary-700 hover:bg-primary-50 rounded-lg">Cart</a>
            <div class="pt-2 border-t border-gray-100 mt-2 space-y-1">
                <?php if (session()->get('user_id')): ?>
                    <a href="<?= base_url('profile') ?>" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-primary-50 rounded-lg">Profile</a>
                    <a href="<?= base_url('logout') ?>" class="block px-4 py-2 text-sm font-medium text-red-500 hover:bg-red-50 rounded-lg">Logout</a>
                <?php else: ?>
                    <a href="<?= base_url('login') ?>" class="block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-primary-50 rounded-lg">Log In</a>
                    <a href="<?= base_url('register') ?>" class="block px-4 py-2 text-sm font-semibold text-white bg-primary-600 hover:bg-primary-700 rounded-lg text-center">Sign Up</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
