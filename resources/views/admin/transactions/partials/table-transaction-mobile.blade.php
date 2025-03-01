<div class="p-4 space-y-4">
    @forelse($transactions as $transaction)
        <div class="bg-white rounded-lg shadow p-4">
            <div class="space-y-2">
                <div class="flex justify-between items-center">
                    <span class="font-semibold">#{{ $transaction->id }}</span>
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
                <div class="text-sm">{{ $transaction->user->name ?? 'N/A' }}</div>
                <div class="text-sm">Total: Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</div>
                <div class="text-sm">Tanggal: {{ $transaction->created_at->format('d M Y H:i') }}</div>
                <div class="pt-2">
                    <a href="{{ route('admin.transactions.show', $transaction->id) }}"
                        class="text-[#FF8FA4] hover:text-[#F542C8] text-sm">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center text-gray-500 p-4">Tidak ada data transaksi</div>
    @endforelse
</div>
