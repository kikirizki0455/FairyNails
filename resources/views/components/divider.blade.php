<div class="relative w-full h-[300px] md:h-[400px] lg:h-[500px] overflow-hidden border-4 border-white rounded-lg">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat bg-fixed"
        style="background-image: url({{ $image }});">

        <div class="absolute inset-0 bg-black bg-opacity-50 bg-cover"></div>
    </div>
    <h1 class="absolute inset-0 flex items-center justify-center text-white text-2xl md:text-4xl lg:text-5xl font-bold">
        {{ $title }}
    </h1>
</div>
