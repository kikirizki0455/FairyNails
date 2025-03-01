@extends('layouts.user')

@section('content')
    <div class="container py-4">
        <h1 class="text-2xl font-bold mb-6">Riwayat Pesanan</h1>

        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <!-- Tab Navigasi -->
            @include('user.transactions.partials.nav-tab')

            <!-- Daftar Transaksi -->
            <div id="transaction-list" class="p-4">
                @if (count($transactions) > 0)
                    @include('user.transactions.partials.transactions-list')
                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $transactions->links() }}
                    </div>
                @else
                    <div class="text-center p-8">
                        <div class="flex justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold mb-2">Tidak Ada Pesanan</h2>
                        <p class="text-gray-500 mb-6">Anda belum memiliki pesanan pada kategori ini</p>
                        <a href="{{ route('user.product') }}"
                            class="inline-block bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-lg">
                            Mulai Belanja
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
