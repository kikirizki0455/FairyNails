@extends('layouts.user')

@section('content')
    <div class="container mx-auto py-6 px-4">
        <h1 class="text-3xl font-bold mb-8 text-gray-800">Produk Tersedia</h1>

        <!-- Filter dan Pencarian -->
        <div class="bg-white rounded-lg shadow-md p-5 mb-8">

        </div>

        <!-- Grid Produk -->
        <div id="product-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @include('user.product.partials.product_list')
        </div>

        <!-- Tidak Ada Produk -->
        @if (count($products) == 0)
            <div class="bg-gray-50 rounded-lg p-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-lg font-medium text-gray-700 mb-1">Tidak Ada Produk</h3>
                <p class="text-gray-500">Maaf, tidak ada produk yang sesuai dengan filter Anda.</p>
            </div>
        @endif

        <!-- Pagination -->
        <div class="mt-10">
            {{ $products->links() }}
        </div>
    </div>
@endsection
