{{-- Rings Product Section --}}
<section class="py-8 sm:py-10 md:py-14 bg-white">
    <div class="container mx-auto px-3 sm:px-4">
        {{-- Section Header --}}
        <div class="text-center mb-8 sm:mb-10 md:mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl luxury-font text-gray-900 mb-3">Exquisite Rings Collection</h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base">Discover our finest selection of handcrafted
                rings</p>
        </div>

        {{-- Product Grid --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 md:gap-6">
            @for ($i = 0; $i < 8; $i++)
                <div
                    class="bg-white rounded-lg sm:rounded-xl shadow-sm overflow-hidden group hover:shadow-md transition-all duration-300 border border-gray-100 h-full flex flex-col">
                    {{-- Product Image --}}
                    <div class="relative overflow-hidden flex-shrink-0">
                        <img src="https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=600&h=600&fit=crop&crop=center"
                            alt="Diamond Ring"
                            class="w-full h-40 sm:h-48 md:h-48 lg:h-56 object-cover group-hover:scale-105 transition-transform duration-500">

                        {{-- Top Elements --}}
                        <div class="absolute top-0 left-0 right-0 flex justify-between items-start p-2 sm:p-3">
                            {{-- Optional Badge - You can add "NEW", "SALE", etc. here --}}
                            {{-- <div class="bg-green-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded shadow">
                                NEW
                            </div> --}}

                            {{-- Wishlist Button --}}
                            <button
                                class="w-5 h-5 sm:w-6 sm:h-6 md:w-7 md:h-7 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow hover:shadow-md transition-all duration-300 ml-auto">
                                <img src="https://cdn-icons-png.flaticon.com/512/1077/1077035.png" alt="Wishlist"
                                    class="w-2.5 h-2.5 sm:w-3 sm:h-3 md:w-3.5 md:h-3.5 opacity-70 hover:opacity-100 hover:scale-110 transition-all">
                            </button>
                        </div>
                    </div>

                    {{-- Product Details --}}
                    <div class="p-2 sm:p-3 flex flex-col flex-grow">
                        {{-- Category --}}
                        <div class="text-[10px] sm:text-xs md:text-sm text-amber-600 font-medium mb-1">
                            Diamond Rings
                        </div>

                        {{-- Title --}}
                        <h3
                            class="text-[11px] sm:text-xs md:text-sm font-semibold text-gray-900 mb-1.5 sm:mb-2 line-clamp-2 leading-tight hover:text-amber-700 transition-colors">
                            @php
                                $titles = [
                                    'Solitaire Diamond Engagement Ring',
                                    'Vintage Style Gold Band Ring',
                                    'Modern Platinum Wedding Ring',
                                    'Rose Gold Infinity Love Ring',
                                    'Three-Stone Diamond Anniversary Ring',
                                    'Art Deco Inspired Statement Ring',
                                    'Minimalist Thin Gold Band',
                                    'Halo Diamond Cluster Ring',
                                ];
                            @endphp
                            {{ $titles[$i % count($titles)] }}
                        </h3>

                        {{-- Rating --}}
                        <div class="flex items-center gap-0.5 sm:gap-1 mb-2 sm:mb-3">
                            <div class="flex">
                                @for ($j = 0; $j < 5; $j++)
                                    <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" alt="Star"
                                        class="w-2.5 h-2.5 sm:w-3 sm:h-3 md:w-3 md:h-3">
                                @endfor
                            </div>
                            <span class="text-[10px] sm:text-xs md:text-sm text-gray-500 ml-0.5 sm:ml-1">
                                @php
                                    $reviews = [42, 38, 56, 29, 67, 45, 31, 52];
                                @endphp
                                ({{ $reviews[$i % count($reviews)] }})
                            </span>
                        </div>

                        {{-- Price and Add to Cart --}}
                        <div class="flex items-center justify-between mt-auto pt-2 sm:pt-3 border-t border-gray-100">
                            {{-- Price --}}
                            <div class="text-left">
                                @php
                                    $prices = [25999, 18999, 32999, 14999, 42999, 28999, 9999, 36999];
                                    $originalPrices = [31999, 23999, 38999, 18999, 49999, 34999, 12999, 43999];
                                @endphp
                                <div class="text-sm sm:text-base md:text-lg font-bold text-gray-900">
                                    ₹{{ number_format($prices[$i % count($prices)]) }}
                                </div>
                                <div class="text-[10px] sm:text-xs md:text-sm text-gray-500 line-through">
                                    ₹{{ number_format($originalPrices[$i % count($originalPrices)]) }}
                                </div>
                            </div>

                            {{-- Add to Cart Button --}}
                            <button
                                class="add-cart-btn px-1.5 sm:px-2 py-1 bg-amber-600 hover:bg-amber-700 text-white text-[10px] sm:text-xs md:text-sm font-medium rounded-md sm:rounded-lg flex items-center gap-0.5 sm:gap-1 transition-all duration-300 shadow-sm hover:shadow min-w-[60px] sm:min-w-[70px] md:min-w-[80px]">
                                <img src="https://cdn-icons-png.flaticon.com/512/3144/3144456.png" alt="Cart"
                                    class="w-2.5 h-2.5 sm:w-3 sm:h-3 md:w-3 md:h-4 filter brightness-0 invert">
                                <span>Add</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

        {{-- View All Button --}}
        <div class="text-center mt-8 sm:mt-10 md:mt-12">
            <a href="#"
                class="inline-block px-6 sm:px-8 py-2.5 sm:py-3 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300 text-sm sm:text-base">
                View All Rings
            </a>
        </div>
    </div>
</section>

{{-- CSS for Product Cards --}}
@push('styles')
    <style>
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

        /* Optimizations for small screens */
        @media (max-width: 639px) {
            .h-40 {
                height: 10rem;
            }

            .gap-3 {
                gap: 0.75rem;
            }
        }

        @media (max-width: 400px) {
            .h-40 {
                height: 9rem !important;
            }

            .grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        /* Hover effects */
        .group:hover .group-hover\:scale-105 {
            transform: scale(1.05);
        }

        .group:hover .group-hover\:shadow-md {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
@endpush
