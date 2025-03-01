@extends('layouts.user')

@section('content')
    <div class="container py-4">
        <h1 class="text-2xl font-bold mb-6">Checkout</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Checkout -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h2 class="text-lg font-semibold mb-4">Informasi Pengiriman</h2>

                    <form action="{{ route('checkout.process') }}" method="POST" id="checkoutForm">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ auth()->user()->name }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300"
                                    required>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Nomor Telepon</label>
                                <input type="text" name="phone" value="{{ auth()->user()->phone ?? '' }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300"
                                    required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Alamat Lengkap</label>
                            <textarea name="address" rows="3"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300" required>{{ auth()->user()->address ?? '' }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-700 mb-2">Kota</label>
                                <input type="text" name="city" value="{{ auth()->user()->city ?? '' }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300"
                                    required>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Provinsi</label>
                                <input type="text" name="province" value="{{ auth()->user()->province ?? '' }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300"
                                    required>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Kode Pos</label>
                                <input type="text" name="postal_code" value="{{ auth()->user()->postal_code ?? '' }}"
                                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300"
                                    required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Catatan (Opsional)</label>
                            <textarea name="notes" rows="2"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300"></textarea>
                        </div>
                    </form>
                </div>

                <!-- Daftar Item -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-semibold mb-4">Item Pesanan</h2>

                    @foreach ($cartItems as $item)
                        <div class="flex border-b pb-4 mb-4 last:border-0 last:pb-0 last:mb-0">
                            <div class="w-16 h-16 flex-shrink-0">
                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}"
                                    class="w-full h-full object-cover rounded">
                            </div>
                            <div class="ml-4 flex-grow">
                                <h3 class="font-medium">{{ $item->product->name }}</h3>
                                <div class="flex justify-between mt-1 text-sm text-gray-500">
                                    <span>{{ $item->quantity }} x Rp
                                        {{ number_format($item->product->price, 0, ',', '.') }}</span>
                                    <span>Rp
                                        {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Ringkasan Pesanan -->
            <div>
                <div class="bg-white rounded-lg shadow-sm p-6 sticky top-20">
                    <h2 class="text-lg font-semibold mb-4">Ringkasan Pesanan</h2>

                    <div class="space-y-3 mb-4">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        @if ($selectedVoucher)
                            <div class="flex justify-between text-green-600">
                                <span>Voucher: {{ $selectedVoucher->code }}</span>
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

                    <div class="mb-6">
                        <h3 class="font-medium mb-2">Metode Pembayaran</h3>
                        <div class="border rounded-lg p-3 flex items-center bg-gray-50">
                            <input type="radio" name="payment_method" id="payment_cash" value="cash" checked
                                class="mr-2" form="checkoutForm">
                            <label for="payment_cash" class="flex-grow">Bayar di Tempat</label>
                        </div>
                    </div>

                    <button type="submit" form="checkoutForm"
                        class="block w-full bg-pink-500 hover:bg-pink-600 text-white py-3 rounded-lg text-center font-semibold">
                        Proses Pesanan
                    </button>

                    <div class="mt-4 text-xs text-gray-500 text-center">
                        Dengan mengklik tombol di atas, anda menyetujui syarat dan ketentuan yang berlaku.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
