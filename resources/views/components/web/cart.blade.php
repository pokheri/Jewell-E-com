<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Shopping Cart</h1>
            <p class="mt-2 text-gray-600">Review your items and proceed to checkout</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Cart Items Section -->
            <div class="lg:w-2/3">
                @php
                    $cartItems = [
                        [
                            'id' => 1,
                            'name' => 'Premium Wireless Headphones',
                            'image' =>
                                'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&h=400&fit=crop',
                            'price' => 249.99,
                            'original_price' => 299.99,
                            'color' => 'Black',
                            'size' => null,
                            'quantity' => 1,
                            'in_stock' => true,
                        ],
                        [
                            'id' => 2,
                            'name' => 'Smart Fitness Watch',
                            'image' =>
                                'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400&h=400&fit=crop',
                            'price' => 199.99,
                            'original_price' => null,
                            'color' => 'Midnight Blue',
                            'size' => '42mm',
                            'quantity' => 2,
                            'in_stock' => true,
                        ],
                        [
                            'id' => 3,
                            'name' => 'Organic Cotton T-Shirt',
                            'image' =>
                                'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&h=400&fit=crop',
                            'price' => 34.99,
                            'original_price' => 39.99,
                            'color' => 'White',
                            'size' => 'M',
                            'quantity' => 1,
                            'in_stock' => false,
                        ],
                    ];

                    // Calculate initial totals
                    $subtotal = 0;
                    $totalItems = 0;
                    foreach ($cartItems as $item) {
                        $subtotal += $item['price'] * $item['quantity'];
                        $totalItems += $item['quantity'];
                    }
                    $shipping = $subtotal > 100 ? 0 : 9.99;
                    $tax = $subtotal * 0.08;
                    $total = $subtotal + $shipping + $tax;
                @endphp

                @if (count($cartItems) > 0)
                    <!-- Desktop Table View (≥768px) - NO SCROLLING -->
                    <div class="hidden md:block bg-white rounded-xl shadow-sm">
                        <div class="overflow-hidden">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="py-4 px-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider w-2/5">
                                            Product</th>
                                        <th
                                            class="py-4 px-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                            Price</th>
                                        <th
                                            class="py-4 px-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                            Quantity</th>
                                        <th
                                            class="py-4 px-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                            Total</th>
                                        <th
                                            class="py-4 px-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($cartItems as $item)
                                        <tr class="hover:bg-gray-50 transition-colors duration-150"
                                            data-product-id="{{ $item['id'] }}">
                                            <!-- Product Column - Wider for better display -->
                                            <td class="py-4 px-4 align-top">
                                                <div class="flex items-center">
                                                    <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-lg">
                                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                                            class="h-full w-full object-cover object-center">
                                                    </div>
                                                    <div class="ml-4 flex-1 min-w-0">
                                                        <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                                            {{ $item['name'] }}
                                                        </h3>
                                                        @if ($item['color'] || $item['size'])
                                                            <div class="mt-1 flex flex-wrap gap-1">
                                                                @if ($item['color'])
                                                                    <span
                                                                        class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                                        {{ $item['color'] }}
                                                                    </span>
                                                                @endif
                                                                @if ($item['size'])
                                                                    <span
                                                                        class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                                        {{ $item['size'] }}
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Price Column - Compact -->
                                            <td class="py-4 px-4 align-top">
                                                <div class="text-sm font-bold text-gray-900">
                                                    ${{ number_format($item['price'], 2) }}
                                                </div>
                                                @if ($item['original_price'])
                                                    <div class="text-xs text-gray-500 line-through">
                                                        ${{ number_format($item['original_price'], 2) }}
                                                    </div>
                                                @endif
                                            </td>

                                            <!-- Quantity Column - Compact -->
                                            <td class="py-4 px-4 align-top">
                                                <div class="flex items-center">
                                                    <button type="button"
                                                        class="quantity-btn w-8 h-8 flex items-center justify-center border border-gray-300 rounded-l-md bg-gray-50 hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-150"
                                                        data-action="decrease" data-product="{{ $item['id'] }}"
                                                        {{ $item['quantity'] <= 1 ? 'disabled' : '' }}>
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M20 12H4" />
                                                        </svg>
                                                    </button>
                                                    <input type="text" value="{{ $item['quantity'] }}" readonly
                                                        class="quantity-input w-10 h-8 text-center border-t border-b border-gray-300 bg-white font-medium text-sm focus:outline-none"
                                                        data-product="{{ $item['id'] }}">
                                                    <button type="button"
                                                        class="quantity-btn w-8 h-8 flex items-center justify-center border border-gray-300 rounded-r-md bg-gray-50 hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-150"
                                                        data-action="increase" data-product="{{ $item['id'] }}"
                                                        {{ $item['quantity'] >= 10 ? 'disabled' : '' }}>
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M12 4v16m8-8H4" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>

                                            <!-- Total Column - Compact -->
                                            <td class="py-4 px-4 align-top">
                                                <div class="text-sm font-bold text-amber-600 quantity-total"
                                                    data-product="{{ $item['id'] }}">
                                                    ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                                </div>
                                            </td>

                                            <!-- Actions Column - Always visible -->
                                            <td class="py-4 px-4 align-top">
                                                <div class="flex items-center justify-center">
                                                    <button type="button"
                                                        class="remove-btn inline-flex items-center justify-center w-8 h-8 border border-gray-300 rounded-md bg-white hover:bg-red-50 hover:border-red-300 hover:text-red-600 transition-colors duration-150"
                                                        data-product="{{ $item['id'] }}" title="Remove item">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Mobile Card View (<768px) -->
                    <div class="md:hidden space-y-4">
                        @foreach ($cartItems as $item)
                            <div class="bg-white rounded-xl shadow-sm p-4" data-product-id="{{ $item['id'] }}">
                                <div class="flex gap-4">
                                    <!-- Product Image -->
                                    <div class="flex-shrink-0">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                            class="h-20 w-20 rounded-lg object-cover">
                                    </div>

                                    <!-- Product Info -->
                                    <div class="flex-1 min-w-0">
                                        <!-- Header Row -->
                                        <div class="flex justify-between items-start">
                                            <div class="flex-1 min-w-0 pr-2">
                                                <h3 class="text-sm font-medium text-gray-900 truncate">
                                                    {{ $item['name'] }}
                                                </h3>
                                                @if ($item['color'] || $item['size'])
                                                    <div class="mt-1 flex flex-wrap gap-1">
                                                        @if ($item['color'])
                                                            <span
                                                                class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                                {{ $item['color'] }}
                                                            </span>
                                                        @endif
                                                        @if ($item['size'])
                                                            <span
                                                                class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                                {{ $item['size'] }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                            <button type="button"
                                                class="remove-btn ml-2 flex-shrink-0 inline-flex items-center justify-center w-8 h-8 border border-gray-300 rounded-md bg-white hover:bg-red-50 hover:border-red-300 hover:text-red-600 transition-colors duration-150"
                                                data-product="{{ $item['id'] }}" title="Remove item">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Price and Quantity Row -->
                                        <div class="mt-3 flex items-center justify-between">
                                            <!-- Price -->
                                            <div class="text-left">
                                                <div class="text-base font-bold text-gray-900">
                                                    ${{ number_format($item['price'], 2) }}
                                                </div>
                                                @if ($item['original_price'])
                                                    <div class="text-sm text-gray-500 line-through">
                                                        ${{ number_format($item['original_price'], 2) }}
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Quantity Controls -->
                                            <div class="flex items-center">
                                                <button type="button"
                                                    class="quantity-btn w-8 h-8 flex items-center justify-center border border-gray-300 rounded-l-md bg-gray-50 hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-150"
                                                    data-action="decrease" data-product="{{ $item['id'] }}"
                                                    {{ $item['quantity'] <= 1 ? 'disabled' : '' }}>
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M20 12H4" />
                                                    </svg>
                                                </button>
                                                <input type="text" value="{{ $item['quantity'] }}" readonly
                                                    class="quantity-input w-10 h-8 text-center border-t border-b border-gray-300 bg-white font-medium text-sm focus:outline-none"
                                                    data-product="{{ $item['id'] }}">
                                                <button type="button"
                                                    class="quantity-btn w-8 h-8 flex items-center justify-center border border-gray-300 rounded-r-md bg-gray-50 hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-150"
                                                    data-action="increase" data-product="{{ $item['id'] }}"
                                                    {{ $item['quantity'] >= 10 ? 'disabled' : '' }}>
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M12 4v16m8-8H4" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Total Row -->
                                        <div class="mt-3 pt-3 border-t border-gray-200">
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-600">Item Total:</span>
                                                <span class="text-base font-bold text-amber-600 quantity-total"
                                                    data-product="{{ $item['id'] }}">
                                                    ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Cart Summary -->
                    <div class="mt-6 bg-white rounded-xl shadow-sm p-6">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                            <div>
                                <div class="text-sm font-medium text-gray-700">
                                    <span id="cart-item-count">{{ $totalItems }}</span>
                                    {{ $totalItems === 1 ? 'item' : 'items' }} in cart
                                </div>
                                <div class="mt-1 text-lg font-bold text-gray-900">
                                    Subtotal: <span class="text-amber-600"
                                        id="cart-subtotal">${{ number_format($subtotal, 2) }}</span>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row gap-3">
                                <button type="button" id="continue-shopping-btn"
                                    class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium rounded-lg border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-150">
                                    Continue Shopping
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Empty Cart State -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="text-center py-12 px-4">
                            <div
                                class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-gray-100 mb-4">
                                <svg class="h-10 w-10 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Your cart is empty</h3>
                            <p class="text-gray-600 mb-6 max-w-md mx-auto">
                                Add items to your cart and they will appear here.
                            </p>
                            <button type="button" id="start-shopping-btn"
                                class="inline-flex items-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-amber-600 hover:bg-amber-700 transition-colors duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                                Start Shopping
                            </button>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Order Summary Sidebar -->
            <div class="lg:w-1/3">
                @if (count($cartItems) > 0)
                    <div class="bg-white rounded-xl shadow-sm p-6 sticky top-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-6">Order Summary</h3>

                        <!-- Summary Details -->
                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium"
                                    id="summary-subtotal">${{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-medium" id="summary-shipping">
                                    @if ($subtotal > 100)
                                        <span class="text-green-600">FREE</span>
                                    @else
                                        $9.99
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tax</span>
                                <span class="font-medium" id="summary-tax">${{ number_format($tax, 2) }}</span>
                            </div>
                            <div class="pt-4 border-t border-gray-200">
                                <div class="flex justify-between text-lg font-bold">
                                    <span>Total</span>
                                    <span class="text-amber-600"
                                        id="summary-total">${{ number_format($total, 2) }}</span>
                                </div>
                                @if ($subtotal > 100)
                                    <div class="text-sm text-green-600 mt-2">
                                        🎉 Free shipping applied!
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Checkout Button -->
                        <button type="button" id="checkout-btn"
                            class="w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-amber-600 hover:bg-amber-700 transition-colors duration-150 mb-6">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Proceed to Checkout
                        </button>

                        <!-- Payment Methods -->
                        <div class="pt-6 border-t border-gray-200">
                            <p class="text-sm text-gray-600 mb-3">We accept</p>
                            <div class="flex flex-wrap gap-2">
                                <div class="h-8 w-12 bg-gray-100 rounded flex items-center justify-center">
                                    <span class="text-xs font-bold text-gray-700">VISA</span>
                                </div>
                                <div class="h-8 w-12 bg-gray-100 rounded flex items-center justify-center">
                                    <span class="text-xs font-bold text-gray-700">MC</span>
                                </div>
                                <div class="h-8 w-12 bg-gray-100 rounded flex items-center justify-center">
                                    <span class="text-xs font-bold text-gray-700">PP</span>
                                </div>
                                <div class="h-8 w-12 bg-gray-100 rounded flex items-center justify-center">
                                    <span class="text-xs font-bold text-gray-700">AE</span>
                                </div>
                            </div>
                            <div class="mt-4 text-xs text-gray-500">
                                <p>🔒 Secure checkout • Your information is protected</p>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Sidebar for Empty Cart -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Cart Tips</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-amber-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-gray-700">Items remain in cart for 30 days</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-amber-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-gray-700">Free shipping on orders over $100</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-amber-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-gray-700">Easy returns within 30 days</span>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        // Initialize cart data from PHP
        let cartData = {!! json_encode(array_column($cartItems, null, 'id')) !!};

        // Get item details from cartData
        function getItemDetails(productId) {
            return cartData[productId];
        }

        // Update item total display
        function updateItemTotal(productId) {
            const item = getItemDetails(productId);
            if (!item) return;

            const total = item.price * item.quantity;
            const totalElements = document.querySelectorAll(`.quantity-total[data-product="${productId}"]`);

            totalElements.forEach(element => {
                element.textContent = `$${total.toFixed(2)}`;
            });
        }

        // Update button states
        function updateButtonStates(productId, quantity) {
            const decreaseBtns = document.querySelectorAll(
                `.quantity-btn[data-product="${productId}"][data-action="decrease"]`);
            const increaseBtns = document.querySelectorAll(
                `.quantity-btn[data-product="${productId}"][data-action="increase"]`);

            decreaseBtns.forEach(btn => {
                btn.disabled = quantity <= 1;
            });

            increaseBtns.forEach(btn => {
                btn.disabled = quantity >= 10;
            });
        }

        // Update quantity function
        function updateQuantity(productId, newQuantity) {
            if (newQuantity < 1 || newQuantity > 10) return;

            const item = getItemDetails(productId);
            if (!item) return;

            // Update cart data
            item.quantity = newQuantity;

            // Update input field
            const inputs = document.querySelectorAll(`.quantity-input[data-product="${productId}"]`);
            inputs.forEach(input => {
                input.value = newQuantity;
            });

            // Update button states
            updateButtonStates(productId, newQuantity);

            // Update item total
            updateItemTotal(productId);

            // Update cart summary
            updateCartSummary();
        }

        // Increase quantity
        function increaseQuantity(productId) {
            const item = getItemDetails(productId);
            if (item && item.quantity < 10) {
                updateQuantity(productId, item.quantity + 1);
            }
        }

        // Decrease quantity
        function decreaseQuantity(productId) {
            const item = getItemDetails(productId);
            if (item && item.quantity > 1) {
                updateQuantity(productId, item.quantity - 1);
            }
        }

        // Remove item from cart
        function removeItem(productId) {
            if (confirm('Are you sure you want to remove this item from your cart?')) {
                // Remove from cartData
                delete cartData[productId];

                // Remove from DOM
                const elements = document.querySelectorAll(`[data-product-id="${productId}"]`);
                elements.forEach(el => el.remove());

                // Update cart summary
                updateCartSummary();

                // Check if cart is empty
                if (Object.keys(cartData).length === 0) {
                    // In a real app, you would refresh the page or show empty state
                    alert('Your cart is now empty!');
                }
            }
        }

        // Update cart summary
        function updateCartSummary() {
            let subtotal = 0;
            let totalItems = 0;

            // Calculate totals from cartData
            for (const productId in cartData) {
                const item = cartData[productId];
                subtotal += item.price * item.quantity;
                totalItems += item.quantity;
            }

            // Update item count
            document.getElementById('cart-item-count').textContent = totalItems;

            // Update subtotal displays
            document.getElementById('cart-subtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('summary-subtotal').textContent = `$${subtotal.toFixed(2)}`;

            // Calculate shipping, tax, and total
            const shipping = subtotal > 100 ? 0 : 9.99;
            const tax = subtotal * 0.08;
            const total = subtotal + shipping + tax;

            // Update shipping display
            const shippingElement = document.getElementById('summary-shipping');
            if (subtotal > 100) {
                shippingElement.innerHTML = '<span class="text-green-600">FREE</span>';
            } else {
                shippingElement.textContent = `$${shipping.toFixed(2)}`;
            }

            // Update tax and total
            document.getElementById('summary-tax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('summary-total').textContent = `$${total.toFixed(2)}`;
        }

        // Event delegation for all cart interactions
        document.addEventListener('click', function(event) {
            const target = event.target;

            // Handle quantity button clicks
            if (target.closest('.quantity-btn')) {
                const button = target.closest('.quantity-btn');
                const productId = parseInt(button.dataset.product);
                const action = button.dataset.action;

                if (action === 'increase') {
                    increaseQuantity(productId);
                } else if (action === 'decrease') {
                    decreaseQuantity(productId);
                }
            }

            // Handle remove button clicks
            if (target.closest('.remove-btn')) {
                const button = target.closest('.remove-btn');
                const productId = parseInt(button.dataset.product);
                removeItem(productId);
            }
        });

        // Navigation buttons
        document.getElementById('checkout-btn')?.addEventListener('click', function() {
            console.log('Proceeding to checkout');
            alert('Proceeding to checkout! (This is a demo)');
        });

        document.getElementById('continue-shopping-btn')?.addEventListener('click', function() {
            console.log('Continuing shopping');
            alert('Continue shopping! (This is a demo)');
        });

        document.getElementById('start-shopping-btn')?.addEventListener('click', function() {
            console.log('Starting shopping');
            alert('Start shopping! (This is a demo)');
        });

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize all button states
            for (const productId in cartData) {
                const item = cartData[productId];
                updateButtonStates(parseInt(productId), item.quantity);
            }

            // Initialize cart summary
            updateCartSummary();
        });
    </script>
@endpush

@push('styles')
    <style>
        /* Custom styles for better UX */
        .quantity-input {
            -moz-appearance: textfield;
        }

        .quantity-input::-webkit-outer-spin-button,
        .quantity-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Line clamp for product names */
        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            line-clamp: 2;
        }

        /* Responsive table adjustments */
        @media (min-width: 768px) {

            /* Ensure table fits without scrolling */
            table {
                table-layout: fixed;
            }

            /* Product column width */
            table th:nth-child(1),
            table td:nth-child(1) {
                width: 40%;
            }

            /* Other columns */
            table th:nth-child(2),
            table td:nth-child(2),
            table th:nth-child(3),
            table td:nth-child(3),
            table th:nth-child(4),
            table td:nth-child(4) {
                width: 15%;
            }

            /* Actions column */
            table th:nth-child(5),
            table td:nth-child(5) {
                width: 15%;
            }
        }

        /* Further adjustments for medium screens (768px-1024px) */
        @media (min-width: 768px) and (max-width: 1024px) {

            table th,
            table td {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }

            /* Smaller image on medium screens */
            table td:nth-child(1) .h-16 {
                height: 3.5rem;
                width: 3.5rem;
            }

            /* Smaller font sizes */
            table .text-sm {
                font-size: 0.875rem;
            }

            table .text-xs {
                font-size: 0.75rem;
            }
        }

        /* Smooth transitions */
        .transition-colors {
            transition-property: background-color, border-color, color, fill, stroke;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }

        /* Custom color for better contrast */
        .bg-amber-600 {
            background-color: #d97706;
        }

        .hover\:bg-amber-700:hover {
            background-color: #b45309;
        }

        .text-amber-600 {
            color: #d97706;
        }
    </style>
@endpush
