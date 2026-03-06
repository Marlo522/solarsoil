<!-- Dashboard Stat Card Component -->
<!-- Pass: $stat (array with label, value, icon, color) -->
<div class="bg-white rounded-xl border border-gray-100 p-6 hover:shadow-md transition">
    <div class="flex items-center justify-between mb-4">
        <div class="w-12 h-12 rounded-xl flex items-center justify-center <?= $stat['color'] ?? 'bg-primary-50 text-primary-600' ?>">
            <?= $stat['icon'] ?? '' ?>
        </div>
        <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z"/></svg>
    </div>
    <p class="text-2xl font-bold text-gray-900"><?= $stat['value'] ?? 0 ?></p>
    <p class="text-sm text-gray-500 mt-1"><?= $stat['label'] ?? '' ?></p>
</div>
