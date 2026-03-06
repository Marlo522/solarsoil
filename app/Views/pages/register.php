<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>

<div class="h-screen flex overflow-hidden">
    <!-- Left: Image -->
    <div class="hidden lg:block lg:w-1/2 relative">
        <img src="https://images.unsplash.com/photo-1595855759920-86582396756a?w=800&h=1200&fit=crop" alt="Fresh farm produce" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-900/70 via-primary-800/50 to-transparent"></div>
        <div class="absolute inset-0 flex flex-col justify-between p-10">
            <a href="<?= base_url('/') ?>" class="flex items-center gap-2.5">
                <div class="w-9 h-9 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 007.92 12.446A9 9 0 1112 2.992z"/><path stroke-linecap="round" stroke-linejoin="round" d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89-.66M17 8l-4 1m4-1l1 4"/></svg>
                </div>
                <span class="text-lg font-bold text-white">SolarSoil</span>
            </a>
            <div class="text-white">
                <p class="text-3xl font-bold leading-tight mb-3">Join thousands of<br>farmers and consumers</p>
                <p class="text-white/70 text-sm max-w-sm">Together, we're building a sustainable food community in the Philippines.</p>
            </div>
        </div>
    </div>

    <!-- Right: Form -->
    <div class="flex-1 flex flex-col bg-white">
        <!-- Fixed header -->
        <div class="shrink-0 px-6 sm:px-12 pt-8 pb-4">
            <!-- Mobile logo -->
            <a href="<?= base_url('/') ?>" class="lg:hidden flex items-center gap-2.5 mb-8">
                <div class="w-9 h-9 bg-primary-600 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 007.92 12.446A9 9 0 1112 2.992z"/><path stroke-linecap="round" stroke-linejoin="round" d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89-.66M17 8l-4 1m4-1l1 4"/></svg>
                </div>
                <span class="text-lg font-bold text-primary-700">Solar<span class="text-earth-500">Soil</span></span>
            </a>

            <h1 class="text-2xl font-bold text-gray-900 mb-1">Create your account</h1>
            <p class="text-sm text-gray-400">Fill in your details to get started</p>

            <!-- Flash messages -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-50 border border-red-200 text-red-700 text-sm rounded-lg px-4 py-3 mt-4">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            <?php if (isset($validation)): ?>
                <div class="bg-red-50 border border-red-200 text-red-700 text-sm rounded-lg px-4 py-3 mt-4">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Scrollable form container -->
        <div class="flex-1 overflow-y-auto px-6 sm:px-12 pb-8">
            <form action="<?= base_url('register') ?>" method="POST" class="max-w-md space-y-5">
                <?= csrf_field() ?>

                <!-- Role Selection -->
                <div x-data="{ role: '<?= old('role', 'consumer') ?>' }">
                    <label class="block text-sm font-medium text-gray-700 mb-2">I want to</label>
                    <div class="grid grid-cols-2 gap-3">
                        <label :class="role === 'consumer' ? 'border-primary-500 bg-primary-50 ring-1 ring-primary-500' : 'border-gray-200 bg-gray-50 hover:border-gray-300'" class="relative flex items-center gap-3 px-4 py-3 border rounded-xl cursor-pointer transition">
                            <input type="radio" name="role" value="consumer" x-model="role" class="sr-only">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121 0 2.002-.881 1.745-1.97l-1.876-7.89A1.125 1.125 0 0016.744 3H7.106"/></svg>
                            <div>
                                <span class="text-sm font-medium text-gray-900">Buy Produce</span>
                                <p class="text-xs text-gray-500">Consumer</p>
                            </div>
                        </label>
                        <label :class="role === 'seller' ? 'border-primary-500 bg-primary-50 ring-1 ring-primary-500' : 'border-gray-200 bg-gray-50 hover:border-gray-300'" class="relative flex items-center gap-3 px-4 py-3 border rounded-xl cursor-pointer transition">
                            <input type="radio" name="role" value="seller" x-model="role" class="sr-only">
                            <svg class="w-5 h-5 text-earth-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.15c0 .415.336.75.75.75z"/></svg>
                            <div>
                                <span class="text-sm font-medium text-gray-900">Sell Produce</span>
                                <p class="text-xs text-gray-500">Farmer</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Name Fields -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1.5">First Name <span class="text-red-400">*</span></label>
                        <input type="text" id="first_name" name="first_name" required value="<?= old('first_name') ?>"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:bg-white transition"
                            placeholder="Juan">
                    </div>
                    <div>
                        <label for="middle_name" class="block text-sm font-medium text-gray-700 mb-1.5">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name" value="<?= old('middle_name') ?>"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:bg-white transition"
                            placeholder="Santos">
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-2">
                        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1.5">Last Name <span class="text-red-400">*</span></label>
                        <input type="text" id="last_name" name="last_name" required value="<?= old('last_name') ?>"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:bg-white transition"
                            placeholder="Dela Cruz">
                    </div>
                    <div>
                        <label for="suffix" class="block text-sm font-medium text-gray-700 mb-1.5">Suffix</label>
                        <input type="text" id="suffix" name="suffix" value="<?= old('suffix') ?>"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:bg-white transition"
                            placeholder="Jr.">
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email Address <span class="text-red-400">*</span></label>
                    <input type="email" id="email" name="email" required value="<?= old('email') ?>"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:bg-white transition"
                        placeholder="you@example.com">
                </div>

                <!-- Contact & Address -->
                <div>
                    <label for="contact_number" class="block text-sm font-medium text-gray-700 mb-1.5">Contact Number <span class="text-red-400">*</span></label>
                    <input type="tel" id="contact_number" name="contact_number" required value="<?= old('contact_number') ?>"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:bg-white transition"
                        placeholder="09123456789">
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1.5">Address <span class="text-red-400">*</span></label>
                    <input type="text" id="address" name="address" required value="<?= old('address') ?>"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:bg-white transition"
                        placeholder="Quezon City, Metro Manila">
                </div>

                <!-- Passwords -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password <span class="text-red-400">*</span></label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:bg-white transition"
                            placeholder="Min 8 characters">
                    </div>
                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1.5">Confirm Password <span class="text-red-400">*</span></label>
                        <input type="password" id="confirm_password" name="confirm_password" required
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 focus:bg-white transition"
                            placeholder="Repeat password">
                    </div>
                </div>

                <button type="submit" class="w-full px-4 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 active:scale-[0.98] transition text-sm">
                    Create Account
                </button>

                <p class="text-center text-sm text-gray-400 pb-2">
                    Already have an account?
                    <a href="<?= base_url('login') ?>" class="text-primary-600 font-semibold hover:text-primary-700">Log in</a>
                </p>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
