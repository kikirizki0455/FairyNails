@extends('layouts.admin')

@section('title', 'Daftar Transaksi')

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-900">Daftar Transaksi</h1>

            <div class="mt-4 bg-white shadow-md rounded-lg overflow-hidden">
                <!-- Filter Section -->
                <div class="p-4 bg-gray-50 border-b">
                    <form action="" method="GET" class="flex flex-wrap gap-4 items-center">
                        @include('admin.transactions.partials.filter')
                    </form>
                </div>

                @if (session('error'))
                    <div class="p-4 bg-red-50 border-l-4 border-red-400">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if (session('success'))
                    <div class="p-4 bg-green-50 border-l-4 border-green-400">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Table for Desktop -->
                <div class="hidden md:block">
                    <form action="{{ route('transactions.export') }}" method="POST">
                        @csrf
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3">
                                            <div class="flex items-center">
                                                <input type="checkbox" id="select-all"
                                                    class="h-4 w-4 text-pink-500 focus:ring-pink-400 border-gray-300 rounded">
                                                <label for="select-all"
                                                    class="ml-2 text-xs font-medium text-gray-500">Semua</label>
                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Pelanggan
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Total
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Voucher
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Point
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tanggal
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($transactions as $transaction)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4 whitespace-nowrap">
                                                <input type="checkbox" name="selected_transactions[]"
                                                    value="{{ $transaction->id }}"
                                                    class="h-4 w-4 text-pink-500 focus:ring-pink-400 border-gray-300 rounded">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                #{{ $transaction->id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $transaction->user->name ?? 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ ucfirst(str_replace('_', ' ', $transaction->userVoucher?->voucher?->type ?? 'Tanpa Voucher')) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $transaction->points_earned }} pts
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                {{ $transaction->payment_status == 'completed'
                                                    ? 'bg-green-100 text-green-800'
                                                    : ($transaction->payment_status == 'pending'
                                                        ? 'bg-yellow-100 text-yellow-800'
                                                        : 'bg-red-100 text-red-800') }}">
                                                    {{ ucfirst($transaction->payment_status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $transaction->created_at->format('d M Y H:i') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('admin.transactions.show', $transaction->id) }}"
                                                    class="text-[#FF8FA4] hover:text-[#F542C8] transition duration-150">
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada
                                                data transaksi</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="flex justify-between items-center p-4 bg-gray-50">
                            <div class="text-sm text-gray-600">
                                Menampilkan {{ $transactions->firstItem() ?? 0 }} sampai
                                {{ $transactions->lastItem() ?? 0 }} dari {{ $transactions->total() }} data
                            </div>
                            <div class="flex space-x-2">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#FF8FA4] hover:bg-[#F542C8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Export Excel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Mobile View -->
                <div class="md:hidden">
                    <form action="{{ route('transactions.export') }}" method="POST">
                        @csrf
                        <div class="p-4 space-y-4">
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" id="select-all-mobile"
                                    class="h-4 w-4 text-pink-500 focus:ring-pink-400 border-gray-300 rounded">
                                <label for="select-all-mobile" class="text-sm font-medium text-gray-700">Pilih
                                    Semua</label>
                            </div>

                            @forelse($transactions as $transaction)
                                <div class="bg-white rounded-lg shadow p-4">
                                    <div class="space-y-2">
                                        <div class="flex justify-between items-center">
                                            <div class="flex items-center space-x-2">
                                                <input type="checkbox" name="selected_transactions[]"
                                                    value="{{ $transaction->id }}"
                                                    class="h-4 w-4 text-pink-500 focus:ring-pink-400 border-gray-300 rounded">
                                                <span class="font-semibold">#{{ $transaction->id }}</span>
                                            </div>
                                            <span
                                                class="px-2 text-xs font-semibold rounded-full 
                                            {{ $transaction->payment_status == 'completed'
                                                ? 'bg-green-100 text-green-800'
                                                : ($transaction->payment_status == 'pending'
                                                    ? 'bg-yellow-100 text-yellow-800'
                                                    : 'bg-red-100 text-red-800') }}">
                                                {{ ucfirst($transaction->payment_status) }}
                                            </span>
                                        </div>
                                        <div class="text-sm text-gray-600">{{ $transaction->user->name ?? 'N/A' }}</div>
                                        <div class="text-sm font-medium">Total: Rp
                                            {{ number_format($transaction->total_amount, 0, ',', '.') }}</div>
                                        <div class="text-sm text-gray-500">Voucher:
                                            {{ ucfirst(str_replace('_', ' ', $transaction->userVoucher?->voucher?->type ?? 'Tanpa Voucher')) }}
                                        </div>
                                        <div class="text-sm text-gray-500">Point: {{ $transaction->points_earned }} pts
                                        </div>
                                        <div class="text-sm text-gray-500">Tanggal:
                                            {{ $transaction->created_at->format('d M Y H:i') }}</div>
                                        <div class="pt-2">
                                            <a href="{{ route('admin.transactions.show', $transaction->id) }}"
                                                class="text-[#FF8FA4] hover:text-[#F542C8] text-sm font-medium">
                                                Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center text-gray-500 p-4 bg-white rounded-lg shadow">Tidak ada data
                                    transaksi</div>
                            @endforelse

                            <div class="pt-4">
                                <button type="submit"
                                    class="w-full flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#FF8FA4] hover:bg-[#F542C8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Export Excel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Pagination -->
                <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                    {{ $transactions->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // Function to handle select all checkboxes
        function handleSelectAll(selectAllCheckbox) {
            const checkboxes = document.querySelectorAll('input[name="selected_transactions[]"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        }

        // For desktop select all
        const selectAllDesktop = document.getElementById('select-all');
        if (selectAllDesktop) {
            selectAllDesktop.addEventListener('click', function() {
                handleSelectAll(this);
            });
        }

        // For mobile select all
        const selectAllMobile = document.getElementById('select-all-mobile');
        if (selectAllMobile) {
            selectAllMobile.addEventListener('click', function() {
                handleSelectAll(this);
            });
        }
    </script>
@endpush
