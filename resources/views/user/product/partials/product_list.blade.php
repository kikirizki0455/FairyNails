@foreach ($products as $product)
    <div
        class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl border border-gray-100">
        <!-- Informasi Produk -->
        <div class="p-4">
            <h3 class="font-bold text-lg text-gray-800 mb-1 line-clamp-2">{{ $product->name }}</h3>
            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $product->description }}</p>
            <div class="flex justify-between items-center">
                <div>
                    <span class="font-bold text-xl text-pink-600">Rp
                        {{ number_format($product->price, 0, ',', '.') }}</span>
                    @if ($product->original_price > $product->price)
                        <span class="text-xs text-gray-500 line-through ml-1">
                            Rp {{ number_format($product->original_price, 0, ',', '.') }}
                        </span>
                    @endif
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex gap-2 mt-4">
                <form action="{{ route('user.cart-add') }}" method="POST" class="flex-1">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit"
                        class="w-full bg-[#FF8FA4] hover:bg-[#EF557A] text-black px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                        Tambah ke Keranjang
                    </button>
                </form>
            </div>
        </div>
    </div>
@endforeach
