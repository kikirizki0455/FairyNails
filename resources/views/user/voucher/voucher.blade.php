@extends('layouts.user')

@section('content')
    <div class="container py-4">
        <h1 class="text-2xl font-bold mb-6">Voucher Saya</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Tab Navigasi -->
            <div class="lg:col-span-3 mb-4">
                <div class="flex border-b">
                    <button
                        class="px-4 py-2 font-semibold {{ $activeTab == 'available' ? 'text-pink-500 border-b-2 border-pink-500' : 'text-gray-500' }}"
                        onclick="window.location='{{ route('user.vouchers', ['tab' => 'available']) }}'">
                        Voucher Tersedia
                    </button>
                    <button
                        class="px-4 py-2 font-semibold {{ $activeTab == 'my-vouchers' ? 'text-pink-500 border-b-2 border-pink-500' : 'text-gray-500' }}"
                        onclick="window.location='{{ route('user.vouchers', ['tab' => 'my-vouchers']) }}'">
                        Voucher Saya
                    </button>
                    <button
                        class="px-4 py-2 font-semibold {{ $activeTab == 'used' ? 'text-pink-500 border-b-2 border-pink-500' : 'text-gray-500' }}"
                        onclick="window.location='{{ route('user.vouchers', ['tab' => 'used']) }}'">
                        Voucher Terpakai
                    </button>
                </div>
            </div>

            @if ($activeTab == 'available')
                @foreach ($availableVouchers as $voucher)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <div class="bg-gradient-to-r from-pink-500 to-purple-500 p-4 text-white">
                            <h3 class="font-bold text-lg">{{ $voucher->name }}</h3>
                            <div class="text-2xl font-bold mt-2">
                                {{ $voucher->discount_type == 'percentage' ? $voucher->discount_value . '%' : 'Rp ' . number_format($voucher->discount_value, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="p-4">
                            <p class="text-gray-600 text-sm mb-3">{{ $voucher->description }}</p>
                            <div class="flex justify-between items-center text-xs text-gray-500 mb-4">
                                <span>Kode: {{ $voucher->code }}</span>
                                <span>Berlaku hingga: {{ date('d/m/Y', strtotime($voucher->valid_until)) }}</span>
                            </div>
                            <form action="{{ route('user.claim-voucher') }}" method="POST">
                                @csrf
                                <input type="hidden" name="voucher_id" value="{{ $voucher->id }}">
                                <button type="submit"
                                    class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2 rounded-lg text-sm font-semibold">
                                    Klaim Voucher
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach

                @if (count($availableVouchers) == 0)
                    <div class="lg:col-span-3 bg-white rounded-lg shadow-sm p-8 text-center">
                        <h2 class="text-xl font-semibold mb-2">Tidak Ada Voucher Tersedia</h2>
                        <p class="text-gray-500">Nantikan promo menarik dari kami</p>
                    </div>
                @endif
            @endif

            @if ($activeTab == 'my-vouchers')
                @foreach ($myVouchers as $voucher)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <div class="bg-gradient-to-r from-pink-500 to-purple-500 p-4 text-white">
                            <h3 class="font-bold text-lg">{{ $voucher->name }}</h3>
                            <div class="text-2xl font-bold mt-2">
                                {{ $voucher->discount_type == 'percentage' ? $voucher->discount_value . '%' : 'Rp ' . number_format($voucher->discount_value, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="p-4">
                            <p class="text-gray-600 text-sm mb-3">{{ $voucher->description }}</p>
                            <div class="flex justify-between items-center text-xs text-gray-500 mb-4">
                                <span>Kode: {{ $voucher->code }}</span>
                                <span>Berlaku hingga: {{ date('d/m/Y', strtotime($voucher->valid_until)) }}</span>
                            </div>
                            <a href="{{ route('user.products') }}"
                                class="block w-full bg-pink-500 hover:bg-pink-600 text-white py-2 rounded-lg text-sm font-semibold text-center">
                                Gunakan Sekarang
                            </a>
                        </div>
                    </div>
                @endforeach

                @if (count($myVouchers) == 0)
                    <div class="lg:col-span-3 bg-white rounded-lg shadow-sm p-8 text-center">
                        <h2 class="text-xl font-semibold mb-2">Anda Belum Memiliki Voucher</h2>
                        <p class="text-gray-500 mb-6">Silakan klaim voucher yang tersedia untuk mendapatkan diskon belanja
                        </p>
                        <a href="{{ route('user.vouchers', ['tab' => 'available']) }}"
                            class="inline-block bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-lg">
                            Lihat Voucher Tersedia
                        </a>
                    </div>
                @endif
            @endif

            @if ($activeTab == 'used')
                @foreach ($usedVouchers as $voucher)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden opacity-70">
                        <div class="bg-gradient-to-r from-gray-400 to-gray-500 p-4 text-white relative">
                            <h3 class="font-bold text-lg">{{ $voucher->name }}</h3>
                            <div class="text-2xl font-bold mt-2">
                                {{ $voucher->discount_type == 'percentage' ? $voucher->discount_value . '%' : 'Rp ' . number_format($voucher->discount_value, 0, ',', '.') }}
                            </div>
                            <div
                                class="absolute top-0 right-0 bg-red-500 text-white px-3 py-1 rounded-bl font-medium text-xs">
                                Terpakai
                            </div>
                        </div>
                        <div class="p-4">
                            <p class="text-gray-600 text-sm mb-3">{{ $voucher->description }}</p>
                            <div class="flex justify-between items-center text-xs text-gray-500 mb-4">
                                <span>Kode: {{ $voucher->code }}</span>
                                <span>Digunakan pada: {{ date('d/m/Y', strtotime($voucher->used_at)) }}</span>
                            </div>
                            <div class="w-full bg-gray-300 text-gray-500 py-2 rounded-lg text-sm font-semibold text-center">
                                Voucher Sudah Digunakan
                            </div>
                        </div>
                    </div>
                @endforeach

                @if (count($usedVouchers) == 0)
                    <div class="lg:col-span-3 bg-white rounded-lg shadow-sm p-8 text-center">
                        <h2 class="text-xl font-semibold mb-2">Tidak Ada Voucher Terpakai</h2>
                        <p class="text-gray-500">Voucher yang telah digunakan akan muncul di sini</p>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection
