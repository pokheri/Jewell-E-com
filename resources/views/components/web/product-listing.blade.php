@php
    // Sample data for products
    $products = [
        (object) [
            'id' => 1,
            'name' => 'Solitaire Diamond Engagement Ring',
            'category' => 'Diamond Rings',
            'price' => 25999,
            'original_price' => 31999,
            'rating' => 4.8,
            'review_count' => 142,
            'image' => 'https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=600&h=600&fit=crop&q=80',
            'badge' => 'New',
            'badge_color' => 'bg-green-600',
        ],
        (object) [
            'id' => 2,
            'name' => 'Eternity Diamond Band',
            'category' => 'Wedding Bands',
            'price' => 18999,
            'original_price' => 22999,
            'rating' => 4.5,
            'review_count' => 89,
            'image' => 'https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=600&h=600&fit=crop&q=80',
            'badge' => 'Best Seller',
            'badge_color' => 'bg-blue-600',
        ],
        (object) [
            'id' => 3,
            'name' => 'Pear Shape Diamond Pendant',
            'category' => 'Necklaces',
            'price' => 12999,
            'original_price' => 15999,
            'rating' => 4.7,
            'review_count' => 67,
            'image' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=600&h=600&fit=crop&q=80',
            'badge' => 'Sale',
            'badge_color' => 'bg-red-600',
        ],
        (object) [
            'id' => 4,
            'name' => 'Diamond Stud Earrings',
            'category' => 'Earrings',
            'price' => 14999,
            'original_price' => 17999,
            'rating' => 4.9,
            'review_count' => 203,
            'image' => 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=600&h=600&fit=crop&q=80',
            'badge' => 'Limited',
            'badge_color' => 'bg-purple-600',
        ],
        (object) [
            'id' => 5,
            'name' => 'Tennis Diamond Bracelet',
            'category' => 'Bracelets',
            'price' => 28999,
            'original_price' => 34999,
            'rating' => 4.6,
            'review_count' => 54,
            'image' => 'https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?w=600&h=600&fit=crop&q=80',
            'badge' => 'New',
            'badge_color' => 'bg-green-600',
        ],
        (object) [
            'id' => 6,
            'name' => 'Gold Plated Ruby Ring',
            'category' => 'Gemstone Rings',
            'price' => 17999,
            'original_price' => 21999,
            'rating' => 4.4,
            'review_count' => 78,
            'image' => 'https://images.unsplash.com/photo-1573408301185-9146fe634ad0?w=600&h=600&fit=crop&q=80',
            'badge' => null,
            'badge_color' => '',
        ],
        (object) [
            'id' => 7,
            'name' => 'Platinum Wedding Band',
            'category' => 'Wedding Bands',
            'price' => 32999,
            'original_price' => 38999,
            'rating' => 4.8,
            'review_count' => 112,
            'image' => 'https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=600&h=600&fit=crop&q=80',
            'badge' => 'Premium',
            'badge_color' => 'bg-amber-600',
        ],
        (object) [
            'id' => 8,
            'name' => 'Rose Gold Diamond Ring',
            'category' => 'Diamond Rings',
            'price' => 21999,
            'original_price' => 26999,
            'rating' => 4.7,
            'review_count' => 95,
            'image' => 'https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=600&h=600&fit=crop&q=80',
            'badge' => 'Sale',
            'badge_color' => 'bg-red-600',
        ],
    ];

    // Filter categories
    $categories = ['All', 'Diamond Rings', 'Wedding Bands', 'Necklaces', 'Earrings', 'Bracelets', 'Gemstone Rings'];

    // Sort options
    $sortOptions = [
        'best_seller' => 'Best Seller',
        'new_arrival' => 'New Arrival',
        'price_high_low' => 'Price: High to Low',
        'price_low_high' => 'Price: Low to High',
        'popularity' => 'Popularity',
    ];
@endphp

<div class="min-h-screen bg-gray-50">
    <div class="container mx-auto px-4 py-6 md:py-8">
        <!-- Page Header -->
        <div class="mb-6 md:mb-8">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Jewellery Collection</h1>
            <p class="text-gray-600 mt-2">Discover our exquisite collection of handcrafted jewellery</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Desktop Filters (≥1024px) -->
            <div class="hidden lg:block w-64 flex-shrink-0">
                <div class="bg-white rounded-lg shadow-sm p-6 sticky top-6">
                    <!-- Filter Header -->
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-semibold text-gray-900">Filters</h2>
                        <button type="button" id="clearAllFilters"
                            class="text-sm text-amber-600 hover:text-amber-700">Clear All</button>
                    </div>

                    <!-- Categories Filter -->
                    <div class="mb-6">
                        <h3 class="font-medium text-gray-900 mb-3">Categories</h3>
                        <div class="space-y-2">
                            @foreach ($categories as $category)
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox"
                                        class="filter-category rounded border-gray-300 text-amber-600 focus:ring-amber-500"
                                        value="{{ $category }}">
                                    <span class="ml-2 text-gray-700">{{ $category }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Color (previously Metal Type) -->
                    <div class="mb-6">
                        <h3 class="font-medium text-gray-900 mb-3">Color</h3>
                        <div class="space-y-2">
                            @foreach (['Gold', 'Silver', 'Platinum', 'Rose Gold', 'White Gold'] as $color)
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox"
                                        class="filter-color rounded border-gray-300 text-amber-600 focus:ring-amber-500"
                                        value="{{ $color }}">
                                    <span class="ml-2 text-gray-700">{{ $color }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Apply Filters Button -->
                    <button type="button" id="applyFilters"
                        class="w-full bg-amber-600 hover:bg-amber-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                        Apply Filters
                    </button>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1">
                <!-- Mobile Filter & Sort Bar -->
                <div class="lg:hidden mb-6">
                    <div class="flex items-center justify-between gap-4">
                        <!-- Filter Button (Mobile) -->
                        <button id="filterToggle"
                            class="flex items-center gap-2 bg-white border border-gray-300 rounded-lg px-4 py-2 hover:border-amber-500 transition-colors">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                                </path>
                            </svg>
                            <span class="text-gray-700">Filters</span>
                        </button>

                        <!-- Sort Dropdown -->
                        <div class="relative flex-1">
                            <select id="sortSelectMobile"
                                class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2 appearance-none focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500">
                                <option value="">Sort By</option>
                                @foreach ($sortOptions as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Desktop Sort Bar (≥1024px) -->
                <div class="hidden lg:flex items-center justify-between mb-6">
                    <div class="text-gray-600">
                        Showing <span class="font-semibold text-gray-900">{{ count($products) }}</span> products
                    </div>

                    <div class="flex items-center gap-4">
                        <span class="text-gray-700">Sort By:</span>
                        <div class="relative">
                            <select id="sortSelectDesktop"
                                class="bg-white border border-gray-300 rounded-lg px-4 py-2 appearance-none focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 min-w-[200px]">
                                <option value="">Select</option>
                                @foreach ($sortOptions as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <!--
                    Grid breakdown:
                    - Below 640px: 2 items per row (grid-cols-2)
                    - 640px to 1023px: 3 items per row (sm:grid-cols-3)
                    - 1024px and above: 4 items per row (xl:grid-cols-4)
                    Note: lg:grid-cols-3 is removed as we go directly to xl:grid-cols-4 at 1024px
                -->
                <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
                    @foreach ($products as $product)
                        <!-- Product Card -->
                        <div
                            class="bg-white rounded-lg shadow-sm overflow-hidden group hover:shadow-md transition-all duration-300 border border-gray-100 h-full flex flex-col">
                            <!-- Product Image -->
                            <div class="relative overflow-hidden flex-shrink-0">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                    class="w-full h-48 sm:h-56 object-cover group-hover:scale-105 transition-transform duration-500">

                                <!-- Top Elements -->
                                <div class="absolute top-0 left-0 right-0 flex justify-between items-start p-2 sm:p-3">
                                    <!-- Badge -->
                                    @if ($product->badge)
                                        <span
                                            class="{{ $product->badge_color }} text-white text-xs font-semibold px-2 py-1 rounded">
                                            {{ $product->badge }}
                                        </span>
                                    @endif

                                    <!-- Wishlist Button -->
                                    <button class="bg-white rounded-full p-1.5 shadow-sm hover:shadow-md">
                                        <svg class="w-4 h-4 text-gray-600 hover:text-red-500" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="p-3 sm:p-4 flex flex-col flex-grow">
                                <!-- Category -->
                                <div class="text-xs text-amber-600 font-medium mb-1">
                                    {{ $product->category }}
                                </div>

                                <!-- Title -->
                                <h3
                                    class="text-sm font-semibold text-gray-900 mb-2 line-clamp-2 leading-tight hover:text-amber-700 transition-colors">
                                    {{ $product->name }}
                                </h3>

                                <!-- Rating -->
                                <div class="flex items-center gap-1 mb-3">
                                    <div class="flex">
                                        @for ($j = 0; $j < 5; $j++)
                                            <svg class="w-3 h-3 {{ $j < floor($product->rating) ? 'text-yellow-400' : 'text-gray-300' }}"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                        @endfor
                                    </div>
                                    <span class="text-xs text-gray-500 ml-1">
                                        ({{ $product->review_count }})
                                    </span>
                                </div>

                                <!-- Price and Add to Cart -->
                                <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-100">
                                    <!-- Price -->
                                    <div class="text-left min-w-0 flex-1">
                                        <div class="text-sm font-bold text-gray-900">
                                            ₹{{ number_format($product->price) }}
                                        </div>
                                        @if ($product->original_price > $product->price)
                                            <div class="text-xs text-gray-500 line-through">
                                                ₹{{ number_format($product->original_price) }}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Add to Cart Button -->
                                    <button
                                        class="bg-amber-600 hover:bg-amber-700 text-white p-1.5 rounded-lg transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Simple Pagination (only left/right arrows) -->
                <div class="mt-8 flex justify-center">
                    <nav class="flex items-center gap-2">
                        <button
                            class="p-2 rounded-lg border border-gray-300 hover:bg-gray-50 text-gray-700 disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>

                        <button
                            class="p-2 rounded-lg border border-gray-300 hover:bg-gray-50 text-gray-700 disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Filter Drawer -->
<div id="mobileFilterDrawer" class="lg:hidden fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50" onclick="closeFilterDrawer()"></div>

    <div class="absolute right-0 top-0 h-full w-80 bg-white shadow-xl">
        <div class="h-full flex flex-col">
            <!-- Drawer Header -->
            <div class="flex items-center justify-between p-4 border-b">
                <h2 class="text-lg font-semibold text-gray-900">Filters</h2>
                <button onclick="closeFilterDrawer()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Drawer Content -->
            <div class="flex-1 overflow-y-auto p-4">
                <!-- Categories Filter -->
                <div class="mb-6">
                    <h3 class="font-medium text-gray-900 mb-3">Categories</h3>
                    <div class="space-y-2">
                        @foreach ($categories as $category)
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox"
                                    class="mobile-filter-category rounded border-gray-300 text-amber-600 focus:ring-amber-500"
                                    value="{{ $category }}">
                                <span class="ml-2 text-gray-700">{{ $category }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Color (previously Metal Type) -->
                <div class="mb-6">
                    <h3 class="font-medium text-gray-900 mb-3">Color</h3>
                    <div class="space-y-2">
                        @foreach (['Gold', 'Silver', 'Platinum', 'Rose Gold', 'White Gold'] as $color)
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox"
                                    class="mobile-filter-color rounded border-gray-300 text-amber-600 focus:ring-amber-500"
                                    value="{{ $color }}">
                                <span class="ml-2 text-gray-700">{{ $color }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Drawer Footer -->
            <div class="p-4 border-t">
                <div class="flex gap-3">
                    <button type="button" id="mobileClearAll"
                        class="flex-1 border border-gray-300 text-gray-700 font-medium py-2 px-4 rounded-lg hover:bg-gray-50">
                        Clear All
                    </button>
                    <button type="button" id="mobileApplyFilters"
                        class="flex-1 bg-amber-600 hover:bg-amber-700 text-white font-medium py-2 px-4 rounded-lg">
                        Apply Filters
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Mobile Filter Drawer Functions
    function openFilterDrawer() {
        document.getElementById('mobileFilterDrawer').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeFilterDrawer() {
        document.getElementById('mobileFilterDrawer').classList.add('hidden');
        document.body.style.overflow = '';
    }

    // Clear all checkboxes function
    function clearAllCheckboxes() {
        // Clear desktop checkboxes
        document.querySelectorAll('.filter-category, .filter-color').forEach(checkbox => {
            checkbox.checked = false;
        });

        // Clear mobile checkboxes
        document.querySelectorAll('.mobile-filter-category, .mobile-filter-color').forEach(checkbox => {
            checkbox.checked = false;
        });

        console.log('All filters cleared');
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile filter button
        document.getElementById('filterToggle').addEventListener('click', openFilterDrawer);

        // Clear All button for desktop
        document.getElementById('clearAllFilters').addEventListener('click', clearAllCheckboxes);

        // Clear All button for mobile drawer
        document.getElementById('mobileClearAll').addEventListener('click', clearAllCheckboxes);

        // Apply Filters button for desktop
        document.getElementById('applyFilters').addEventListener('click', function() {
            console.log('Applying desktop filters...');
            // Add your filter logic here
            closeFilterDrawer(); // Close drawer if open
        });

        // Apply Filters button for mobile
        document.getElementById('mobileApplyFilters').addEventListener('click', function() {
            console.log('Applying mobile filters...');
            // Add your filter logic here
            closeFilterDrawer();
        });

        // Sort select functionality
        const sortSelectDesktop = document.getElementById('sortSelectDesktop');
        const sortSelectMobile = document.getElementById('sortSelectMobile');

        if (sortSelectDesktop) {
            sortSelectDesktop.addEventListener('change', function() {
                console.log('Desktop sort selected:', this.value);
                // Add your sort logic here
            });
        }

        if (sortSelectMobile) {
            sortSelectMobile.addEventListener('change', function() {
                console.log('Mobile sort selected:', this.value);
                // Add your sort logic here
            });
        }

        // Close drawer with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeFilterDrawer();
            }
        });
    });
</script>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Custom scrollbar for drawer */
    #mobileFilterDrawer div[class*="overflow-y-auto"] {
        scrollbar-width: thin;
        scrollbar-color: #d1d5db transparent;
    }

    #mobileFilterDrawer div[class*="overflow-y-auto"]::-webkit-scrollbar {
        width: 6px;
    }

    #mobileFilterDrawer div[class*="overflow-y-auto"]::-webkit-scrollbar-track {
        background: transparent;
    }

    #mobileFilterDrawer div[class*="overflow-y-auto"]::-webkit-scrollbar-thumb {
        background-color: #d1d5db;
        border-radius: 20px;
    }
</style>
