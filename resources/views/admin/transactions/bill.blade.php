@extends('layouts.admin')

@section('title', 'Detail Transaksi | Fairy Nails')

@section('content')
    <div class="container mx-auto px-4 sm:px-8 py-8 max-w-screen-xl">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-sm font-bold text-[#FF8FA4]">
                <span class="bg-[#FF8FA4] text-white p-2 rounded-lg shadow-md">Detail Transaksi
                    #{{ $transaction->id }}</span>
            </h1>
            <a href="{{ route('admin.transactions') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded-lg transition duration-300 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
                Kembali
            </a>
        </div>

        <!-- Informasi Transaksi -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-4 sm:mb-8 w-full max-w-4xl mx-auto">
            <div class="px-2 sm:px-4 md:px-6 py-3 sm:py-4 border-b bg-gradient-to-r from-[#FF8FA4] to-[#F542C8]">
                <h2 class="text-base sm:text-lg md:text-xl font-semibold text-white truncate">Informasi Transaksi</h2>
            </div>

            <div class="p-3 sm:p-4 md:p-6">
                @php
                    // Hitung total diskon dan subtotal
                    $totalSubtotal = 0;
                    $totalDiscount = 0;
                    $voucherDiscount = 0;

                    foreach ($transaction->transactionDetails as $detail) {
                        $price = $detail->price * $detail->quantity;
                        $discount = $detail->discount;

                        // Jika menggunakan voucher dan produk sesuai kategori
                        if ($transaction->voucher && $transaction->voucher->type === 'percentage_discount') {
                            if ($detail->product->category === $transaction->voucher->product_category) {
                                $discount = $transaction->voucher->value;
                            }
                        }

                        $itemDiscount = $price * ($discount / 100);
                        $totalSubtotal += $price - $itemDiscount;
                        $totalDiscount += $itemDiscount;
                    }

                    // Hitung diskon voucher jika ada
                    if ($transaction->voucher) {
                        if ($transaction->voucher->type === 'percentage_discount') {
                            $voucherDiscount = $totalSubtotal * ($transaction->voucher->value / 100);
                        }
                        $totalSubtotal -= $voucherDiscount;
                    }
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 sm:gap-4 md:gap-6">
                    <div class="space-y-2 sm:space-y-3 md:space-y-4">
                        <div>
                            <h3 class="text-xs sm:text-sm font-medium text-gray-500">ID Transaksi</h3>
                            <p
                                class="mt-0.5 sm:mt-1 text-sm sm:text-base md:text-lg font-semibold text-gray-900 break-words">
                                #{{ $transaction->id }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs sm:text-sm font-medium text-gray-500">Nama Pelanggan</h3>
                            <p
                                class="mt-0.5 sm:mt-1 text-sm sm:text-base md:text-lg font-semibold text-gray-900 break-words">
                                {{ $transaction->user->name ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs sm:text-sm font-medium text-gray-500">Email Pelanggan</h3>
                            <p class="mt-0.5 sm:mt-1 text-sm sm:text-base md:text-lg font-semibold text-gray-900 break-all">
                                {{ $transaction->user->email ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs sm:text-sm font-medium text-gray-500">No. Telepon</h3>
                            <p class="mt-0.5 sm:mt-1 text-sm sm:text-base md:text-lg font-semibold text-gray-900">
                                {{ $transaction->user->phone ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="space-y-2 sm:space-y-3 md:space-y-4 mt-3 md:mt-0">
                        <div>
                            <h3 class="text-xs sm:text-sm font-medium text-gray-500">Tanggal Transaksi</h3>
                            <p class="mt-0.5 sm:mt-1 text-sm sm:text-base md:text-lg font-semibold text-gray-900">
                                {{ $transaction->created_at->format('d M Y H:i') }}</p>
                        </div>
                        <div>
                            <h3 class="text-xs sm:text-sm font-medium text-gray-500">Status Pembayaran</h3>
                            <p class="mt-0.5 sm:mt-1">
                                <span
                                    class="px-1.5 sm:px-2 py-0.5 sm:py-1 inline-flex text-xs sm:text-sm leading-5 font-semibold rounded-full 
                                {{ $transaction->payment_status == 'completed'
                                    ? 'bg-green-100 text-green-800'
                                    : ($transaction->payment_status == 'pending'
                                        ? 'bg-yellow-100 text-yellow-800'
                                        : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($transaction->payment_status) }}
                                </span>
                            </p>
                        </div>
                        <div>
                            <h3 class="text-xs sm:text-sm font-medium text-gray-500">Poin yang Didapat</h3>
                            <p class="mt-0.5 sm:mt-1 text-sm sm:text-base md:text-lg font-semibold text-gray-900">
                                {{ $transaction->points_earned }} poin</p>
                        </div>
                        <div>
                            <h3 class="text-xs sm:text-sm font-medium text-gray-500">XP yang Didapat</h3>
                            <p class="mt-0.5 sm:mt-1 text-sm sm:text-base md:text-lg font-semibold text-gray-900">
                                {{ $transaction->xp_earned }} xp</p>
                        </div>
                    </div>
                </div>

                @if ($transaction->voucher_id)
                    <div class="mt-3 sm:mt-4 md:mt-6 pt-3 sm:pt-4 md:pt-6 border-t border-gray-200">
                        <h3 class="text-xs sm:text-sm md:text-base font-semibold text-gray-700">Informasi Voucher</h3>
                        <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-3 md:gap-4">
                            <div>
                                <p class="text-xs sm:text-sm text-gray-500">Tipe Voucher</p>
                                <p class="font-medium text-xs sm:text-sm md:text-base">
                                    {{ ucfirst(str_replace('_', ' ', $transaction->userVoucher?->voucher?->type ?? 'tidak ada')) }}
                                </p>
                            </div>
                            @if ($transaction->userVoucher->type === 'percentage_discount')
                                <div>
                                    <p class="text-xs sm:text-sm text-gray-500">Nilai Diskon</p>
                                    <p class="font-medium text-xs sm:text-sm md:text-base">
                                        {{ number_format($transaction->voucher->value, 0) }}%</p>
                                </div>
                                <div>
                                    <p class="text-xs sm:text-sm text-gray-500">Kategori Produk</p>
                                    <p class="font-medium text-xs sm:text-sm md:text-base">
                                        {{ $transaction->voucher->product_category ?? 'Semua Kategori' }}</p>
                                </div>
                            @elseif(optional($transaction->userVoucher?->voucher)->type === 'free_service')
                                <div>
                                    <p class="text-xs sm:text-sm text-gray-500">Layanan Gratis</p>
                                    <p class="font-medium text-xs sm:text-sm md:text-base">{{ $voucherName }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Detail Item Transaksi -->
        <!-- Detail Item Transaksi -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-4 sm:mb-6">
            {{-- header --}}
            <div class="px-3 sm:px-4 md:px-6 py-3 sm:py-4 border-b bg-gradient-to-r from-[#FF8FA4] to-[#F542C8]">
                <h2 class="text-base sm:text-lg md:text-xl font-semibold text-white">Detail Item</h2>
            </div>

            <!-- Table for larger screens -->
            <div class="hidden sm:block overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-2 sm:px-4 md:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th scope="col"
                                class="px-2 sm:px-4 md:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Produk/Layanan
                            </th>
                            <th scope="col"
                                class="px-2 sm:px-4 md:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Harga
                            </th>
                            <th scope="col"
                                class="px-2 sm:px-4 md:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jumlah
                            </th>
                            <th scope="col"
                                class="px-2 sm:px-4 md:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Voucher
                            </th>
                            <th scope="col"
                                class="px-2 sm:px-4 md:px-6 py-2 sm:py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Subtotal
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($transaction->transactionDetails as $index => $detail)
                            @php
                                $price = $detail->price * $detail->quantity;
                                $discount = $detail->discount;

                                // Apply voucher discount jika sesuai
                                if (
                                    $transaction->voucher &&
                                    $transaction->voucher->type === 'percentage_discount' &&
                                    $detail->product->category === $transaction->voucher->product_category
                                ) {
                                    $discount = $transaction->voucher->value;
                                }

                                $subtotal = $price - $price * ($discount / 100);
                            @endphp

                            <tr>
                                <td
                                    class="px-2 sm:px-4 md:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-500">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-2 sm:px-4 md:px-6 py-2 sm:py-4 whitespace-nowrap">
                                    <div class="text-xs sm:text-sm font-medium text-gray-900">
                                        {{ $detail->product->name ?? 'Produk tidak tersedia' }}
                                    </div>
                                    <div class="text-xs sm:text-sm text-gray-500">
                                        {{ $detail->product->category ?? 'Tidak ada kategori' }}
                                    </div>
                                </td>
                                <td
                                    class="px-2 sm:px-4 md:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-500">
                                    Rp {{ number_format($detail->price, 0, ',', '.') }}
                                </td>
                                <td
                                    class="px-2 sm:px-4 md:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-500">
                                    {{ $detail->quantity }}
                                </td>
                                <td
                                    class="px-2 sm:px-4 md:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-500">
                                    {{ $transaction->userVoucher?->voucher?->name ?? '0' }}
                                </td>
                                <td
                                    class="px-2 sm:px-4 md:px-6 py-2 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-500">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Card view for mobile screens -->
            <div class="sm:hidden">
                @foreach ($transaction->transactionDetails as $index => $detail)
                    @php
                        $price = $detail->price * $detail->quantity;
                        $discount = $detail->discount;

                        // Apply voucher discount jika sesuai
                        if (
                            $transaction->voucher &&
                            $transaction->voucher->type === 'percentage_discount' &&
                            $detail->product->category === $transaction->voucher->product_category
                        ) {
                            $discount = $transaction->voucher->value;
                        }

                        $subtotal = $price - $price * ($discount / 100);
                    @endphp

                    <div class="border-b border-gray-200 p-3">
                        <div class="flex justify-between items-start mb-1">
                            <p class="text-xs font-medium text-gray-900">No</p>
                            <p class="text-xs text-gray-500">{{ $index + 1 }}</p>
                        </div>
                        <div class="flex justify-between items-start mb-1">
                            <div>
                                <p class="text-xs font-medium text-gray-900">Produk/Layanan</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs font-medium">{{ $detail->product->name ?? 'Produk tidak tersedia' }}</p>
                                <p class="text-xs text-gray-500">{{ $detail->product->category ?? 'Tidak ada kategori' }}
                                </p>
                            </div>
                        </div>
                        <div class="flex justify-between items-start mb-1">
                            <p class="text-xs font-medium text-gray-900">Harga</p>
                            <p class="text-xs text-gray-500">Rp {{ number_format($detail->price, 0, ',', '.') }}</p>
                        </div>
                        <div class="flex justify-between items-start mb-1">
                            <p class="text-xs font-medium text-gray-900">Jumlah</p>
                            <p class="text-xs text-gray-500">{{ $detail->quantity }}</p>
                        </div>
                        <div class="flex justify-between items-start mb-1">
                            <p class="text-xs font-medium text-gray-900">Voucher</p>
                            <p class="text-xs text-gray-500">{{ $transaction->userVoucher?->voucher?->name ?? '0' }}</p>
                        </div>
                        <div class="flex justify-between items-start">
                            <p class="text-xs font-medium text-gray-900">Subtotal</p>
                            <p class="text-xs text-gray-500 font-semibold">Rp {{ number_format($subtotal, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="p-3 sm:p-4 md:p-6 bg-gray-50">
                <div class="flex flex-col items-end">
                    <div class="w-full md:w-1/3 space-y-1 sm:space-y-2">
                        <div class="space-y-2 sm:space-y-3 mb-2 sm:mb-4">
                            <div class="flex justify-between text-xs sm:text-sm">
                                <span>Subtotal ({{ $totalItems }} items)</span>
                                <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>

                            @if ($level == 'bronze' || 'silver' || 'gold' || 'platinum')
                                <div class="flex justify-between text-green-600 text-xs sm:text-sm">
                                @else
                                    <div class="flex justify-between text-black text-xs sm:text-sm">
                            @endif
                            <span>Discount Level ({{ $level }})</span>
                            <span>- Rp {{ number_format($xpDiscountAmount, 0) }}</span>
                        </div>

                        @if ($transaction->voucher_id)
                            <div class="flex justify-between text-green-600 text-xs sm:text-sm">
                                <span>Diskon Voucher</span>
                                <span>- Rp {{ number_format($transaction->discount_amount, 0, ',', '.') }}</span>
                            </div>
                        @endif
                    </div>

                    <h3 class="font-medium mb-1 sm:mb-2 text-xs sm:text-sm">Discount</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 w-full">
                        <div
                            class="border rounded-lg p-2 sm:p-3 flex flex-col sm:flex-row items-start sm:items-center justify-between bg-gray-50">
                            <span class="text-xs sm:text-sm mb-1 sm:mb-0">Voucher</span>
                            <span class="text-xs sm:text-sm font-medium">{{ $voucherName }}</span>
                        </div>
                        <div
                            class="border rounded-lg p-2 sm:p-3 flex flex-col sm:flex-row items-start sm:items-center justify-between bg-gray-50">
                            <h3 class="text-xs sm:text-sm mb-1 sm:mb-0">
                                Tipe Voucher
                            </h3>
                            @if ($voucherType == 'percentage_discount')
                                <span class="text-xs sm:text-sm font-medium">Dison Voucher</span>
                            @else
                                <span class="text-xs sm:text-sm font-medium">Layanan Gratis</span>
                            @endif
                        </div>
                        <div
                            class="border rounded-lg p-2 sm:p-3 flex flex-col sm:flex-row items-start sm:items-center justify-between bg-gray-50">
                            <span class="text-xs sm:text-sm mb-1 sm:mb-0">Level discount({{ $level }})</span>
                            <span class="text-xs sm:text-sm font-medium">{{ $xpDiscount }}%</span>
                        </div>
                    </div>

                    <!-- Form untuk input total -->
                    <form action="{{ route('admin.transactions.update-total', $transaction->id) }}" method="POST"
                        class="w-full">
                        @csrf
                        @method('PUT')
                        <div class="pt-2 border-t border-gray-200 mt-2">
                            <div class="flex justify-between mt-2 items-center">
                                <span class="text-sm sm:text-base md:text-lg font-bold text-gray-900">Total:</span>
                                <input type="text" name="total_amount"
                                    value="{{ number_format($totalAfterDiscount, 0, ',', '.') }}"
                                    class="text-sm sm:text-base md:text-lg font-bold text-[#FF8FA4] bg-transparent border border-gray-300 rounded px-2 py-1 text-right focus:outline-none focus:ring-1 focus:ring-[#FF8FA4] w-1/2 sm:w-auto"
                                    required>
                            </div>
                            <div class="flex justify-end mt-2 space-x-2">
                                @if ($transaction->payment_status === 'pending' || $transaction->payment_status === 'process')
                                    <button type="button" onclick="resetTotal()"
                                        class="px-2 py-1 sm:px-4 sm:py-2 text-xs sm:text-sm bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                                        Reset
                                    </button>
                                    <button type="submit"
                                        class="px-2 py-1 sm:px-4 sm:py-2 text-xs sm:text-sm bg-[#FF8FA4] text-white rounded hover:bg-[#e07b92]">
                                        Simpan
                                    </button>
                                @elseif ($transaction->payment_status === 'completed')
                                    <p class="text-xs sm:text-sm text-green-800">Pembayaran Telah Selesai</p>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="px-3 sm:px-4 md:px-6 py-3 sm:py-4 bg-gray-50 border-t border-gray-200">
            <div class="flex flex-col sm:flex-row sm:justify-between gap-2">
                @if ($transaction->payment_status === 'pending' || $transaction->payment_status === 'process')
                    <form action="{{ route('admin.transactions.update-status', $transaction->id) }}" method="POST"
                        class="w-full sm:w-auto"
                        onsubmit="return confirm('Apakah Anda yakin ingin menyelesaikan transaksi ini?')">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="completed">
                        <button type="submit"
                            class="w-full sm:w-auto bg-green-500 hover:bg-green-600 text-white px-3 py-2 sm:px-4 text-xs sm:text-sm rounded-lg transition duration-300">
                            Selesaikan Transaksi
                        </button>
                    </form>
                    <form action="{{ route('admin.transactions.update-status', $transaction->id) }}" method="POST"
                        class="w-full sm:w-auto mt-2 sm:mt-0"
                        onsubmit="return confirm('Apakah Anda yakin ingin membatalkan transaksi ini?')">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="cancelled">
                        <button type="submit"
                            class="w-full sm:w-auto bg-red-500 hover:bg-red-600 text-white px-3 py-2 sm:px-4 text-xs sm:text-sm rounded-lg transition duration-300">
                            Batalkan Transaksi
                        </button>
                    </form>
                @elseif ($transaction->payment_status === 'completed')
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function resetTotal() {
            const calculatedTotal = {{ $totalSubtotal }};
            document.querySelector('input[name="total_amount"]').value =
                new Intl.NumberFormat('id-ID').format(calculatedTotal);
        }
    </script>
@endpush
