<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden ">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Fairy Nails')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Definisikan state global Alpine -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('sidebar', {
                open: false,
                collapsed: false,
                isDesktop: window.innerWidth >= 768,

                init() {
                    window.addEventListener('resize', () => {
                        this.isDesktop = window.innerWidth >= 768;
                    });
                },

                toggle() {
                    this.open = !this.open;
                    document.body.classList.toggle('overflow-hidden', this
                        .open); // Cegah geseran saat sidebar terbuka
                },

                toggleCollapse() {
                    this.collapsed = !this.collapsed;
                }
            });
        });
    </script>


    @stack('styles')
</head>

<body class="overflow-x-hidden " x-data x-init="$store.sidebar.init()">

    <div class="flex h-screen">
        <!-- Sidebar Component -->
        <x-sidebar>
            @include('admin.sidebar')
        </x-sidebar>

        <!-- Main Content -->
        <main class="flex-1 transition-all duration-300"
            :class="{
                'ml-0 md:ml-64': !$store.sidebar.collapsed && $store.sidebar.isDesktop,
                'ml-0 md:ml-16': $store.sidebar.collapsed && $store.sidebar.isDesktop
            }">
            <!-- Header Component -->
            <x-header />

            <!-- Content -->
            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>

</html>
