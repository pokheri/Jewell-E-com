{{-- Best Selling Products Slider --}}


<x-ui.home-content-layout-container bgColor="gray-50">
    <x-slot name="title">Best Selling Products </x-slot>
    <x-slot name="subtitle">Most loved by our customers</x-slot>

    {{-- Slider Container --}}
    <div class="relative">
        {{-- Previous button - REMOVED VERTICAL LINES --}}
        <x-ui.prev-next-btn id="prev-product" />

        {{-- Slider Content --}}
        <div class="w-full overflow-hidden px-0 sm:px-1">
            <div id="unified-slider" class="flex will-change-transform transition-transform duration-500 ease-in-out">
                {{-- Product Items Loop --}}

                @for ($i = 0; $i < 10; $i++)
                    <div class="w-1/2 sm:w-1/3 md:w-1/3 lg:w-1/4 flex-shrink-0 px-1.5 sm:px-2">
                        <div
                            class="bg-white rounded-lg sm:rounded-xl shadow-sm overflow-hidden group hover:shadow-md transition-all duration-300 border border-gray-100 h-full flex flex-col mx-0.5">
                            {{-- Product Image --}}
                            <div class="relative overflow-hidden flex-shrink-0">
                                <img src="{{ asset('images/banners/earing.jpeg') }}" alt="Gold Diamond Ring"
                                    class="w-full h-36 sm:h-40 md:h-44 lg:h-48 object-cover group-hover:scale-105 transition-transform duration-500">

                                {{-- Top Elements --}}
                                <div class="absolute top-0 left-0 right-0 flex justify-between items-start p-2">
                                    {{-- Best Seller Badge --}}
                                    <x-ui.product-banner class="bg-amber-600" :bestSeller="true">BEST
                                        SELLER</x-ui.product-banner>

                                    {{-- Wishlist Button --}}
                                    <x-icon.product-wish-icon />
                                </div>
                            </div>

                            {{-- Product Details --}}
                            <div class="p-2 sm:p-3 flex flex-col flex-grow">
                                {{-- Category --}}
                                <div class="text-[10px] sm:text-xs text-amber-600 font-medium mb-0.5">
                                    Gold Jewelry
                                </div>

                                {{-- Title --}}
                                <h3
                                    class="text-[11px] sm:text-xs font-semibold text-gray-900 mb-1 sm:mb-1.5 line-clamp-2 leading-tight hover:text-amber-700 transition-colors">
                                    Classic Diamond Ring with Elegant Design
                                </h3>

                                {{-- Rating --}}
                                <div class="flex items-center gap-0.5 mb-1.5 sm:mb-2">
                                    <div class="flex">
                                        @for ($j = 0; $j < 5; $j++)
                                            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png"
                                                alt="Star" class="w-2.5 h-2.5 sm:w-3 sm:h-3">
                                        @endfor
                                    </div>
                                    <span class="text-[10px] sm:text-xs text-gray-500 ml-0.5">
                                        (48)
                                    </span>
                                </div>

                                {{-- Price and Add to Cart --}}
                                <div
                                    class="flex items-center justify-between mt-auto pt-2 sm:pt-3 border-t border-gray-100">
                                    {{-- Price --}}
                                    <div class="text-left min-w-0 flex-1">
                                        <div
                                            class="text-xs md:text-base font-bold text-gray-900 truncate text-[10px] sm:text-xs">
                                            ₹25,999
                                        </div>
                                        <div class="text-[9px] sm:text-xs text-gray-500 line-through truncate">
                                            ₹31,999
                                        </div>
                                    </div>

                                    {{-- Add to Cart Button --}}
                                    <x-ui.add-to-cart-btn />
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        {{-- Next button - REMOVED VERTICAL LINES --}}
        <x-ui.prev-next-btn id="next-product" direction="next" />
    </div>
</x-ui.home-content-layout-container>


{{-- CSS for Slider --}}
@push('styles')
    <style>
        /* Unified Slider Width Calculation - ADJUSTED */
        @media (max-width: 639px) {
            #unified-slider {
                width: 500%;
                /* 10 products × 50% width */
            }

            .slider-item {
                padding-left: 0.25rem;
                padding-right: 0.25rem;
            }
        }

        @media (min-width: 640px) and (max-width: 767px) {
            #unified-slider {
                width: 333.333%;
                /* 10 products × 33.333% width */
            }
        }

        @media (min-width: 768px) and (max-width: 1023px) {
            #unified-slider {
                width: 333.333%;
                /* 10 products ÷ 3 visible */
            }
        }

        @media (min-width: 1024px) {
            #unified-slider {
                width: 250%;
                /* 10 products ÷ 4 visible */
            }
        }

        /* Luxury Font for heading */
        .luxury-font {
            font-family: 'Playfair Display', serif;
            letter-spacing: 0.5px;
        }

        /* Line clamp for titles */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Compact design optimizations */
        @media (max-width: 639px) {
            .h-36 {
                height: 9rem;
            }

            .gap-3 {
                gap: 0.5rem;
            }

            /* Remove extra spacing */
            .container.px-2 {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }
        }

        @media (max-width: 400px) {
            .h-36 {
                height: 8rem !important;
            }

            /* Even more compact for very small screens */
            .grid-cols-2>* {
                padding-left: 0.25rem;
                padding-right: 0.25rem;
            }

            #prev-product,
            #next-product {
                width: 6px;
                height: 6px;
                -ml-1;
                -mr-1;
            }
        }

        /* Button hover effects */
        #prev-product:hover,
        #next-product:hover {
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Hide scrollbar */
        .overflow-hidden {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .overflow-hidden::-webkit-scrollbar {
            display: none;
        }

        /* Ensure buttons don't get cut off */
        .min-w-0 {
            min-width: 0;
        }

        .truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush

{{-- Unified JavaScript --}}
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slider = document.getElementById('unified-slider');
            const prevBtn = document.getElementById('prev-product');
            const nextBtn = document.getElementById('next-product');
            const totalProducts = 10;
            let currentIndex = 0;
            let slideTimer = null;
            const SLIDE_DELAY = 5000;

            // Get visible products based on screen width
            function getVisibleProducts() {
                if (window.innerWidth >= 1024) return 4; // Desktop large
                if (window.innerWidth >= 768) return 3; // Desktop/Tablet
                if (window.innerWidth >= 640) return 3; // Tablet
                return 2; // Mobile
            }

            // Update slider position
            function updateSlider() {
                const visibleProducts = getVisibleProducts();
                const slideWidth = 100 / visibleProducts;
                const translateX = -currentIndex * slideWidth;
                slider.style.transform = `translateX(${translateX}%)`;
            }

            // Silent jump for seamless looping
            function silentJump(toIndex) {
                const visibleProducts = getVisibleProducts();
                const slideWidth = 100 / visibleProducts;
                const translateX = -toIndex * slideWidth;
                slider.style.transition = 'none';
                slider.style.transform = `translateX(${translateX}%)`;
                void slider.offsetWidth; // Trigger reflow
                slider.style.transition = 'transform 0.5s ease';
            }

            // Navigate to specific slide
            function goToSlide(toIndex) {
                const visibleProducts = getVisibleProducts();
                const maxIndex = totalProducts - visibleProducts;

                if (toIndex > maxIndex) {
                    currentIndex = 0;
                    silentJump(currentIndex);
                } else if (toIndex < 0) {
                    currentIndex = maxIndex;
                    silentJump(currentIndex);
                } else {
                    currentIndex = toIndex;
                }

                updateSlider();
                resetSlideTimer();
            }

            // Auto slide functionality
            function startSlideTimer() {
                stopSlideTimer();
                slideTimer = setTimeout(() => {
                    const visibleProducts = getVisibleProducts();
                    const maxIndex = totalProducts - visibleProducts;
                    const nextIndex = currentIndex >= maxIndex ? 0 : currentIndex + 1;
                    goToSlide(nextIndex);
                }, SLIDE_DELAY);
            }

            function stopSlideTimer() {
                if (slideTimer) clearTimeout(slideTimer);
            }

            function resetSlideTimer() {
                stopSlideTimer();
                startSlideTimer();
            }

            // Touch swipe for mobile
            let touchStartX = 0;
            let touchEndX = 0;

            slider.addEventListener('touchstart', e => {
                touchStartX = e.changedTouches[0].screenX;
                stopSlideTimer();
            });

            slider.addEventListener('touchend', e => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                resetSlideTimer();
            });

            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;

                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        goToSlide(currentIndex + 1);
                    } else {
                        goToSlide(currentIndex - 1);
                    }
                }
            }

            // Event listeners
            if (prevBtn) prevBtn.onclick = () => goToSlide(currentIndex - 1);
            if (nextBtn) nextBtn.onclick = () => goToSlide(currentIndex + 1);

            // Window resize handler
            window.addEventListener('resize', () => {
                updateSlider();
            });

            // Initialize
            updateSlider();
            startSlideTimer();
        });
    </script>
@endpush
