@foreach ($cartItems as $productId => $item)
    <div
        class="flex items-center border-b pb-6 mb-6 last:border-0 last:pb-0 last:mb-0 transition-all hover:bg-gray-50 p-4 rounded-lg">
        <!-- Detail Produk -->
        <div class="flex-grow">
            <h3 class="font-medium text-gray-800">{{ $item['name'] }}</h3>

            <!-- Jumlah dan Harga -->
            <div class="mt-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <!-- Form Update Jumlah -->
                <div class="flex items-center">
                    <form action="{{ route('cart.update') }}" method="POST" class="flex items-center">
                        @csrf
                        <input type="hidden" name="cart_id" value="{{ $productId }}">
                        <button type="submit" name="decrease" value="1"
                            class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-l-lg hover:bg-gray-100 transition-colors">
                            -
                        </button>
                        <input type="text" name="quantity" value="{{ $item['quantity'] }}"
                            class="w-12 h-8 border-t border-b border-gray-300 text-center text-gray-700 bg-gray-50"
                            readonly>
                        <button type="submit" name="increase" value="1"
                            class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-r-lg hover:bg-gray-100 transition-colors">
                            +
                        </button>
                    </form>
                </div>

                <!-- Harga dan Tombol Hapus -->
                <div class="flex items-center gap-4">
                    <span class="font-semibold text-gray-800">Rp
                        {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                    <form action="{{ route('cart.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="cart_id" value="{{ $productId }}">
                        <button type="submit" class="text-red-500 hover:text-red-700 transition-colors">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
