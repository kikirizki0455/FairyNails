@extends('layouts.admin')

@section('title', 'Redemption Management | Fairy Nails')

@section('content')
    <div class="container mx-auto px-4 sm:px-8 py-8 max-w-screen-xl">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
            <h1 class="text-2xl sm:text-3xl font-bold text-[#FF8FA4]">
                <span class="bg-[#FF8FA4] xs:text-lg text-white p-2 rounded-lg shadow-md">Redemption Management</span>
            </h1>
            <button @click="$dispatch('open-modal', 'create-voucher')"
                class="bg-[#FF8FA4] hover:bg-[#F542C8] text-white font-bold py-2 px-4 rounded-lg transition duration-300 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                        clip-rule="evenodd" />
                </svg>
                Buat Voucher Baru
            </button>
        </div>

        <x-history title="Riwayat Penukaran Point">
            @include('admin.redemption.partials.redem-table', ['redeems' => $redeems])
        </x-history>



        <!-- Daftar Voucher -->
        <x-history title="Daftar Voucher">
            @include('admin.redemption.partials.voucher-table')
        </x-history>

        <!-- Modal Create Voucher -->
        <x-modal name="create-voucher" maxWidth="2xl">
            @include('admin.redemption.partials.modal-voucher')
        </x-modal>

        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        timer: 3000
                    });
                });
            </script>
        @endif
        <style>
            /* Ensure the pagination is responsive */
            @media (max-width: 640px) {
                .pagination-container nav {
                    display: flex;
                    justify-content: center;
                    width: 100%;
                    overflow-x: auto;
                }
            }
        </style>
    @endsection
