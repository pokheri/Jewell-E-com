@props(['href' => '#', 'imageUrl' => '#', 'alternative' => '#'])
{{-- Contain Category product card, card we are showing on Category section --}}
<a href="{{ $href }}" class="group block transition-smooth hover:transform hover:scale-[1.02]">
    <div class="relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
        <div class="aspect-square w-full overflow-hidden bg-gray-100">
            <img src="{{ $imageUrl }}" alt="{{ $alternative }}"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
        </div>
        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent py-2 sm:py-3 px-2">
            <h3 class="text-white text-center font-medium text-xs sm:text-sm md:text-base lg:text-lg">
                {{ $slot }}</h3>
        </div>
    </div>
</a>
