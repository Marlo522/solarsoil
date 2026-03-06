<!-- Cart Item Row Component -->
<!-- Pass: $item (array with cartitem_id, product_name, product_image, price, quantity, subtotal) -->
<div class="flex items-center gap-4 py-4 border-b border-gray-100" x-data="{ qty: <?= $item['quantity'] ?> }">
    <!-- Image -->
    <div class="w-20 h-20 bg-gray-50 rounded-lg overflow-hidden shrink-0">
        <img src="https://images.unsplash.com/photo-1488459716781-31db52582fe9?w=100&h=100&fit=crop" 
             alt="<?= esc($item['product_name']) ?>" class="w-full h-full object-cover">
    </div>

    <!-- Info -->
    <div class="flex-1 min-w-0">
        <h4 class="font-medium text-gray-900 text-sm truncate"><?= esc($item['product_name']) ?></h4>
        <p class="text-sm text-primary-700 font-semibold mt-1">&#8369;<?= number_format($item['price'], 2) ?></p>
    </div>

    <!-- Quantity Stepper -->
    <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden">
        <button @click="qty > 1 ? qty-- : null" class="px-3 py-1.5 text-gray-500 hover:bg-gray-50 transition text-sm">-</button>
        <span class="px-3 py-1.5 text-sm font-medium text-gray-700 min-w-[2rem] text-center" x-text="qty"></span>
        <button @click="qty++" class="px-3 py-1.5 text-gray-500 hover:bg-gray-50 transition text-sm">+</button>
    </div>

    <!-- Subtotal -->
    <div class="text-right w-24 shrink-0">
        <p class="font-semibold text-gray-900 text-sm">&#8369;<span x-text="(qty * <?= $item['price'] ?>).toFixed(2)"><?= number_format($item['subtotal'], 2) ?></span></p>
    </div>

    <!-- Remove -->
    <button class="p-1.5 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
    </button>
</div>
