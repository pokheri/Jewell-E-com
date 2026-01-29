<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">My Wishlist</h1>
            <p class="mt-2 text-gray-600">Save items you love for later</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content -->
            <div class="lg:w-2/3">
                @php
                    $wishlistItems = [
                        [
                            'id' => 1,
                            'name' => 'Premium Wireless Headphones',
                            'image' =>
                                'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&h=400&fit=crop',
                            'price' => 249.99,
                            'original_price' => 299.99,
                            'color' => 'Black',
                            'in_stock' => true,
                        ],
                        [
                            'id' => 2,
                            'name' => 'Smart Fitness Watch',
                            'image' =>
                                'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400&h=400&fit=crop',
                            'price' => 199.99,
                            'color' => 'Midnight Blue',
                            'size' => '42mm',
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
                            'in_stock' => false,
                        ],
                    ];
                    $allItems = array_merge($wishlistItems, $wishlistItems, $wishlistItems);
                @endphp

                @if (count($allItems) > 0)
                    <!-- Desktop Table View (hidden on mobile) -->
                    <div class="hidden md:block bg-white rounded-xl shadow-sm overflow-hidden">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="py-4 px-6 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                        Product</th>
                                    <th
                                        class="py-4 px-6 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                        Price</th>
                                    <th
                                        class="py-4 px-6 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="py-4 px-6 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($allItems as $item)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <!-- Product -->
                                        <td class="py-6 px-6">
                                            <div class="flex items-center">
                                                <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-lg">
                                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                                        class="h-full w-full object-cover object-center">
                                                </div>
                                                <div class="ml-4">
                                                    <h3 class="text-sm font-medium text-gray-900">
                                                        {{ $item['name'] }}
                                                    </h3>
                                                    @if (isset($item['color']) || isset($item['size']))
                                                        <div class="mt-1 flex flex-wrap gap-2">
                                                            @if (isset($item['color']))
                                                                <span
                                                                    class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                                    {{ $item['color'] }}
                                                                </span>
                                                            @endif
                                                            @if (isset($item['size']))
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

                                        <!-- Price -->
                                        <td class="py-6 px-6">
                                            <div class="text-base font-bold text-gray-900">
                                                ${{ number_format($item['price'], 2) }}
                                            </div>
                                            @if (isset($item['original_price']) && $item['original_price'] > $item['price'])
                                                <div class="text-sm text-gray-500 line-through">
                                                    ${{ number_format($item['original_price'], 2) }}
                                                </div>
                                                @php
                                                    $discountPercent = round(
                                                        (($item['original_price'] - $item['price']) /
                                                            $item['original_price']) *
                                                            100,
                                                    );
                                                @endphp
                                                <div class="text-xs font-medium text-green-600 mt-1">
                                                    Save {{ $discountPercent }}%
                                                </div>
                                            @endif
                                        </td>

                                        <!-- Status -->
                                        <!-- Status -->
                                        <td class="py-6 px-6">
                                            @if ($item['in_stock'])
                                                <span
                                                    class="inline-flex items-center justify-center w-28 px-3 py-1.5 text-sm font-medium bg-green-100 text-green-800 rounded-md whitespace-nowrap">
                                                    In Stock
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center justify-center w-28 px-3 py-1.5 text-sm font-medium bg-red-100 text-red-800 rounded-md whitespace-nowrap">
                                                    Out of Stock
                                                </span>
                                            @endif
                                        </td>

                                        <!-- Actions -->
                                        <td class="py-6 px-3">
                                            <div class="flex items-center gap-2 whitespace-nowrap">
                                                <button onclick="addToCart({{ $item['id'] }})"
                                                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
                                                    {{ $item['in_stock'] ? '' : 'disabled' }}>
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                    </svg>
                                                    Add
                                                </button>

                                                <button onclick="removeFromWishlist({{ $item['id'] }})"
                                                    class="inline-flex items-center justify-center w-9 h-9 border border-gray-300 rounded-md bg-white hover:bg-gray-50 transition-colors flex-shrink-0"
                                                    title="Remove">
                                                    ✕
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Card View (visible only on mobile) -->
                    <div class="md:hidden bg-white rounded-xl shadow-sm divide-y divide-gray-200">
                        @foreach ($allItems as $item)
                            <div class="p-4 hover:bg-gray-50 transition-colors">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                            class="h-20 w-20 rounded-lg object-cover">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-sm font-medium text-gray-900">
                                            {{ $item['name'] }}
                                        </h3>

                                        @if (isset($item['color']) || isset($item['size']))
                                            <div class="mt-1 flex flex-wrap gap-1">
                                                @if (isset($item['color']))
                                                    <span
                                                        class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                        {{ $item['color'] }}
                                                    </span>
                                                @endif
                                                @if (isset($item['size']))
                                                    <span
                                                        class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                        {{ $item['size'] }}
                                                    </span>
                                                @endif
                                            </div>
                                        @endif

                                        <div class="mt-2 flex items-center justify-between">
                                            <div>
                                                <span class="text-base font-bold text-gray-900">
                                                    ${{ number_format($item['price'], 2) }}
                                                </span>
                                                @if (isset($item['original_price']) && $item['original_price'] > $item['price'])
                                                    <span class="text-sm text-gray-500 line-through ml-1">
                                                        ${{ number_format($item['original_price'], 2) }}
                                                    </span>
                                                @endif
                                            </div>

                                            <!-- Status on Mobile -->

                                            <div>
                                                @if ($item['in_stock'])
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 text-xs font-medium bg-green-100 text-green-800 rounded whitespace-nowrap">
                                                        In Stock
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 text-xs font-medium bg-red-100 text-red-800 rounded whitespace-nowrap">
                                                        Out of Stock
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Actions for Mobile - Placed at end/bottom -->
                                        <div class="mt-4 flex justify-end space-x-2">
                                            <button onclick="addToCart({{ $item['id'] }})"
                                                class="inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
                                                {{ $item['in_stock'] ? '' : 'disabled' }}>
                                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                                Add
                                            </button>

                                            <button onclick="removeFromWishlist({{ $item['id'] }})"
                                                class="inline-flex items-center justify-center w-9 h-9 border border-gray-300 rounded-md bg-white hover:bg-gray-50 transition-colors flex-shrink-0"
                                                title="Remove">
                                                ✕
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Bulk Actions -->
                    <div class="mt-6 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                        <div class="text-sm text-gray-700">
                            <div class="font-medium">{{ count($allItems) }} items in wishlist</div>
                            @php
                                $totalSaved = 0;
                                foreach ($allItems as $item) {
                                    if (isset($item['original_price']) && $item['original_price'] > $item['price']) {
                                        $totalSaved += $item['original_price'] - $item['price'];
                                    }
                                }
                            @endphp
                            @if ($totalSaved > 0)
                                <div class="text-xs text-green-600 mt-1">
                                    Total savings: ${{ number_format($totalSaved, 2) }}
                                </div>
                            @endif
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <button onclick="addAllToCart()"
                                class="inline-flex items-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-amber-600 hover:bg-amber-700 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Add All to Cart
                            </button>
                            <button onclick="clearWishlist()"
                                class="inline-flex items-center px-5 py-2.5 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Clear All
                            </button>
                        </div>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="bg-white rounded-xl shadow-sm text-center py-16 px-4">
                        <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-gray-100 mb-6">
                            <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-2">Your wishlist is empty</h3>
                        <p class="text-gray-600 mb-8 max-w-md mx-auto">
                            Save items you love to your wishlist. Review them anytime and easily move them to the cart.
                        </p>
                        <a href="#"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-amber-600 hover:bg-amber-700 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            Start Shopping
                        </a>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3">
                @php
                    $recentlyViewed = [
                        [
                            'id' => 7,
                            'name' => 'Wireless Earbuds',
                            'image' =>
                                'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?w=400&h=400&fit=crop',
                            'price' => 129.99,
                        ],
                        [
                            'id' => 8,
                            'name' => 'Gaming Keyboard',
                            'image' =>
                                'https://images.unsplash.com/photo-1541140532154-b024d705b90a?w=400&h=400&fit=crop',
                            'price' => 89.99,
                        ],
                        [
                            'id' => 9,
                            'name' => 'Yoga Mat',
                            'image' =>
                                'https://images.unsplash.com/photo-1599901860904-17e6ed7083a0?w=400&h=400&fit=crop',
                            'price' => 34.99,
                        ],
                        [
                            'id' => 10,
                            'name' => 'Coffee Maker',
                            'image' =>
                                'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=400&h=400&fit=crop',
                            'price' => 199.99,
                        ],
                    ];
                    $allRecentItems = array_merge($recentlyViewed, $recentlyViewed);
                @endphp

                <!-- Stats Section -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Wishlist Stats</h3>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="text-center p-3 bg-amber-50 rounded-lg">
                            <div class="text-2xl font-bold text-amber-600">{{ count($allItems) }}</div>
                            <div class="text-sm text-gray-600">Total Items</div>
                        </div>
                        <div class="text-center p-3 bg-green-50 rounded-lg">
                            <div class="text-2xl font-bold text-green-600">${{ number_format($totalSaved ?? 0, 2) }}
                            </div>
                            <div class="text-sm text-gray-600">Total Saved</div>
                        </div>
                    </div>

                    <!-- Status Summary -->
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="text-sm font-medium text-gray-900 mb-2">Status Summary</div>
                        <div class="space-y-2">
                            @php
                                $inStockCount = 0;
                                $outOfStockCount = 0;
                                if (isset($allItems)) {
                                    foreach ($allItems as $item) {
                                        $item['in_stock'] ? $inStockCount++ : $outOfStockCount++;
                                    }
                                }
                            @endphp
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                                    <span class="text-sm text-gray-700">In Stock</span>
                                </div>
                                <span class="text-sm font-medium text-gray-900">{{ $inStockCount }} items</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 rounded-full bg-red-500 mr-2"></div>
                                    <span class="text-sm text-gray-700">Out of Stock</span>
                                </div>
                                <span class="text-sm font-medium text-gray-900">{{ $outOfStockCount }} items</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recently Viewed -->
                @if (count($allRecentItems) > 0)
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recently Viewed</h3>
                        <div class="space-y-4">
                            @foreach ($allRecentItems as $product)
                                <div class="flex items-center gap-3 group">
                                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                                        class="w-16 h-16 rounded-lg object-cover flex-shrink-0 group-hover:scale-105 transition-transform">
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-medium text-gray-900 truncate">
                                            {{ $product['name'] }}
                                        </h4>
                                        <div class="text-sm font-bold text-gray-900">
                                            ${{ number_format($product['price'], 2) }}
                                        </div>
                                    </div>
                                    <div class="text-pink-500 flex-shrink-0">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    function addToCart(productId) {
        console.log('Adding product to cart:', productId);
        alert('Added product ' + productId + ' to cart!');
    }

    function removeFromWishlist(productId) {
        if (confirm('Remove this item from wishlist?')) {
            console.log('Removing product:', productId);
            alert('Removed product ' + productId + ' from wishlist!');
        }
    }

    function addAllToCart() {
        console.log('Adding all items to cart');
        alert('Adding all items to cart!');
    }

    function clearWishlist() {
        if (confirm('Clear your entire wishlist?')) {
            console.log('Clearing wishlist');
            alert('Wishlist cleared!');
        }
    }
</script>

<style>
    .bg-amber-50 {
        background-color: #fffbeb;
    }

    .bg-amber-600 {
        background-color: #d97706;
    }

    .hover\:bg-amber-700:hover {
        background-color: #b45309;
    }

    .text-amber-600 {
        color: #d97706;
    }

    .hover\:text-amber-600:hover {
        color: #d97706;
    }

    .transition-colors {
        transition: all 0.2s ease;
    }

    .transition-transform {
        transition: transform 0.3s ease;
    }
</style>
