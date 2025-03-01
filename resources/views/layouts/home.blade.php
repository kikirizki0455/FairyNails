<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Fairy Nails')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Preload critical assets --}}
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" as="script">

    {{-- CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- Stack untuk CSS tambahan --}}
    @stack('styles')
</head>

<body class="overflow-x-hidden">
    {{-- Header --}}
    <header>
        <x-carrousel />
        <x-navbar />
    </header>

    {{-- Main Content --}}
    <main class="w-full overflow-x-hidden">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        <x-footer />
    </footer>

    {{-- Core Scripts --}}
    <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>

    {{-- Stack untuk JavaScript tambahan --}}
    @stack('scripts')

    {{-- Lazy Loading Script --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const images = document.querySelectorAll(".lazyload");
            images.forEach(img => {
                img.addEventListener("load", function() {
                    this.previousElementSibling?.classList.add("hidden");
                });
            });
        });
    </script>
</body>

</html>
