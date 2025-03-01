<div class="bg-white rounded-lg shadow-lg mb-8 w-full md:w-full xs:w-[300px] ">
    <div class="px-6 py-4 border-b bg-gradient-to-r from-[#FF8FA4] to-[#F542C8]">
        <h2 class="text-xl font-semibold text-white">{{ $title }}</h2>
    </div>
    <div class="overflow-x-auto">
        {{ $slot }} {{-- Bagian ini akan diisi oleh konten yang menggunakan <x-history> --}}
    </div>
</div>
