@extends('layouts.admin')

@section('title', 'Tambah Voucher | Fairy Nails')

@section('content')
    <div class="container mx-auto px-4 sm:px-8 py-8 max-w-screen-xl">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-bold text-[#FF8FA4]">
                <span class="bg-[#FF8FA4] text-white p-2 rounded-lg shadow-md">Tambah Voucher Baru</span>
            </h1>
            <a href="{{ route('admin.vouchers.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded-lg transition duration-300 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b bg-gradient-to-r from-[#FF8FA4] to-[#F542C8]">
                <h2 class="text-xl font-semibold text-white">Form Tambah Voucher</h2>
            </div>

            <div class="p-6">
                <form action="{{ route('admin.vouchers.store') }}" method="POST" x-data="{ voucherType: '{{ old('type', 'percentage_discount') }}' }">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @include('admin.redemption.partials.add-list-voucher')
                    </div>
                    <div class="mt-8 flex justify-end gap-4">
                        <button type="reset"
                            class="px-6 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">
                            Reset
                        </button>
                        <button type="submit"
                            class="bg-[#FF8FA4] hover:bg-[#F542C8] text-white px-6 py-2 rounded-lg transition duration-300">
                            Simpan Voucher
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="//unpkg.com/alpinejs" defer></script>
    @endpush

@endsection
