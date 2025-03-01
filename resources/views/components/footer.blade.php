<footer id="footer" class="bg-[#FBCACC] w-full py-8 md:py-12 mt-12">
    <div class="container mx-auto px-4 md:px-6 lg:px-8 max-w-[1400px]">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
            <!-- Fairy Nails Section -->
            <div class="space-y-4  text-center">
                <x-heading title="Fairy Nails" class="text-center md:text-left" />
                <p class="text-sm md:text-base leading-relaxed">
                    Fairy Nails is the perfect destination for those who want to flaunt beautiful and stylish nails! We
                    offer the latest nail art services, from trendy gel polish colors to unique accessories that
                    make your nails stand out.
                </p>
            </div>

            <!-- Address Section -->
            <div class="space-y-4 ">
                <x-heading title="Address" class="text-center md:text-left" />
                <div class="space-y-2 ">
                    <p class="text-sm md:text-base text-center">
                        Jl Suplier 5 no 3 rt 11 Rw 5 Kelurahan rancaekek kencana kecamatan rancaekek kab bandung
                    </p>

                    <!-- Contact Info -->
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 m-auto justify-center">
                            <img data-src="{{ asset('assets/icon/Phone.png') }}" class="lazyload w-5 h-5 object-contain"
                                alt="phone icon">
                            <span class="text-sm md:text-base">
                                <a
                                    href="https://api.whatsapp.com/send/?phone=62895404204495&text&type=phone_number&app_absent=0">
                                    +62 895 4042 04495
                                </a>
                            </span>
                        </div>

                        <div class="flex items-center gap-2 justify-center">
                            <img data-src="{{ asset('assets/icon/Email.png') }}" class="lazyload w-5 h-5 object-contain"
                                alt="email icon">
                            <span class="text-sm md:text-base">email@fairynails.com</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media Section -->
            <div class="space-y-4">
                <x-heading title="Follow" class="text-center md:text-left" />
                <div class="space-y-5  flex flex-col justify-center">
                    <div class="flex items-center gap-1 m-auto">
                        <img data-src="{{ asset('assets/icon/Instagram.png') }}" class="lazyload w-5 h-5 object-contain"
                            alt="instagram icon">
                        <a href="https://www.instagram.com/fairynailsid/profilecard/?igsh=NGhyOHV5bjA2d2ps"
                            class="text-sm md:text-base hover:underline">@fairynailsid</a>
                    </div>

                    <div class="flex items-center gap-2 m-auto">
                        <img data-src="{{ asset('assets/icon/Tiktok.png') }}" class="lazyload w-5 h-5 object-contain"
                            alt="tiktok icon">
                        <a href="https://www.tiktok.com/@fairynailsid?_t=ZS-8smGZZjPnzW&_r=1"
                            class="text-sm md:text-base hover:underline">@fairynailsid</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="mt-8 pt-6 border-t border-pink-300 text-center text-sm">
            <p>&copy; {!! date('Y') !!} Fairy Nails. All rights reserved.</p>
        </div>
    </div>
</footer>
