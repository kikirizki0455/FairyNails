@extends('layouts.user')

@section('content')
    <div class="container py-4 px-4 md:px-6">
        <div class="flex items-center gap-2 mb-6">
            <a href="{{ route('user.transaction.detail', $transaction->id) }}" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="text-2xl font-bold">Pembayaran Pesanan</h1>
        </div>

        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-pink-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                </div>

                <div class="text-center mb-6">
                    <h2 class="text-xl font-bold mb-2">Selesaikan Pembayaran</h2>
                    <p class="text-gray-600">Silakan lakukan pembayaran manual kepada pegawai kami</p>
                </div>

                <div class="border-t border-b py-4 my-4">
                    <div class="flex justify-between flex-wrap mb-2">
                        <span class="text-gray-600">Total Pembayaran</span>
                        <span class="font-bold text-lg">Rp {{ number_format($totalAfterDiscount, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between flex-wrap">
                        <span class="text-gray-600">ID Pesanan</span>
                        <span>{{ $transaction->id }}</span>
                    </div>
                </div>

                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                    <div class="flex flex-col sm:flex-row">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2 flex-shrink-0"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <p class="text-yellow-700">Instruksi Pembayaran:</p>
                            <ol class="text-yellow-700 text-sm list-decimal ml-5 mt-1">
                                <li>Tunjukkan halaman ini atau ID pesanan kepada pegawai kami</li>
                                <li>Lakukan pembayaran sebesar jumlah yang tercantum</li>
                                <li>Pegawai akan memproses pembayaran Anda</li>
                                <li>Status pesanan akan diperbarui setelah pembayaran dikonfirmasi</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ route('user.transactions') }}"
                        class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg">
                        Kembali ke Pesanan
                    </a>
                </div>
            </div>

            <div class="text-center text-gray-500 text-sm">
                <p>Jika Anda memiliki pertanyaan, silakan hubungi customer service kami</p>
            </div>
        </div>
    </div>
@endsection
