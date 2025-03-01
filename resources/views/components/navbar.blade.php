{{-- navbar.blade.php --}}
<nav id="navbar"
    class="max-width: 100% box-sizing: border-box fixed top-0 left-0 w-full bg-transparent shadow-md z-50 transition-all duration-300">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="#" class="block">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-[160px] w-[170px]">
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-8 text-[18px]">
                <div x-data="{
                    scrollTo: (targetId) => {
                        const element = document.getElementById(targetId);
                        element.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }" class="space-x-8">
                    <a href="#about" @click.prevent="scrollTo('about')"
                        class="text-[#272635] hover:text-[#FF8FA4] transition-colors duration-200">
                        About
                    </a>
                    <a href="#features" @click.prevent="scrollTo('features')"
                        class="text-[#272635] hover:text-[#FF8FA4] transition-colors duration-200">Features</a>
                    <a href="#gallery" @click.prevent="scrollTo('gallery')"
                        class="text-[#272635] hover:text-[#FF8FA4] transition-colors duration-200">Gallery</a>
                    <a href="#product" @click.prevent="scrollTo('product')"
                        class="text-[#272635] hover:text-[#FF8FA4] transition-colors duration-200">Product</a>
                    <a href="#footer" @click.prevent="scrollTo('footer')"
                        class="text-[#272635] hover:text-[#FF8FA4] transition-colors duration-200">Contact</a>
                </div>
                <a href="{{ route('login') }}"
                    class="inline-flex items-center justify-center px-6 py-2 border border-transparent rounded-lg text-base font-medium text-white bg-[#FF8FA4] hover:bg-[#EF557A] transition-colors duration-300">
                    Login
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="lg:hidden">
                <button type="button" id="menu-toggle"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-[#FF8FA4] hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[#FF8FA4] transition-colors duration-200">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-white shadow-lg">
            <a href="#about"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#FF8FA4] hover:bg-gray-50 transition-colors duration-200">About</a>
            <a href="#features"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#FF8FA4] hover:bg-gray-50 transition-colors duration-200">Features</a>
            <a href="#gallery"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#FF8FA4] hover:bg-gray-50 transition-colors duration-200">Gallery</a>
            <a href="#product"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#FF8FA4] hover:bg-gray-50 transition-colors duration-200">Product</a>
            <a href="#footer"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-[#FF8FA4] hover:bg-gray-50 transition-colors duration-200">Contact</a>
            <div class="px-3 py-3">
                <a href="{{ route('login') }}"
                    class="block text-center px-4 py-2 rounded-lg font-medium text-white bg-[#FF8FA4] hover:bg-[#EF557A] transition-colors duration-300">
                    Login
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    let scrollTimeout;

    window.addEventListener("scroll", function() {
        let navbar = document.getElementById("navbar");

        // Tambahkan efek blur saat scroll
        navbar.classList.add("backdrop-blur-md", "bg-white/50", "shadow-lg");

        // Hapus timeout jika masih ada
        clearTimeout(scrollTimeout);

        // Atur timeout untuk mengembalikan transparansi setelah 3 detik tidak ada scroll
        scrollTimeout = setTimeout(() => {
            navbar.classList.remove("backdrop-blur-md", "shadow-lg");
        }, 3000);
    });
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        let isOpen = false;

        menuToggle.addEventListener('click', function() {
            isOpen = !isOpen;
            mobileMenu.classList.toggle('hidden');

            // Animasi ikon hamburger
            const icon = menuToggle.querySelector('svg');
            if (isOpen) {
                icon.innerHTML = `
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          `;
            } else {
                icon.innerHTML = `
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          `;
            }
        });

        // Menutup menu mobile saat mengklik di luar menu
        document.addEventListener('click', function(event) {
            const isClickInside = menuToggle.contains(event.target) || mobileMenu.contains(event
                .target);

            if (!isClickInside && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                isOpen = false;
                const icon = menuToggle.querySelector('svg');
                icon.innerHTML = `
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          `;
            }
        });
    });
</script>
