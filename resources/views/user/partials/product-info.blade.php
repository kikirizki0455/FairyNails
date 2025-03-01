@foreach ($products as $product)
    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
        <div class="p-4">
            <h4 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h4>
            <p class="text-sm text-gray-600 mb-4">{{ $product->description }}</p>
            <div class="flex justify-between items-center">
                <span class="text-sm text-gray-700">Price:</span>
                <span
                    class="font-semibold text-orange-500">Rp{{ number_format($product->price, 0, ',', '.') }}{{ $product->points }}
                    poin</span>
            </div>
        </div>
    </div>
@endforeach

@if ($products->isEmpty())
    <div class="col-span-3 text-center text-gray-500">
        Tidak ada produk yang tersedia untuk redeem.
    </div>
@endif
