@extends('layouts.user')

@section('title', 'Dashboard | Fairy Nails')

@section('content')
    <div class="container mx-auto px-4 sm:px-8 py-8 max-w-screen-xl">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-[#FF8FA4] mb-4 md:mb-0">
                <span class="bg-[#FF8FA4] text-white p-2 rounded-lg shadow-md">Dashboard Saya</span>
            </h1>
            <div class="text-sm text-gray-500">
                <span class="font-medium">Tanggal:</span> {{ now()->format('d M Y ') }}
            </div>
        </div>
        {{-- user Info card --}}
        @include('user/partials/user-info')
    </div>

    <!-- Statistik Utama -->
    @include('user/partials/statistic-info')

    <div class="grid grid-cols-1 lg:grid-cols-1 gap-8 mb-8">
        <!-- Informasi Poin & Level -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-2xl">
            <!-- Header dengan Gradient -->
            <div class="px-6 py-4 border-b bg-gradient-to-r from-[#FF8FA4] to-[#F542C8] relative">
                <h2 class="text-xl font-semibold text-white">Informasi Poin & Level</h2>
                <!-- Ikon Dekoratif -->
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Info Icon"
                    class="w-8 h-8 absolute top-3 right-4 opacity-50">
            </div>

            <!-- Konten -->
            <div class="p-6">
                <!-- Bagian Cara Mendapatkan Poin & XP -->
                <div class="mb-8 bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135679.png" alt="Points Icon"
                            class="w-6 h-6 mr-2">
                        Cara Mendapatkan Poin & XP
                    </h3>
                    <ul class="space-y-2 pl-5 list-disc text-gray-700">
                        <li class="hover:text-[#F542C8] transition-colors">Setiap transaksi Rp 10.000 = 1 poin</li>
                        <li class="hover:text-[#F542C8] transition-colors">Setiap transaksi Rp 10.000 = 100 XP</li>
                    </ul>
                </div>

                <!-- Bagian Level Member & Benefit -->
                <div class="mb-8 bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135679.png" alt="Level Icon"
                            class="w-6 h-6 mr-2">
                        Level Member & Benefit
                    </h3>
                    @include('user.partials.benefit-info')
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135679.png" alt="Product Icon"
                            class="w-6 h-6 mr-2">
                        Produk yang Tersedia untuk Redeem
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @include('user.partials.product-info')
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <!-- Transaksi Terbaru -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden lg:col-span-2">
            <div class="px-6 py-4 border-b bg-gradient-to-r from-[#FF8FA4] to-[#F542C8]">
                <h2 class="text-xl font-semibold text-white">Transaksi Terbaru</h2>
            </div>
            <div class="overflow-x-auto">
                @include('user.partials.transactions')
            </div>
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                <a href="{{ route('user.transactions') }}"
                    class="text-[#FF8FA4] hover:underline text-sm flex items-center justify-end">
                    Lihat Semua Transaksi
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Informasi Penukaran Poin -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b bg-gradient-to-r from-[#FF8FA4] to-[#F542C8]">
                <h2 class="text-xl font-semibold text-white">Penukaran Poin</h2>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <p class="text-sm text-gray-500 mb-2">Poin Anda</p>
                    <p class="text-3xl font-bold text-orange-500">{{ auth()->user()->points ?? 0 }}</p>
                </div>
                @include('user.partials.redeem-voucher')

            </div>
        </div>
    </div>

    <!-- Syarat & Ketentuan -->
    <div
        class="bg-white rounded-lg shadow-lg overflow-hidden mb-8 transform transition-all hover:scale-105 hover:shadow-2xl">
        <!-- Header dengan Gradient -->
        <div class="px-6 py-4 border-b bg-gradient-to-r from-[#FF8FA4] to-[#F542C8] relative">
            <h2 class="text-xl font-semibold text-white">Syarat & Ketentuan</h2>
            <!-- Gambar Dekoratif -->
            <img src="https://cdn-icons-png.flaticon.com/512/3767/3767084.png" alt="Terms Icon"
                class="w-12 h-12 absolute top-2 right-4 opacity-50">
        </div>

        <!-- Konten -->
        @include('user.partials.terms')
    </div>
    </div>
@endsection
