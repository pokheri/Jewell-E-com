 <div
     class="bg-white rounded-lg sm:rounded-xl shadow-sm overflow-hidden group hover:shadow-md transition-all duration-300 border border-gray-100 h-full flex flex-col">
     {{-- Product Image --}}
     <div class="relative overflow-hidden flex-shrink-0">
         <img src="https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=600&h=600&fit=crop&crop=center"
             alt="Solitaire Diamond Engagement Ring"
             class="w-full h-40 sm:h-48 md:h-48 lg:h-56 object-cover group-hover:scale-105 transition-transform duration-500">

         {{-- Top Elements --}}
         <div class="absolute top-0 left-0 right-0 flex justify-between items-start p-2 sm:p-3">
             {{-- Optional Badge - You can add "NEW", "SALE", etc. here --}}
             <x-ui.product-banner class="bg-green-600">New</x-ui.product-banner>

             {{-- Wishlist Button --}}
             <x-icon.product-wish-icon />
         </div>
     </div>

     {{-- Product Details --}}
     {{-- contain product detail information for all product, including slider and normal product card  --}}

     <div class="p-2 sm:p-3 flex flex-col flex-grow">
         {{-- Category --}}
         <div class="text-[10px] sm:text-xs md:text-sm text-amber-600 font-medium mb-1">
             Diamond Rings
         </div>

         {{-- Title --}}
         <h3
             class="text-[11px] sm:text-xs md:text-sm font-semibold text-gray-900 mb-1.5 sm:mb-2 line-clamp-2 leading-tight hover:text-amber-700 transition-colors">
             Solitaire Diamond Engagement Ring
         </h3>

         {{-- Rating --}}
         <div class="flex items-center gap-0.5 sm:gap-1 mb-2 sm:mb-3">
             <div class="flex">
                 @for ($j = 0; $j < 5; $j++)
                     <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" alt="Star"
                         class="w-2.5 h-2.5 sm:w-3 sm:h-3 md:w-3 md:h-3">
                 @endfor
             </div>
             <span class="text-[10px] sm:text-xs md:text-sm text-gray-500 ml-0.5 sm:ml-1">
                 (42)
             </span>
         </div>

         {{-- Price and Add to Cart --}}

         <div class="flex items-center justify-between mt-auto pt-2 sm:pt-3 border-t border-gray-100">
             {{-- Price --}}
             <div class="text-left min-w-0 flex-1">
                 <div class="text-xs sm:text-sm md:text-base font-bold text-gray-900 truncate small-phone:text-[10px]">
                     ₹25,999
                 </div>
                 <div class="text-xs text-gray-500 line-through truncate small-phone:text-[9px]">
                     ₹31,999
                 </div>
             </div>

             {{-- Add to Cart Button --}}
             <x-ui.add-to-cart-btn />
         </div>
     </div>

 </div>
