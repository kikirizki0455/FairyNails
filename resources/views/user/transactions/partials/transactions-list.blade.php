@if ($transactions->count() > 0)
    @foreach ($transactions as $transaction)
        <div class="border rounded-lg mb-4 overflow-hidden shadow-sm">
            <div
                class="bg-gray-50 p-3 sm:p-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 sm:gap-0">
                <div>
                    <div class="text-gray-500 text-xs sm:text-sm">ID Pesanan: #{{ $transaction->id }}</div>
                    <div class="text-gray-500 text-xs sm:text-sm">
                        {{ date('d M Y, H:i', strtotime($transaction->created_at)) }}</div>
                </div>
                <div class="self-start sm:self-auto">
                    @if ($transaction->payment_status == 'pending')
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-0.5 rounded">Menunggu
                            Pembayaran</span>
                    @elseif($transaction->payment_status == 'process')
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded">Diproses</span>
                    @elseif($transaction->payment_status == 'completed')
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 rounded">Selesai</span>
                    @elseif($transaction->payment_status == 'cancelled')
                        <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-0.5 rounded">Dibatalkan</span>
                    @endif
                </div>
            </div>

            <div class="p-3 sm:p-4">
                <!-- Tampilkan max 2 item -->
                @foreach ($transaction->transactionDetails->take(2) as $detail)
                    <div class="flex items-center mb-2 last:mb-0">
                        <div class="flex-grow">
                            <div class="font-medium text-sm sm:text-base">{{ $detail->product->name }}</div>
                            <div class="text-xs sm:text-sm text-gray-500">{{ $detail->quantity }} x Rp
                                {{ number_format($detail->price, 0, ',', '.') }}</div>
                        </div>
                    </div>
                @endforeach

                @if ($transaction->transactionDetails->count() > 2)
                    <div class="text-xs sm:text-sm text-gray-500 mt-2">
                        +{{ $transaction->transactionDetails->count() - 2 }} item lainnya
                    </div>
                @endif
            </div>

            <div
                class="border-t p-3 sm:p-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-0">
                <div class="w-full sm:w-auto">
                    <span class="text-gray-500 text-sm">Total:</span>
                    <span class="font-bold">Rp
                        {{ number_format($transaction->total_amount, 0, ',', '.') }}</span>
                </div>
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2 w-full sm:w-auto">
                    <a href="{{ route('user.transaction.detail', $transaction->id) }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 px-4 rounded-lg text-xs sm:text-sm text-center">
                        Detail
                    </a>

                    @if ($transaction->payment_status == 'pending')
                        <a href="{{ route('user.pay', $transaction->id) }}"
                            class="bg-pink-500 hover:bg-pink-600 text-white py-2 px-4 rounded-lg text-xs sm:text-sm text-center">
                            Bayar Sekarang
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="text-center py-6 sm:py-8">
        <div class="text-gray-500">Teu aya transaksi</div>
    </div>
@endif
