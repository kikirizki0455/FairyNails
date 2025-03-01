<section id="about" class="w-full py-16 ">
    <div class="container mx-auto px-6 lg:px-20 mt-[100px]">
        <x-heading title="About Us" />
        <div class="mt-8 grid md:grid-cols-1 lg:grid-cols-2 gap-8 items-center">

            <!-- Bagian Gambar -->
            <div x-data="{
                imageLoaded: [false, false],
                updatedLoadStatus(index) {
                    this.imagesLoaded[index] = true;
                }
            }"
                class="flex gap-[10px] items-stretch max-h-lg flex-nowrap p-4 justify-center content-between">

                <!-- Gambar Pertama -->
                <div class="mb-10 relative">
                    <!-- Skeleton Loader -->
                    <div x-show ="!imagesLoaded[0]" class="absolute inset-0 skeleton rounded-md">
                        <div
                            class="w-full h-full rounded-md bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200 animate-shimmer">
                        </div>
                    </div>
                    <!-- Gambar LazyLoad -->
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                        data-src="{{ url('assets/images/img2.webp') }}" alt="about1"
                        class="lazyload h-full rounded-md max-h-[360px] w-[260px] sm:w-[260px] sm:h-[360px] md:max-w-[260px] md:h-[360px] lg:w-[260px] lg:h-[370px] object-cover duration-500">
                </div>

                <!-- Gambar Kedua -->
                <div class="mt-10 relative">
                    <!-- Skeleton Loader -->
                    <!-- Skeleton Loader -->
                    <div x-show ="!imageLoaded[0]" class="absolute inset-0 skeleton rounded-md">
                        <div
                            class="w-full h-full rounded-md bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200 animate-shimmer">
                        </div>
                    </div>
                    <!-- Gambar LazyLoad -->
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                        data-src="{{ url('assets/images/img3.webp') }}" alt="about1"
                        class="lazyload h-full rounded-md max-h-[360px] w-[260px] sm:w-[260px] sm:h-[360px] md:max-w-[260px] md:h-[360px] lg:w-[260px] lg:h-[370px] object-cover duration-500">
                </div>
            </div>

            <!-- Bagian Teks -->
            <div class="w-full sm:ml-0 md:ml-10 lg:text-center  text-center">
                <h1 class="text-xl md:text-2xl font-bold text-[#292352] mb-4">GET A PERFECT NAILS</h1>
                <p class="text-[#272635] text-xs sm:text-base md:text-sm lg:text-lg leading-relaxed">
                    Fairy Nails is the perfect destination for those who want to flaunt beautiful and stylish nails!
                    We offer the latest nail art services, from trendy gel polish colors to unique accessories
                    that make your nails stand out. Get everything you need for stunning and creative nail designs,
                    only at Fairy Nails!
                </p>
            </div>
        </div>
    </div>
</section>
