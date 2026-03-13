<!-- Order Summary Card Component -->
<!-- Pass: $summary (array with subtotal, shipping, discount, total) -->
<div class="bg-white rounded-xl border border-gray-100 p-6">
    <h3 class="font-semibold text-gray-900 mb-4">Order Summary</h3>
    <div class="space-y-3 text-sm">
        <div class="flex justify-between">
            <span class="text-gray-500">Subtotal</span>
            <span class="font-medium text-gray-900">&#8369;<span x-text="subtotal.toFixed(2)"><?= number_format($summary['subtotal'] ?? 0, 2) ?></span></span>
        </div>
        <div class="flex justify-between">
            <span class="text-gray-500">Shipping Fee</span>
            <span class="font-medium text-gray-900">&#8369;<span x-text="shippingCost.toFixed(2)"><?= number_format($summary['shipping'] ?? 0, 2) ?></span></span>
        </div>
        <?php if (($summary['discount'] ?? 0) > 0): ?>
        <div class="flex justify-between text-primary-600">
            <span>Discount</span>
            <span class="font-medium">-&#8369;<span x-text="discount.toFixed(2)"><?= number_format($summary['discount'], 2) ?></span></span>
        </div>
        <?php endif; ?>
        <div class="border-t border-gray-100 pt-3 flex justify-between">
            <span class="font-semibold text-gray-900">Total</span>
            <span class="font-bold text-lg text-primary-700">&#8369;<span x-text="total.toFixed(2)"><?= number_format($summary['total'] ?? 0, 2) ?></span></span>
        </div>
        
        <!-- Hidden inputs to submit values -->
        <input type="hidden" name="shipping_cost" :value="shippingCost">
        <input type="hidden" name="subtotal" :value="subtotal">
        <input type="hidden" name="total_amount" :value="total">
    </div>
</div>
