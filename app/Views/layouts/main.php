<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'SolarSoil - Farm Fresh Marketplace' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans bg-sand-50 text-gray-800 antialiased">
    <?= $this->include('layouts/navbar') ?>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('layouts/footer') ?>
</body>
</html>
