@props(['bgColor' => 'white'])

{{--  this layout contain the base layout for different home pages , like category, prduct section  --}}

{{-- Rings Product Section --}}
<section class="py-8 sm:py-10 md:py-14 bg-{{ $bgColor }}">
    <div class="container mx-auto px-3 sm:px-4">
        {{-- Section Header --}}
        <div class="text-center mb-8 sm:mb-10 md:mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl luxury-font text-gray-900 mb-3">{{ $title }}</h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base">{{ $subtitle }}</p>
        </div>
        {{-- content --}}
        {{ $slot }}
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
    </style>
@endpush
