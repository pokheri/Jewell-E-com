<x-ui.home-content-layout-container>
    <x-slot name="title">Shop By Category </x-slot>
    <x-slot name="subtitle">Discover our exquisite collection of handcrafted jewelry</x-slot>


    {{-- Categories Grid - 3 items from 360px to 768px --}}
    <div class="grid grid-cols-2 min-[360px]:grid-cols-3 md:grid-cols-4 gap-4 sm:gap-5 md:gap-6 px-4 sm:px-6 lg:px-12">

        {{-- Category Cards --}}

        @php
            $imageUrls = [
                'Earrings' => 'https://images.unsplash.com/photo-1573408301185-9146fe634ad0?w=600&h=600&fit=crop&q=80',
                'Necklaces' => 'https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?w=600&h=600&fit=crop&q=80',
                'Rings' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=600&h=600&fit=crop&q=80',
                'Bracelets' => 'https://images.unsplash.com/photo-1588449668365-d15e397f6787?w=600&h=600&fit=crop&q=80',
                'Watches' => 'https://images.unsplash.com/photo-1523170335258-f5ed11844a49?w=600&h=600&fit=crop&q=80',
                'Chain' => 'https://images.unsplash.com/photo-1573408301185-9146fe634ad0?w=600&h=600&fit=crop&q=80',
                'Pandants' => 'https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?w=600&h=600&fit=crop&q=80',
                'Jewer' => 'https://images.unsplash.com/photo-1573408301185-9146fe634ad0?w=600&h=600&fit=crop&q=80',
            ];
        @endphp

        @foreach ($imageUrls as $key => $value)
            <x-ui.category-product-card href="#" imageUrl="{{ $value }}"
                alternative="{{ $key }}">{{ $key }}
            </x-ui.category-product-card>
        @endforeach
    </div>
    {{-- View All Button --}}
    <x-ui.view-all-btn>View All Categories</x-ui.view-all-btn>

</x-ui.home-content-layout-container>
