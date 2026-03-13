<!-- Product Card Component -->
<!-- Pass: $product (array with product_id, image, name, price, stock_quantity, description, category) -->
<div class="bg-white rounded-xl border border-gray-100 overflow-hidden group hover:shadow-lg hover:border-primary-100 transition-all duration-300">
    <!-- Image -->
    <div class="relative overflow-hidden aspect-[4/3] bg-gray-50">
        <img src="https://images.unsplash.com/photo-1488459716781-31db52582fe9?w=400&h=300&fit=crop" 
             alt="<?= esc($product['name']) ?>" 
             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        <?php if ($product['stock_quantity'] <= 0): ?>
            <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                <span class="bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full">Out of Stock</span>
            </div>
        <?php endif; ?>
        <div class="absolute top-3 left-3">
            <span class="bg-white/90 backdrop-blur-sm text-xs font-medium text-earth-600 px-2.5 py-1 rounded-full"><?= esc($product['category']) ?></span>
        </div>
    </div>

    <!-- Content -->
    <div class="p-4">
        <h3 class="font-semibold text-gray-900 text-sm mb-1 line-clamp-1"><?= esc($product['name']) ?></h3>
        <p class="text-xs text-gray-400 mb-3 line-clamp-2"><?= esc($product['description']) ?></p>

        <div class="flex items-center justify-between mb-3">
            <span class="text-lg font-bold text-primary-700">&#8369;<?= number_format($product['price'], 2) ?></span>
            <span class="text-xs text-gray-400"><?= $product['stock_quantity'] ?> in stock</span>
        </div>

        <div class="flex gap-2">
            <a href="<?= base_url('products/' . $product['product_id']) ?>" class="flex-1 text-center px-3 py-2 text-xs font-medium text-primary-700 border border-primary-200 hover:bg-primary-50 rounded-lg transition">View Details</a>
            <form action="<?= base_url('cart/add') ?>" method="POST" class="flex-1">
                <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                <button type="submit" class="w-full px-3 py-2 text-xs font-medium text-white bg-primary-600 hover:bg-primary-700 rounded-lg transition <?= $product['stock_quantity'] <= 0 ? 'opacity-50 cursor-not-allowed' : '' ?>" <?= $product['stock_quantity'] <= 0 ? 'disabled' : '' ?>>Add to Cart</button>
            </form>
        </div>
    </div>
</div>
