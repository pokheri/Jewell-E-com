@php
    // Assume this data comes from your controller/API
    $product = (object) [
        'id' => 1,
        'name' => 'Solitaire Diamond Engagement Ring',
        'category' => 'Diamond Rings',
        'price' => 25999,
        'description' =>
            'Exquisite solitaire diamond engagement ring with brilliant cut diamond in 14K white gold setting. Perfect for proposals and special occasions.',
        'rating' => 4.8,
        'review_count' => 142,
        'in_stock' => true,
        'stock_count' => 8,
        'sku' => 'DIAM-RING-001',
        'details' => [
            'Material' => '14K White Gold',
            'Diamond' => 'VS1, 1.2 CT',
            'Certification' => 'IGI Certified',
            'Shipping' => 'Free Shipping',
            'Returns' => '30 Days Return',
        ],
        'sizes' => ['US 4', 'US 5', 'US 6', 'US 7', 'US 8', 'US 9'],
        'images' => [
            [
                'id' => 1,
                'url' =>
                    'https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=600&h=600&fit=crop&auto=format&q=80',
                'thumbnail' =>
                    'https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=500&h=500&fit=crop&auto=format&q=80',
                'alt' => 'Solitaire Diamond Ring - Front View',
            ],
            [
                'id' => 2,
                'url' =>
                    'https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=600&h=600&fit=crop&auto=format&q=80',
                'thumbnail' =>
                    'https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=500&h=500&fit=crop&auto=format&q=80',
                'alt' => 'Solitaire Diamond Ring - Side View',
            ],
            [
                'id' => 3,
                'url' =>
                    'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=600&h=600&fit=crop&auto=format&q=80',
                'thumbnail' =>
                    'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=500&h=500&fit=crop&auto=format&q=80',
                'alt' => 'Solitaire Diamond Ring - Top View',
            ],
            [
                'id' => 4,
                'url' =>
                    'https://images.unsplash.com/photo-1573408301185-9146fe634ad0?w=600&h=600&fit=crop&auto=format&q=80',
                'thumbnail' =>
                    'https://images.unsplash.com/photo-1573408301185-9146fe634ad0?w=500&h=500&fit=crop&auto=format&q=80',
                'alt' => 'Solitaire Diamond Ring - Detail View',
            ],
        ],
    ];

    // Prepare data for AlpineJS
    $tabletSlides = [];
    for ($i = 0; $i < count($product->images); $i += 2) {
        $slide = [$product->images[$i]];
        if (isset($product->images[$i + 1])) {
            $slide[] = $product->images[$i + 1];
        }
        $tabletSlides[] = $slide;
    }

    $mobileImages = array_column($product->images, 'url');
    $mobileAlts = array_column($product->images, 'alt');
@endphp

<div class="min-h-screen bg-white">
    <div class="container mx-auto px-4 py-6 md:py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Product Gallery -->
            <div>
                <!-- Desktop Layout (≥1024px) - 2x2 Grid -->
                <div class="hidden lg:block">
                    <div class="grid grid-cols-2 gap-2">
                        @foreach ($product->images as $image)
                            <div class="bg-gray-50 rounded-lg overflow-hidden">
                                <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}"
                                    class="w-full h-auto object-cover rounded-lg">
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Tablet Layout (700px-1023px) - 2 Images in Slider -->
                <div class="hidden sm:block lg:hidden">
                    <div class="relative" x-data="tabletSlider()" @touchstart="handleTouchStart"
                        @touchmove="handleTouchMove" @touchend="handleTouchEnd">
                        <!-- Image Container -->
                        <div class="rounded-xl overflow-hidden h-[320px]">
                            <!-- Slides Container -->
                            <div class="flex transition-transform duration-300 ease-in-out h-full"
                                :style="`transform: translateX(-${currentSlide * 100}%)`">

                                @foreach ($tabletSlides as $slideIndex => $slide)
                                    <div class="w-full flex-shrink-0">
                                        <div class="grid grid-cols-2 gap-2 h-full">
                                            @foreach ($slide as $imageIndex => $image)
                                                <div class="bg-gray-50 rounded-lg overflow-hidden h-full">
                                                    <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}"
                                                        class="w-full h-full object-cover rounded-lg">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Dots Indicator -->
                        <div class="flex justify-center space-x-2 mt-4">
                            @foreach ($tabletSlides as $index => $slide)
                                <button @click="goToSlide({{ $index }})"
                                    class="w-2 h-2 rounded-full transition-colors"
                                    :class="currentSlide === {{ $index }} ? 'bg-amber-500' : 'bg-gray-300'"></button>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Mobile Layout (<700px) - Single Image Slider -->
                <div class="sm:hidden">
                    <div class="relative" x-data="mobileSlider()" @touchstart="handleTouchStart"
                        @touchmove="handleTouchMove" @touchend="handleTouchEnd">
                        <!-- Image Container -->
                        <div class="bg-gray-50 rounded-xl overflow-hidden h-[400px]">
                            <!-- Slides -->
                            <div class="relative h-full">
                                @foreach ($product->images as $index => $image)
                                    <div x-show="currentSlide === {{ $index }}"
                                        x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="absolute inset-0">
                                        <div class="w-full h-full p-2">
                                            <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}"
                                                class="w-full h-full object-cover rounded-lg">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Dots Indicator -->
                        <div class="flex justify-center space-x-2 mt-4">
                            @foreach ($product->images as $index => $image)
                                <button @click="goToSlide({{ $index }})"
                                    class="w-2 h-2 rounded-full transition-colors"
                                    :class="currentSlide === {{ $index }} ? 'bg-amber-500' : 'bg-gray-300'"></button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Information -->
            <div class="lg:mt-0">
                <!-- Header with Wishlist Button -->
                <div class="mb-4 flex justify-between items-start">
                    <div>
                        <span class="text-sm text-amber-600 font-medium">{{ $product->category }}</span>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mt-1">{{ $product->name }}</h1>
                    </div>
                    <!-- Wishlist Button -->
                    <button id="wishlistBtn"
                        class="bg-white border border-gray-300 rounded-full p-3 hover:border-amber-500 hover:text-red-500 transition-colors"
                        onclick="toggleWishlist()">
                        <svg id="wishlistIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </button>
                </div>

                <!-- Rating -->
                <div class="flex items-center gap-2 mb-4 [@media(min-width:360px)_and_(max-width:374px)]:gap-0">
                    <div class="flex">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 {{ $i <= floor($product->rating) ? 'text-yellow-400' : 'text-gray-300' }}"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                        @endfor
                    </div>
                    <span class="text-gray-600">{{ number_format($product->rating, 1) }} ({{ $product->review_count }}
                        reviews)</span>
                    @if ($product->in_stock)
                        <span class="ml-4 text-green-600 text-sm font-medium">
                            <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            In Stock
                        </span>
                    @endif
                </div>

                <!-- Price -->
                <div class="mb-6">
                    <span class="text-3xl font-bold text-gray-900">₹{{ number_format($product->price) }}</span>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                </div>

                <!-- Size Selection -->
                <div class="mb-6">
                    <h3 class="text-sm font-semibold text-gray-900 mb-3">Select Size</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($product->sizes as $size)
                            <button
                                class="px-4 py-2 border border-gray-300 rounded-lg hover:border-amber-500 hover:text-amber-600 transition-colors {{ $loop->first ? 'border-amber-500 bg-amber-50 text-amber-600' : '' }}"
                                onclick="selectSize('{{ $size }}')">
                                {{ $size }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Quantity -->
                <div class="mb-6">
                    <h3 class="text-sm font-semibold text-gray-900 mb-3">Quantity</h3>
                    <div class="flex items-center border border-gray-300 rounded-lg w-32">
                        <button type="button" class="px-4 py-2 text-gray-600 hover:text-amber-600"
                            onclick="updateQuantity(-1)">
                            -
                        </button>
                        <input type="text" value="1"
                            class="w-12 text-center border-0 focus:ring-0 text-lg font-semibold" id="quantity"
                            readonly>
                        <button type="button" class="px-4 py-2 text-gray-600 hover:text-amber-600"
                            onclick="updateQuantity(1)">
                            +
                        </button>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mb-8">
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button
                            class="flex-1 bg-amber-600 hover:bg-amber-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors"
                            onclick="addToCart()">
                            Add to Cart
                        </button>

                        <button
                            class="flex-1 bg-gray-900 hover:bg-black text-white font-semibold py-3 px-6 rounded-lg transition-colors"
                            onclick="buyNow()">
                            Buy Now
                        </button>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Product Details</h3>
                    <div class="space-y-2">
                        @foreach ($product->details as $key => $value)
                            <div class="flex justify-between">
                                <span class="text-gray-600">{{ $key }}:</span>
                                <span class="font-medium">{{ $value }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Tablet Slider Function
    function tabletSlider() {
        return {
            currentSlide: 0,
            totalSlides: {{ count($tabletSlides) }},
            touchStartX: 0,
            touchEndX: 0,
            init() {
                this.$watch('currentSlide', () => {});
            },
            nextSlide() {
                this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
            },
            prevSlide() {
                this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
            },
            handleTouchStart(event) {
                this.touchStartX = event.touches[0].clientX;
            },
            handleTouchMove(event) {
                this.touchEndX = event.touches[0].clientX;
            },
            handleTouchEnd() {
                const difference = this.touchStartX - this.touchEndX;
                if (Math.abs(difference) > 50) {
                    if (difference > 0) {
                        this.nextSlide();
                    } else {
                        this.prevSlide();
                    }
                }
            },
            goToSlide(index) {
                this.currentSlide = index;
            }
        }
    }

    // Mobile Slider Function
    function mobileSlider() {
        return {
            currentSlide: 0,
            totalSlides: {{ count($product->images) }},
            touchStartX: 0,
            touchEndX: 0,
            init() {
                this.$watch('currentSlide', () => {});
            },
            nextSlide() {
                this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
            },
            prevSlide() {
                this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
            },
            handleTouchStart(event) {
                this.touchStartX = event.touches[0].clientX;
            },
            handleTouchMove(event) {
                this.touchEndX = event.touches[0].clientX;
            },
            handleTouchEnd() {
                const difference = this.touchStartX - this.touchEndX;
                if (Math.abs(difference) > 50) {
                    if (difference > 0) {
                        this.nextSlide();
                    } else {
                        this.prevSlide();
                    }
                }
            },
            goToSlide(index) {
                this.currentSlide = index;
            }
        }
    }

    // Wishlist
    function toggleWishlist() {
        const icon = document.getElementById('wishlistIcon');
        const btn = document.getElementById('wishlistBtn');

        if (icon.classList.contains('text-red-500')) {
            icon.classList.remove('text-red-500', 'fill-red-500');
            icon.classList.add('text-gray-400');
            btn.classList.remove('border-red-500');
            btn.classList.add('border-gray-300');
        } else {
            icon.classList.remove('text-gray-400');
            icon.classList.add('text-red-500', 'fill-red-500');
            btn.classList.remove('border-gray-300');
            btn.classList.add('border-red-500');
        }
    }

    // Size Selection
    function selectSize(size) {
        document.querySelectorAll('button[onclick^="selectSize"]').forEach(btn => {
            if (btn.textContent.trim() === size) {
                btn.classList.add('border-amber-500', 'bg-amber-50', 'text-amber-600');
                btn.classList.remove('border-gray-300');
            } else {
                btn.classList.remove('border-amber-500', 'bg-amber-50', 'text-amber-600');
                btn.classList.add('border-gray-300');
            }
        });
    }

    // Quantity Control
    let quantity = 1;

    function updateQuantity(change) {
        quantity = Math.max(1, quantity + change);
        document.getElementById('quantity').value = quantity;
    }

    // Cart Functions
    function addToCart() {
        const selectedSize = document.querySelector('button[onclick^="selectSize"].border-amber-500');
        if (!selectedSize) {
            alert('Please select a size');
            return;
        }
        alert(`Added to cart: ${quantity} × Size ${selectedSize.textContent.trim()}`);
    }

    function buyNow() {
        const selectedSize = document.querySelector('button[onclick^="selectSize"].border-amber-500');
        if (!selectedSize) {
            alert('Please select a size');
            return;
        }
        alert(`Buying now: ${quantity} × Size ${selectedSize.textContent.trim()}`);
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        // Select first size by default
        selectSize('{{ $product->sizes[0] }}');
    });
</script>

<!-- Include AlpineJS for sliders -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
