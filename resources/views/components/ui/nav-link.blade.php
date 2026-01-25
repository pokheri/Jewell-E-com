@props(['href' => '#'])

<a href="{{ $href }}" class="text-gray-700 hover:text-amber-600 font-medium transition-smooth relative group">
    {{ $slot }}
    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-amber-600 group-hover:w-full transition-all duration-300"></span>
</a>
