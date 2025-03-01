<div class="space-y-4">
    @php
        $redeemProducts = [
            [
                'id' => 1,
                'name' => 'Voucher Diskon 10%',
                'points' => 35,
            ],
            [
                'id' => 2,
                'name' => 'Voucher Diskon 20%',
                'points' => 50,
            ],
            [
                'id' => 3,
                'name' => 'Free Press On Nails',
                'points' => 80,
            ],
        ];
    @endphp

    @foreach ($redeemProducts as $product)
        <div
            class="border border-gray-200 rounded-lg p-4 relative {{ (auth()->user()->points ?? 0) >= $product['points'] ? 'bg-orange-50' : 'bg-gray-50 opacity-70' }}">
            <div class="flex justify-between mb-2">
                <span class="font-semibold text-gray-800">{{ $product['name'] }}</span>
                <span class="font-medium text-orange-500">{{ $product['points'] }} poin</span>
            </div>
            @if ((auth()->user()->points ?? 0) >= $product['points'])
                <a href="{{ route('user.redeem', ['id' => $product['id']]) }}"
                    class="mt-2 w-full bg-[#FF8FA4] text-white text-center p-2 rounded-lg text-xs font-medium hover:bg-[#F542C8] transition duration-300">
                    Tukar Poin
                </a>
            @else
                <button disabled
                    class="mt-2 w-full bg-gray-300 text-white text-center p-2 rounded-lg text-xs font-medium cursor-not-allowed">
                    Tukar Poin
                </button>
            @endif
        </div>
    @endforeach

    <!-- Tombol "Lihat Semua Penawaran" -->
    <a href="{{ route('user.redeem') }}" class="text-[#FF8FA4] hover:underline text-sm flex items-center justify-center">
        Lihat Semua Penawaran
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </a>
</div>
