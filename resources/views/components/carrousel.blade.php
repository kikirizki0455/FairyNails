<div x-data="{ activeSlide: 1, imageLoaded: false }" class="relative w-full h-screen overflow-hidden">

    {{-- skeleton loading --}}

    <div x-show="!imageLoaded" class="absolute inset-0 bg-gray-200 animate-plus">
        <div class="h-full w-full bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200 animate-shimmer">
        </div>
    </div>

    {{-- background dengan lazy loading --}}

    <div class="absolute inset-0">
        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
            data-src="{{ asset('assets/images/carrousel.jpg') }}"
            class="lazyload w-full h-full object-cover transition-opacity duration-300" x-on:load="imageLoaded = true"
            style="opacity: 0" x-bind:style="imageLoaded ? 'opacity: 1' : 'opacity: 0'" alt="Hero Background">
    </div>

    {{-- overlay dan konten --}}
    <div class="absolute inset-0 flex flex-col items-center justify-center text-white bg-black/30"
        x-bind:class="{ 'opacity-0': !imageLoaded, 'opacity-100': imageLoaded }"
        class="trasiition-opacity duration-500">
        <div class="w-full sm:w-3/4 lg:w-1/2 flex flex-col justify-start text-center sm:text-left">
            {{-- skeleton teks --}}
            <template x-if="!imageLoaded">
                <div class="space-y-4">
                    <div class="h-12 sm:h-16 lg:h-20 bg-gray-200 rounded animate-pulse"></div>
                    <div class="h-12 sm:h-16 lg:h-20 bg-gray-200 rounded animate-pulse w-2/3"></div>
                </div>
            </template>

            <!-- Teks di Tengah -->
            <div class=" absolute inset-0 flex flex-col items-center justify-center text-white bg-black/10 px-6 ">
                <div x-show="imageLoaded" x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 transform translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0" class="h-full max-h-[250px]">
                    <h1 class="text-3xl sm:text-5xl lg:text-7xl font-semibold drop-shadow-lg  text-center">
                        Out Standing Beauty <br> For Your Nails
                    </h1>
                </div>
                <a href="{{ route('register') }}"
                    class=" py-2 px-6 bg-[#FF8FA4] hover:bg-[#EF557A] text-white rounded-lg transition-all text-lg sm:w-[150px] w-1/3 sm:text-2xl text-center">
                    Register
                </a>
            </div>
        </div>

    </div>
</div>
