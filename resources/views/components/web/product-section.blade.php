{{-- -comment this will contain the overal strcutre of our product's section in home, for rings , bracelets and extr --}}

@props([
    'title' => '',
    'subtitle' => '',
    'product' => null,
    'buttonText' => '',
    'bgColor' => '',
])

<x-ui.home-content-layout-container bgColor="{{ $bgColor }}">

    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="subtitle">{{ $subtitle }}</x-slot>

    {{-- Product Grid --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 md:gap-6">
        @for ($i = 0; $i < 8; $i++)
            <x-ui.product-card />
        @endfor
    </div>

    {{-- View All Button --}}
    <x-ui.view-all-btn>{{ $buttonText }}</x-ui.view-all-btn>
</x-ui.home-content-layout-container>
