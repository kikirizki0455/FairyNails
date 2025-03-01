@extends('layouts.user')

@section('title', 'Redemption | Fairy Nails')

@section('content')
    <div class="container mx-auto px-4 sm:px-8 py-8 max-w-screen-xl">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
            <h1 class="text-2xl sm:text-3xl font-bold text-[#FF8FA4]">
                <span class="bg-[#FF8FA4] text-white p-2 rounded-lg shadow-md">Poin & Redemption</span>
            </h1>
            <div class="flex items-center gap-4 bg-[#FF8FA4] text-white px-4 py-2 rounded-lg">
                <img src="{{ asset('assets/icon/star.png') }}" alt="Poin" class="w-6 h-6">
                <span class="font-semibold">{{ Auth::user()->points }} Poin Tersedia</span>
            </div>
        </div>

        <!-- Daftar Voucher Tersedia -->
        <div class="bg-white rounded-lg shadow-lg mb-8">
            <div class="px-6 py-4 border-b bg-gradient-to-r from-[#FF8FA4] to-[#F542C8]">
                <h2 class="text-xl font-semibold text-white">Voucher Tersedia</h2>
            </div>
            <div id="voucher-list" class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @include('user.redemption.partials.redeem')
            </div>
        </div>

        <!-- Daftar Voucher Saya -->
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-6 py-4 border-b bg-gradient-to-r from-[#FF8FA4] to-[#F542C8]">
                <h2 class="text-xl font-semibold text-white">Voucher Saya</h2>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @include('user.redemption.partials.my-vouchers')
            </div>
        </div>
    </div>
@endsection
