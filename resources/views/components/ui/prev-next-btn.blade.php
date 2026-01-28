{{--  These button related to the best seller slider product  --}}
{{-- resources/views/components/slider-button.blade.php --}}
@props(['direction' => 'prev', 'id' => ''])
@php
    $positionClass = $direction === 'prev' ? 'left-0 -ml-2 sm:-ml-3' : 'right-0 -mr-2 sm:-mr-3';

    $svgPath = $direction === 'prev' ? 'M15 19l-7-7 7-7' : 'M9 5l7 7-7 7';
@endphp

<button
    {{ $attributes->merge([
        'id' => $id,
        'class' => "absolute {$positionClass}
                top-1/2 transform -translate-y-1/2 z-10
                w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12
                bg-white rounded-full shadow-md hover:shadow-lg
                flex items-center justify-center
                transition-all duration-300 hover:scale-110",
    ]) }}>
    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $svgPath }}"></path>
    </svg>
</button>
