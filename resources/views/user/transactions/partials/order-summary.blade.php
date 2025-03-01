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

<div class="bg-white rounded-lg shadow-sm p-4 md:p-6 sticky top-20 mt-6">
    <h2 class="text-lg font-semibold mb-4">Ringkasan Pembayaran</h2>

    <div class="space-y-3 mb-4">
        <div class="flex justify-between">
            <span>Subtotal ({{ $totalItems }} items)</span>
            <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>

        <div
            class="flex justify-between {{ in_array($level, ['bronze', 'silver', 'gold', 'platinum']) ? 'text-green-600' : 'text-black' }}">
            <span>Discount Level ({{ $level }})</span>
            <span>- Rp {{ number_format($xpDiscountAmount, 0) }}</span>
        </div>

        <div class="flex justify-between text-green-600">
            <span>Diskon Voucher</span>
            <span>- Rp {{ $voucherDiscountAmount ?? '0' }}</span>
        </div>
    </div>

    <div class="mb-6 space-y-3">
        <h3 class="font-medium mb-2">Discount</h3>

        <div class="border rounded-lg p-3 flex justify-between bg-gray-50">
            <span>Voucher</span>
            <span>{{ $voucherName }}</span>
        </div>

        <div class="border rounded-lg p-3 flex justify-between bg-gray-50">
            <span>Tipe Voucher</span>
            <span>{{ $voucherType == 'percentage_discount' ? 'Diskon Voucher' : 'Layanan Gratis' }}</span>
        </div>

        <div class="border rounded-lg p-3 flex justify-between bg-gray-50">
            <span>Level discount ({{ $level }})</span>
            <span>{{ $xpDiscount }}%</span>
        </div>
    </div>

    <div class="border-t pt-4 mb-6">
        <div class="flex justify-between font-bold text-lg">
            <span>Total</span>
            <span>Rp {{ number_format($totalAfterDiscount, 0, ',', '.') }}</span>
        </div>
    </div>

    @if ($transaction->payment_status == 'pending' || $transaction->payment_status == 'processing')
        <a href="{{ route('user.pay', $transaction->id) }}"
            class="block w-full bg-pink-500 hover:bg-pink-600 text-white py-3 rounded-lg text-center font-semibold transition">
            Bayar Sekarang
        </a>
    @else
        <p class="block w-full text-pink-500 py-3 text-center font-semibold">
            Terima Kasih Sudah Percaya Dengan Fairy Nails, Kami Tunggu Di Lain Waktu
        </p>
    @endif
</div>
