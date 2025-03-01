<div x-data="{
    activeSlide: 1,
    totalSlides: 7,
    slides: [
        '{{ asset('assets/testimoni/test1.jpg') }}',
        '{{ asset('assets/testimoni/test2.jpg') }}',
        '{{ asset('assets/testimoni/test3.jpg') }}',
        '{{ asset('assets/testimoni/test4.jpg') }}',
        '{{ asset('assets/testimoni/test5.jpg') }}',
        '{{ asset('assets/testimoni/test6.png') }}',
        '{{ asset('assets/testimoni/test7.png') }}'
    ]
}" class="relative w-full max-w-5xl mx-auto overflow-hidden">

    <!-- Modal Container -->
    <div class="relative w-full aspect-[4/3] md:aspect-[16/9]">
        <!-- Slides Container -->
        <div x-data="{ imageLoaded: [] }" x-init="imageLoaded = Array(totalSlides).fill(false)"
            class="absolute inset-0 flex transition-transform duration-500"
            :style="'transform: translateX(-' + ((activeSlide - 1) * 100) + '%)'">

            <!-- Loop untuk slide -->
            <template x-for="(image, index) in slides" :key="index">
                <div class="w-full flex-shrink-0 relative">
                    <!-- Skeleton Loader -->
                    <div x-show="!imageLoaded[index]" class="absolute inset-0 bg-gray-300 animate-pulse"></div>

                    <!-- Lazyload Image -->
                    <img :src="'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=='"
                        :data-src="image" alt="Testimonial Slide"
                        class="lazyload w-full h-full object-contain transition-opacity duration-300"
                        @load="imageLoaded[index] = true">
                </div>
            </template>
        </div>

        <!-- Prev & Next Buttons -->
        <button @click="activeSlide = activeSlide > 1 ? activeSlide - 1 : totalSlides"
            class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white p-2 rounded-full shadow-md transition-colors z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button @click="activeSlide = activeSlide < totalSlides ? activeSlide + 1 : 1"
            class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white p-2 rounded-full shadow-md transition-colors z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <!-- Indicators -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-3 z-10">
            <template x-for="n in totalSlides">
                <button @click="activeSlide = n" class="w-3 h-3 rounded-full transition-all duration-300"
                    :class="activeSlide === n ? 'bg-white scale-125' : 'bg-white/50 hover:bg-white/70'"></button>
            </template>
        </div>
    </div>
</div>
