{{-- About Us Banner Section --}}
<section class="py-8 sm:py-10 md:py-14 bg-white">
    <div class="container mx-auto px-3 sm:px-4">
        {{-- Section Header --}}
        <div class="text-center mb-8 sm:mb-10 md:mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl luxury-font text-gray-900 mb-3">About Our Jewelry</h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base">Where timeless elegance meets modern
                craftsmanship</p>
        </div>

        {{-- Banner Image --}}
        <div class="relative rounded-xl sm:rounded-2xl overflow-hidden shadow-2xl">
            {{-- Tall, elegant jewelry image --}}
            <img src="{{ asset('images/banners/banner1.webp') }}" alt="Luxury rings and jewelry display"
                class="w-full h-80 sm:h-[500px] md:h-[600px] lg:h-[700px] object-cover" loading="lazy">

            {{-- Gold decorative border effect --}}
            <div class="absolute inset-0 border-2 border-amber-400/20 rounded-xl sm:rounded-2xl pointer-events-none">
            </div>

            {{-- Shine effect overlay --}}
            <div class="absolute inset-0 bg-gradient-to-br from-transparent via-white/5 to-transparent"></div>
        </div>
    </div>
</section>
