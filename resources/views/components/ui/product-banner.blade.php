{{-- product card banner, new , best seller  --}}

@props(['class' => '', 'bestSeller' => false])
@php
    $commonClasses = 'text-white  font-bold px-1.5 py-0.5 rounded shadow';
    if ($bestSeller) {
        $commonClasses .= ' text-[8px]';
    } else {
        $commonClasses .= ' text-[9px]';
    }

    $properties = $attributes->merge([
        'class' => $commonClasses . ' ' . $class,
    ]);
@endphp
<div {{ $properties }}>
    {{ $slot }}
</div>
