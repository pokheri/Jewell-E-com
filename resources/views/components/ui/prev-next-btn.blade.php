{{--  These button related to the best seller slider product  --}}

{{-- resources/views/components/slider-button.blade.php --}}
@props(['direction' => 'prev', 'id' => ''])
@php
    $positionClass = $direction === 'prev' ? 'left-0 ml-2 md:ml-0' : 'right-0 mr-2 md:mr-0';

    $icon = $direction === 'prev' ? '‹' : '›';
@endphp

<button
    {{ $attributes->merge([
        'id' => $id,
        'class' => "slider-btn absolute {$positionClass}
            top-1/2 -translate-y-1/2 z-20
            w-[30px] h-[30px] md:w-[34px] md:h-[34px]
            rounded-full bg-white
            border border-gray-300 md:border-2 md:border-gray-200
            hover:border-amber-500 hover:bg-amber-50
            flex items-center justify-center
            text-gray-700 hover:text-amber-600
            shadow-md md:shadow-lg
            transition-all duration-300",
    ]) }}>
    <span class="text-lg md:text-xl font-bold">
        {{ $icon }}
    </span>
</button>
