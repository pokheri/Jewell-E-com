{{-- Best Selling Products Slider --}}
<section class="py-8 sm:py-10 md:py-14">
    <div class="container mx-auto px-3 sm:px-4">
        {{-- Section Header --}}
        <div class="text-center mb-8 sm:mb-10 md:mb-14">
            <h2 class="text-2xl sm:text-3xl md:text-4xl luxury-font text-gray-900 mb-3 sm:mb-4">Best Selling Products
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base">Most loved by our customers</p>
        </div>

        {{-- Slider Container --}}
        <div class="relative">
            {{-- Previous button --}}
            <x-ui.prev-next-btn direction="prev" id="prev-product" />
            {{-- Slider Content --}}
            <div class="w-full px-1.5 sm:px-2 overflow-hidden">
                <div id="unified-slider"
                    class="flex will-change-transform transition-transform duration-500 ease-in-out">
                    {{-- Product Items Loop --}}
                    @for ($i = 0; $i < 10; $i++)
                        <div class="w-1/2 sm:w-1/3 md:w-1/3 lg:w-1/4 flex-shrink-0 px-1.5 sm:px-2">
                            <div
                                class="bg-white rounded-lg sm:rounded-xl shadow-sm overflow-hidden group hover:shadow-md transition-all duration-300 border border-gray-100 h-full flex flex-col">
                                {{-- Product Image --}}
                                <div class="relative overflow-hidden flex-shrink-0">
                                    <img src="{{ asset('images/banners/earing.jpeg') }}" alt="Gold Diamond Ring"
                                        class="w-full h-40 sm:h-48 md:h-48 lg:h-56 object-cover group-hover:scale-105 transition-transform duration-500">

                                    {{-- Top Elements --}}
                                    <div
                                        class="absolute top-0 left-0 right-0 flex justify-between items-start p-2 sm:p-3">
                                        {{-- Best Seller Badge - Consistent size across all screens --}}
                                        <div
                                            class="bg-amber-600 hover:bg-amber-700 text-white text-[10px] font-bold px-1.5 py-0.5 rounded shadow transition-colors duration-300">
                                            BEST SELLER
                                        </div>

                                        {{-- Wishlist Button --}}
                                        <button
                                            class="w-5 h-5 sm:w-6 sm:h-6 md:w-7 md:h-7 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow hover:shadow-md transition-all duration-300">
                                            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077035.png"
                                                alt="Wishlist"
                                                class="w-2.5 h-2.5 sm:w-3 sm:h-3 md:w-3.5 md:h-3.5 opacity-70 hover:opacity-100 hover:scale-110 transition-all">
                                        </button>
                                    </div>
                                </div>

                                {{-- Product Details --}}
                                <div class="p-2 sm:p-3 flex flex-col flex-grow">
                                    {{-- Category --}}
                                    <div class="text-[10px] sm:text-xs md:text-sm text-amber-600 font-medium mb-1">
                                        Gold Jewelry
                                    </div>

                                    {{-- Title --}}
                                    <h3
                                        class="text-[11px] sm:text-xs md:text-sm font-semibold text-gray-900 mb-1.5 sm:mb-2 line-clamp-2 leading-tight hover:text-amber-700 transition-colors">
                                        Classic Diamond Ring with Elegant Design
                                    </h3>

                                    {{-- Rating --}}
                                    <div class="flex items-center gap-0.5 sm:gap-1 mb-2 sm:mb-3">
                                        <div class="flex">
                                            @for ($j = 0; $j < 5; $j++)
                                                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png"
                                                    alt="Star" class="w-2.5 h-2.5 sm:w-3 sm:h-3 md:w-3 md:h-3">
                                            @endfor
                                        </div>
                                        <span class="text-[10px] sm:text-xs md:text-sm text-gray-500 ml-0.5 sm:ml-1">
                                            (48)
                                        </span>
                                    </div>

                                    {{-- Price and Add to Cart --}}
                                    <div
                                        class="flex items-center justify-between mt-auto pt-2 sm:pt-3 border-t border-gray-100">
                                        {{-- Price --}}
                                        <div class="text-left">
                                            <div class="text-sm sm:text-base md:text-lg font-bold text-gray-900">
                                                ₹25,999
                                            </div>
                                            <div class="text-[10px] sm:text-xs md:text-sm text-gray-500 line-through">
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

            {{-- Right Navigation Button --}}
            {{-- Next button --}}

            <x-ui.prev-next-btn direction="next" id="next-product" />
        </div>
    </div>
</section>

{{-- CSS for Slider --}}
@push('styles')
    <style>
        /* Unified Slider Width Calculation */
        @media (max-width: 639px) {
            #unified-slider {
                width: 500%;
                /* 10 products × 50% (2 per row) */
            }
        }

        @media (min-width: 640px) and (max-width: 767px) {
            #unified-slider {
                width: 333.333%;
                /* 10 products × 33.333% (3 per row) */
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

        /* Small screen optimizations */
        @media (max-width: 639px) {
            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        }

        @media (max-width: 400px) {
            .h-40 {
                height: 9rem !important;
            }
        }

        /* Luxury Font for heading */
        .luxury-font {
            font-family: 'Playfair Display', serif;
            letter-spacing: 0.5px;
        }

        /* Hide scrollbar */
        .overflow-hidden {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .overflow-hidden::-webkit-scrollbar {
            display: none;
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
