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
                <x-ui.product-card />
            @endfor
        </div>

        {{-- View All Button --}}
        <x-ui.view-all-btn>View All Rings</x-ui.view-all-btn>
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
