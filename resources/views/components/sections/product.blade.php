<div id="product" class="section-product mt-[100px] px-4 md:px-6 lg:px-8">
    <div class ="title">
        <x-heading title="product"></x-heading>

        <div class="content mt-6 md:mt-10">
            <!-- Card Container -->
            <div class="card grid justify-items-center grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-8">
                <!-- Nail Art Card -->
                <x-card icon="" title="Nail Art"
                    description="Express your unique style with our creative and trendy nail art! From delicate designs to bold statements, we bring the latest trends tomake your nails stand out."
                    image='assets/product/product1.webp' class="w-full transition-transform hover:scale-105">
                </x-card>

                <!-- Nail Extension Card -->
                <x-card icon="" title="Nail Extension"
                    description="Achieve the perfect length and shape with our high-quality nail extensions. Designed for durability and elegance, they enhance your natural beauty effortlessly."
                    image='assets/product/product2.webp' class="w-full transition-transform hover:scale-105">
                </x-card>

                <!-- Press-On Nails Card -->
                <x-card icon="" title="Press-On Nails"
                    description="Get salon-quality nails in minutes with our stylish press-on nails! Easy to apply, reusable, and available in various designs to match your mood and occasion."
                    image='assets/product/product3.webp' class="w-full transition-transform hover:scale-105">
                </x-card>
            </div>

            <!-- Button Container -->
            <div class="flex justify-center">
                <x-button href="https://drive.google.com/file/d/16iuYzjm0OCeBatZ9gq801BOkQInhU2kV/view"
                    title="Check Price" class="w-full md:w-auto " />
            </div>
        </div>
    </div>
</div>
