@extends('layouts.user')

@section('content')
    <div class="container mx-auto py-6 px-4">
        <!-- Header Section -->
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('user.transactions') }}" class="text-gray-500 hover:text-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="text-xl md:text-2xl font-bold">Detail Pesanan {{ $transaction->id }}</h1>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column: Order Information -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Status Card -->
                <div class="bg-white rounded-lg shadow-sm p-4 md:p-6">
                    <div class="flex flex-wrap justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold">Status Pesanan</h2>
                        @if ($transaction->payment_status == 'pending')
                            <span class="bg-yellow-100 text-yellow-800 text-sm font-medium px-3 py-1 rounded">Menunggu
                                Pembayaran</span>
                        @elseif($transaction->payment_status == 'processing')
                            <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded">Diproses</span>
                        @elseif($transaction->payment_status == 'completed')
                            <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded">Selesai</span>
                        @elseif($transaction->payment_status == 'cancelled')
                            <span class="bg-red-100 text-red-800 text-sm font-medium px-3 py-1 rounded">Dibatalkan</span>
                        @endif
                    </div>

                    <!-- Progress Tracker -->
                    @include('user.transactions.partials.track-progress')

                    <!-- Status Message -->
                    <div class="p-4 rounded-lg bg-gray-50 text-gray-700 text-sm">
                        @if ($transaction->payment_status == 'pending')
                            <p><strong>Pesan:</strong> Silakan lakukan pembayaran manual ke pegawai. Setelah pembayaran,
                                status pesanan akan diperbarui oleh admin.</p>
                        @elseif($transaction->payment_status == 'processing')
                            <p><strong>Pesan:</strong> Pembayaran telah diterima. Pesanan Anda sedang diproses oleh tim
                                kami.</p>
                        @elseif($transaction->payment_status == 'completed')
                            <p><strong>Pesan:</strong> Pesanan telah selesai. Terima kasih telah berbelanja dengan kami!</p>
                        @elseif($transaction->payment_status == 'cancelled')
                            <p><strong>Pesan:</strong> Pesanan telah dibatalkan.</p>
                        @endif
                    </div>
                </div>

                <!-- Product Details Card -->
                <div class="bg-white rounded-lg shadow-sm p-4 md:p-6">
                    <h2 class="text-lg font-semibold mb-4">Detail Produk</h2>

                    <div class="space-y-4">
                        @include('user.transactions.partials.product-detail')
                    </div>
                </div>

                <!-- Purchase Information Card -->
                @include('user.transactions.partials.purchase-info')
            </div>

            <!-- Right Column: Order Summary -->
            <div>
                @include('user.transactions.partials.order-summary')
            </div>
        </div>
    </div>
@endsection
