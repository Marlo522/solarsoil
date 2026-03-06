<!-- Category Card Component -->
<!-- Pass: $category (array with name, icon, count) -->
<a href="<?= base_url('products?category=' . urlencode($category['name'])) ?>" class="group bg-white rounded-xl border border-gray-100 p-6 text-center hover:shadow-lg hover:border-primary-200 transition-all duration-300">
    <div class="w-16 h-16 bg-primary-50 group-hover:bg-primary-100 rounded-2xl flex items-center justify-center mx-auto mb-4 transition">
        <span class="text-3xl"><?= $category['icon'] ?></span>
    </div>
    <h3 class="font-semibold text-gray-900 text-sm mb-1"><?= esc($category['name']) ?></h3>
    <p class="text-xs text-gray-400"><?= $category['count'] ?> products</p>
</a>
