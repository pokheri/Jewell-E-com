{{-- Hero Slider Component --}}
<section class="py-6 md:py-8">
    <div class="container mx-auto px-4 lg:px-6">
        <div class="relative overflow-hidden rounded-2xl shadow-xl">

            {{-- Slider --}}
            <div id="hero-slider" class="flex will-change-transform transition-transform duration-700 ease-in-out">

                {{-- Slide 1 --}}
                <div class="w-full flex-shrink-0 h-[300px] sm:h-[350px] md:h-[400px] lg:h-[500px] xl:h-[550px] relative">
                    <div class="absolute inset-0 overflow-hidden">
                        <img src="{{ asset('images/banners/banner1.webp') }}"
                            class="w-full h-full object-fill min-w-full min-h-full" alt="Gold Jewelry">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40"></div>
                </div>

                {{-- Slide 2 --}}
                <div
                    class="w-full flex-shrink-0 h-[300px] sm:h-[350px] md:h-[400px] lg:h-[500px] xl:h-[550px] relative">
                    <div class="absolute inset-0 overflow-hidden">
                        <img src="{{ asset('images/banners/banner2.webp') }}"
                            class="w-full h-full object-fill min-w-full min-h-full" alt="Diamond Jewelry">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40"></div>
                </div>

                {{-- Slide 3 --}}
                <div
                    class="w-full flex-shrink-0 h-[300px] sm:h-[350px] md:h-[400px] lg:h-[500px] xl:h-[550px] relative">
                    <div class="absolute inset-0 overflow-hidden">
                        <img src="{{ asset('images/banners/lower.png') }}"
                            class="w-full h-full object-fill min-w-full min-h-full" alt="Bridal Jewelry">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40"></div>
                </div>

            </div>

            {{-- Dots --}}
            <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-2 z-20">
                <button class="dot w-2.5 h-2.5 rounded-full bg-white/50" data-i="0"></button>
                <button class="dot w-2.5 h-2.5 rounded-full bg-white/50" data-i="1"></button>
                <button class="dot w-2.5 h-2.5 rounded-full bg-white/50" data-i="2"></button>
            </div>

            {{-- Arrows --}}
            <button
                class="prev absolute left-4 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white w-10 h-10 rounded-full flex items-center justify-center z-20">
                ‹
            </button>

            <button
                class="next absolute right-4 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white w-10 h-10 rounded-full flex items-center justify-center z-20">
                ›
            </button>

        </div>
    </div>
</section>

{{-- MINIMAL NECESSARY CSS --}}
@push('styles')
    <style>
        #hero-slider {
            width: 300%;
            /* 3 slides × 100% */
        }
    </style>
@endpush

{{-- SCRIPT: SILENT CIRCULAR SLIDER --}}
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slider = document.getElementById('hero-slider');
            const dots = document.querySelectorAll('.dot');
            const prev = document.querySelector('.prev');
            const next = document.querySelector('.next');

            const total = dots.length;
            let index = 0;
            const SLIDE_DELAY = 5000; // 5 seconds
            let slideTimer = null;

            // --- Update slider & dots ---
            function update() {
                slider.style.transform = `translateX(-${index * 100}%)`;
                dots.forEach((d, i) => {
                    d.classList.toggle('bg-white', i === index);
                    d.classList.toggle('bg-white/50', i !== index);
                });
            }

            // --- Silent jump for circular effect ---
            function silentJump(toIndex) {
                slider.style.transition = 'none'; // temporarily disable animation
                slider.style.transform = `translateX(-${toIndex * 100}%)`;
                void slider.offsetWidth; // force reflow
                slider.style.transition = 'transform 0.7s ease'; // restore transition
            }

            // --- Go to next/prev slide ---
            function go(toIndex) {
                if (toIndex >= total) {
                    index = 0;
                    silentJump(index); // jump silently to first slide
                } else if (toIndex < 0) {
                    index = total - 1;
                    silentJump(index); // jump silently to last slide
                } else {
                    index = toIndex;
                }
                update();
                resetSlideTimer();
            }

            // --- Timer ---
            function startSlideTimer() {
                stopSlideTimer();
                slideTimer = setTimeout(() => go(index + 1), SLIDE_DELAY);
            }

            function stopSlideTimer() {
                if (slideTimer) clearTimeout(slideTimer);
            }

            function resetSlideTimer() {
                stopSlideTimer();
                startSlideTimer();
            }

            // --- Event listeners ---
            next.onclick = () => go(index + 1);
            prev.onclick = () => go(index - 1);
            dots.forEach(dot => dot.onclick = () => go(+dot.dataset.i));

            // --- Initialize ---
            update();
            startSlideTimer();
        });
    </script>
@endpush
