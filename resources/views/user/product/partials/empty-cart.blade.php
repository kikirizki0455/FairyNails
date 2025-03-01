<div class="bg-white rounded-lg shadow-sm p-8 text-center">
    <div class="flex justify-center mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
    </div>
    <h2 class="text-xl font-semibold mb-2">Keranjang Anda Kosong</h2>
    <p class="text-gray-500 mb-6">Silakan tambahkan produk ke keranjang untuk melanjutkan belanja</p>
    <a href="{{ route('user.product') }}"
        class="inline-block bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-lg">
        Kembali Berbelanja
    </a>
</div>
