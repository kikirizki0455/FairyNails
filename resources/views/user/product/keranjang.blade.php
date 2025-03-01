@extends('layouts.user')

@section('content')
    <div class="container py-6">
        <h1 class="text-2xl font-bold mb-6">Keranjang Belanja</h1>

        @if (count($cartItems) > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Daftar Item Keranjang -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        @include('user.product.partials.cart-list')
                    </div>

                    <!-- Tombol Kembali Berbelanja -->
                    <a href="{{ route('user.product') }}"
                        class="inline-block mt-6 bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-lg transition-colors">
                        Kembali Berbelanja
                    </a>
                </div>

                <!-- Ringkasan Pesanan -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-sm p-6 sticky top-6">
                        <h2 class="text-lg font-semibold mb-4">Ringkasan Pesanan</h2>

                        <div class="space-y-3 mb-4">
                            <div class="flex justify-between">
                                <span>Subtotal ({{ count($cartItems) }} items)</span>
                                <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                            @if ($selectedVoucher)
                                <div class="flex justify-between text-green-600">
                                    <span>Diskon Voucher</span>
                                    <span>- Rp {{ number_format($discount, 0, ',', '.') }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="border-t pt-3 mb-6">
                            <div class="flex justify-between font-bold">
                                <span>Total</span>
                                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <!-- Pilih Voucher -->
                        <div class="mb-6">
                            <h3 class="font-medium mb-2">Voucher</h3>
                            @include('user.product.partials.voucher-pick')
                        </div>

                        <!-- Tombol Checkout -->
                        <form action="{{ route('user.checkout', session('transaction_id')) }}" method="POST">
                            @csrf
                            <input type="hidden" name="transaction_data"
                                value="{{ json_encode(session('transactionDetails')) }}">
                            <button type="submit"
                                class="block w-full bg-pink-500 hover:bg-pink-600 text-white py-3 rounded-lg text-center font-semibold">
                                Lanjut ke Checkout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <!-- Tampilan Keranjang Kosong -->
            @include('user.product.partials.empty-cart')
        @endif
    </div>
@endsection
