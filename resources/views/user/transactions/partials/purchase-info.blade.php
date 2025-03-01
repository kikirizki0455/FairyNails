@foreach ($transaction->transactionDetails as $detail)
    <div class="flex flex-col md:flex-row border-b pb-4 last:border-0 last:pb-0 md:items-center">
        <div class="ml-0 md:ml-4 flex-grow">
            <h3 class="font-medium text-lg md:text-base">{{ $detail->product->name }}</h3>
            <p class="text-sm text-gray-500">{{ $detail->product->category }}</p>
            <div class="flex flex-col md:flex-row justify-between mt-1 text-sm">
                <span>{{ $detail->quantity }} x Rp {{ number_format($detail->price, 0, ',', '.') }}</span>
                <span class="font-medium">Rp {{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>
@endforeach

<div class="bg-white rounded-lg shadow-sm p-4 md:p-6 mt-6">
    <h2 class="text-lg font-semibold mb-4">Informasi Pembelian</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <h3 class="font-medium text-gray-500 mb-1">Nama</h3>
            <p>{{ $transaction->user->name ?? 'Nama tidak tersedia' }}</p>
        </div>
        <div>
            <h3 class="font-medium text-gray-500 mb-1">Point</h3>
            <p>{{ $transaction->points_earned ?? 'Point Belum Tersedia' }}</p>
        </div>
        <div>
            <h3 class="font-medium text-gray-500 mb-1">Nomor Telepon</h3>
            <p>{{ $transaction->user->phone ?? 'Nomor telepon tidak tersedia' }}</p>
        </div>
        <div>
            <h3 class="font-medium text-gray-500 mb-1">Exp</h3>
            <p>{{ $transaction->xp_earned ?? 'Exp tidak tersedia' }}</p>
        </div>
        <div>
            <h3 class="font-medium text-gray-500 mb-1">Voucher</h3>
            <p>{{ session('cart_voucher')->name ?? 'Voucher tidak tersedia' }}</p>
        </div>
        <div>
            <h3 class="font-medium text-gray-500 mb-1">Level</h3>
            <p>{{ $transaction->user->level ?? 'Level tidak tersedia' }}</p>
        </div>
    </div>

    @if ($transaction->notes)
        <div class="mt-4 pt-4 border-t">
            <h3 class="font-medium text-gray-500 mb-1">Catatan</h3>
            <p>{{ $transaction->notes }}</p>
        </div>
    @endif
</div>
