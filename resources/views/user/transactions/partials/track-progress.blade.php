<div class="relative mb-6">
    <!-- Progress Bar -->
    <div class="h-1 bg-gray-200 rounded-full mb-4 sm:mb-8">
        @if ($transaction->payment_status == 'pending')
            <div class="h-1 bg-pink-500 rounded-full" style="width: 25%"></div>
        @elseif($transaction->payment_status == 'processing')
            <div class="h-1 bg-pink-500 rounded-full" style="width: 50%"></div>
        @elseif($transaction->payment_status == 'completed')
            <div class="h-1 bg-pink-500 rounded-full" style="width: 100%"></div>
        @endif
    </div>

    <!-- Progress Steps -->
    <div class="flex justify-between">
        <!-- Step 1: Order Created -->
        <div class="text-center">
            <div
                class="w-6 h-6 sm:w-8 sm:h-8 {{ in_array($transaction->payment_status, ['pending', 'processing', 'completed']) ? 'bg-pink-500 text-white' : 'bg-gray-200 text-gray-500' }} rounded-full flex items-center justify-center mx-auto mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
            <div
                class="text-xs sm:text-sm {{ in_array($transaction->payment_status, ['pending', 'processing', 'completed']) ? 'text-gray-800 font-medium' : 'text-gray-500' }}">
                Pesanan Dibuat
            </div>
            <div class="text-xs text-gray-500">
                {{ date('d/m/Y H:i', strtotime($transaction->created_at)) }}
            </div>
        </div>

        <!-- Step 2: Payment -->
        <div class="text-center">
            <div
                class="w-6 h-6 sm:w-8 sm:h-8 {{ in_array($transaction->payment_status, ['processing', 'completed']) ? 'bg-pink-500 text-white' : 'bg-gray-200 text-gray-500' }} rounded-full flex items-center justify-center mx-auto mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
            </div>
            <div
                class="text-xs sm:text-sm {{ in_array($transaction->payment_status, ['processing', 'completed']) ? 'text-gray-800 font-medium' : 'text-gray-500' }}">
                Pembayaran
            </div>
            @if ($transaction->paid_at)
                <div class="text-xs text-gray-500">
                    {{ date('d/m/Y H:i', strtotime($transaction->paid_at)) }}
                </div>
            @else
                <div class="text-xs text-gray-500">-</div>
            @endif
        </div>

        <!-- Step 3: Completed -->
        <div class="text-center">
            <div
                class="w-6 h-6 sm:w-8 sm:h-8 {{ $transaction->payment_status == 'completed' ? 'bg-pink-500 text-white' : 'bg-gray-200 text-gray-500' }} rounded-full flex items-center justify-center mx-auto mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <div
                class="text-xs sm:text-sm {{ $transaction->payment_status == 'completed' ? 'text-gray-800 font-medium' : 'text-gray-500' }}">
                Selesai
            </div>
            @if ($transaction->completed_at)
                <div class="text-xs text-gray-500">
                    {{ date('d/m/Y H:i', strtotime($transaction->completed_at)) }}
                </div>
            @else
                <div class="text-xs text-gray-500">-</div>
            @endif
        </div>
    </div>
</div>
