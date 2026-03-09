<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin - SolarSoil' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 50:'#e8f5e9', 100:'#c8e6c9', 200:'#a5d6a7', 300:'#81c784', 400:'#66bb6a', 500:'#4caf50', 600:'#2E7D32', 700:'#2e7d32', 800:'#1b5e20', 900:'#0d3d14' },
                        earth: { 50:'#efebe9', 100:'#d7ccc8', 200:'#bcaaa4', 300:'#a1887f', 400:'#8d6e63', 500:'#6D4C41', 600:'#5d4037', 700:'#4e342e', 800:'#3e2723', 900:'#2c1a12' },
                        sand: { 50:'#fefcf3', 100:'#fdf8e1', 200:'#faf0c8', 300:'#f5e6a8' },
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                }
            }
        }
    </script>
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="font-sans bg-gray-50 text-gray-800 antialiased">
    <!-- Admin Top Navbar -->
    <nav class="sticky top-0 z-50 bg-primary-800 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-14">
                <!-- Left: Logo + Nav Links -->
                <div class="flex items-center gap-8">
                    <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center gap-2 shrink-0">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 007.92 12.446A9 9 0 1112 2.992z"/><path stroke-linecap="round" stroke-linejoin="round" d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89-.66M17 8l-4 1m4-1l1 4"/></svg>
                        </div>
                        <span class="text-lg font-bold text-white">Solar <span class="text-primary-200">Soil</span></span>
                    </a>
                    <div class="hidden md:flex items-center gap-1">
                        <?php
                        $currentUrl = current_url();
                        $navItems = [
                            ['url' => 'admin/dashboard', 'label' => 'Home'],
                            ['url' => 'admin/farmers', 'label' => 'Farmers'],
                            ['url' => 'admin/consumers', 'label' => 'Consumers'],
                            ['url' => 'admin/orders', 'label' => 'Orders'],
                        ];
                        foreach ($navItems as $item):
                            $isActive = strpos($currentUrl, $item['url']) !== false;
                        ?>
                            <a href="<?= base_url($item['url']) ?>"
                               class="px-4 py-2 text-sm font-medium rounded-lg transition <?= $isActive ? 'text-white bg-white/20' : 'text-primary-100 hover:text-white hover:bg-white/10' ?>">
                                <?= $item['label'] ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Right: Profile -->
                <div class="flex items-center gap-3">
                    <a href="<?= base_url('profile') ?>" class="px-4 py-2 text-sm font-medium text-primary-100 hover:text-white hover:bg-white/10 rounded-lg transition">Profile</a>
                    <a href="<?= base_url('logout') ?>" class="px-4 py-2 text-sm font-medium text-red-300 hover:text-white hover:bg-red-500/20 rounded-lg transition">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <?= $this->renderSection('content') ?>
    </main>
</body>
</html>
