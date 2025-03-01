@extends('layouts.admin')

@section('title', 'Tambah Produk | Fairy Nails')

@section('content')
    <div class="container mx-auto px-4 sm:px-8 py-8 max-w-screen-xl">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold text-[#FF8FA4]">
                <span class="bg-[#FF8FA4] text-white p-2 rounded-lg shadow-md">Tambah Produk Baru</span>
            </h1>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Header Gradient -->
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-[#FF8FA4] to-[#F542C8]">
                <h2 class="text-xl font-semibold text-white">Form Tambah Produk</h2>
            </div>

            <!-- Form Container -->
            <div class="p-6">
                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.product.store') }}"
                    enctype="multipart/form-data"class="space-y-6">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <!-- Grid Layout -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @include('admin.product.partials.form-add')
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end mt-8">
                        <button type="submit"
                            class="bg-[#FF8FA4] hover:bg-[#F542C8] text-white font-bold py-3 px-8 rounded-lg transition duration-300 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            Simpan Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
