@auth
    <!-- Sidebar -->

    <div id="sidebar"
        :class="{
            'w-64': !$store.sidebar.collapsed,
            'w-16': $store.sidebar.collapsed,
            'translate-x-0': $store.sidebar.open || $store.sidebar.isDesktop,
            '-translate-x-full': !$store.sidebar.open && !$store.sidebar.isDesktop
        }"
        class="fixed max-w-screen overflow-hidden top-0 left-0 h-screen bg-[#FF8FA4] text-white transition-all duration-300 z-40 shadow-lg">

        <!-- Header Sidebar -->
        <div class="p-4 flex justify-between items-center">
            <h1 class="text-xl font-bold" x-show="!$store.sidebar.collapsed">Fairy Nails</h1>
            <!-- Tombol toggle untuk desktop -->
            <button @click="$store.sidebar.toggleCollapse()"
                class="hidden md:block text-white p-1 rounded hover:bg-[#292352]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </button>
            <!-- Tombol close untuk mobile -->
            <button @click="$store.sidebar.toggle()" class="block md:hidden text-white p-1 rounded hover:bg-[#292352]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Menu Navigasi -->
        {{ $slot }}
    </div>

    <!-- Overlay untuk Mobile -->
    <div x-show="$store.sidebar.open" class="fixed inset-0 bg-black bg-opacity-50 z-30 md:hidden"
        @click="$store.sidebar.toggle()">
    </div>

@endauth
