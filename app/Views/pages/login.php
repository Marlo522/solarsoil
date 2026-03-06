<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>

<div class="h-screen flex overflow-hidden">
    <!-- Left: Image -->
    <div class="hidden lg:block lg:w-1/2 relative">
        <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=800&h=1000&fit=crop" alt="Fresh farm produce" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-900/70 via-primary-800/50 to-transparent"></div>
        <div class="absolute inset-0 flex flex-col justify-between p-10">
            <a href="<?= base_url('/') ?>" class="flex items-center gap-2.5">
                <div class="w-9 h-9 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 007.92 12.446A9 9 0 1112 2.992z"/><path stroke-linecap="round" stroke-linejoin="round" d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89-.66M17 8l-4 1m4-1l1 4"/></svg>
                </div>
                <span class="text-lg font-bold text-white">SolarSoil</span>
            </a>
            <div class="text-white">
                <p class="text-3xl font-bold leading-tight mb-3">Fresh produce,<br>direct from local farms</p>
                <p class="text-white/70 text-sm max-w-sm">Supporting Filipino farmers while enjoying the freshest harvest delivered to your doorstep.</p>
            </div>
        </div>
    </div>

    <!-- Right: Form -->
    <div class="flex-1 flex items-center justify-center px-6 sm:px-12 bg-white">
        <div class="w-full max-w-sm">
            <!-- Mobile logo -->
            <a href="<?= base_url('/') ?>" class="lg:hidden flex items-center gap-2.5 mb-10">
                <div class="w-9 h-9 bg-primary-600 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 007.92 12.446A9 9 0 1112 2.992z"/><path stroke-linecap="round" stroke-linejoin="round" d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89-.66M17 8l-4 1m4-1l1 4"/></svg>
                </div>
                <span class="text-lg font-bold text-primary-700">Solar<span class="text-earth-500">Soil</span></span>
            </a>

            <h1 class="text-2xl font-bold text-gray-900 mb-1">Welcome back</h1>
            <p class="text-sm text-gray-400 mb-8">Enter your credentials to access your account</p>

            <!-- Flash messages -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-50 border border-red-200 text-red-700 text-sm rounded-lg px-4 py-3 mb-6">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg px-4 py-3 mb-6">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('login') ?>" method="POST" class="space-y-5">
                <?= csrf_field() ?>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email</label>
                    <input type="email" id="email" name="email" required value="<?= old('email') ?>"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:bg-white transition"
                        placeholder="you@example.com">
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <a href="#" class="text-xs text-primary-600 hover:text-primary-700 font-medium">Forgot password?</a>
                    </div>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:bg-white transition"
                        placeholder="••••••••">
                </div>

                <button type="submit" class="w-full px-4 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 active:scale-[0.98] transition text-sm">
                    Log In
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-gray-400">
                Don't have an account?
                <a href="<?= base_url('register') ?>" class="text-primary-600 font-semibold hover:text-primary-700">Sign up</a>
            </p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
