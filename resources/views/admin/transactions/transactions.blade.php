@extends('layouts.admin')

@section('title', 'Daftar Transaksi | Fairy Nails')

@section('content')
    <div class="w-full min-h-screen bg-gray-100">
        <div class="container mx-auto px-4 sm:px-8 py-8 max-w-screen-xl">
            <x-head title="Daftar Transaksi" description="Filter Transaksi" />

            <div class="bg-white rounded-lg shadow-lg overflow-hidden w-full">
                <div class="px-6 py-4 border-b bg-gradient-to-r from-[#FF8FA4] to-[#F542C8]">
                    <h2 class="text-xl font-semibold text-white">Filter Transaksi</h2>
                </div>

                <div class="p-6">
                    <form action="{{ route('admin.transactions') }}" method="GET">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <!-- Filter inputs sama dengan sebelumnya -->
                            @include('admin.transactions.partials.filter')
                        </div>
                    </form>
                </div>

                <!-- Desktop view (hidden on mobile) -->
                <div class="hidden md:block overflow-x-auto w-full">
                    @include('admin.transactions.partials.table-transaction-desktop')
                </div>

                <!-- Mobile view (visible only on mobile) -->
                <div class="md:hidden">
                    @include('admin.transactions.partials.table-transaction-mobile')
                </div>

                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <span class="text-sm text-gray-600 text-center sm:text-left">
                            Menampilkan {{ $transactions->firstItem() }} hingga {{ $transactions->lastItem() }} dari
                            {{ $transactions->total() }} hasil
                        </span>
                        <div class="pagination-container w-full sm:w-auto">
                            {{ $transactions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Pagination responsive */
        @media (max-width: 640px) {
            .pagination-container nav {
                display: flex;
                justify-content: center;
                width: 100%;
                overflow-x: auto;
            }
        }
    </style>
@endpush
