@foreach ($vouchers as $voucher)
    <div class="border rounded-lg p-4 hover:shadow-md transition-shadow duration-200">
        <div class="flex justify-between items-start mb-4">
            <h3 class="text-lg font-semibold text-[#FF8FA4]">{{ $voucher->name }}</h3>
            <span class="bg-pink-100 text-pink-800 px-2 py-1 rounded-full text-sm">
                {{ $voucher->points_required }} Poin
            </span>
        </div>
        <p class="text-gray-600 mb-4">{{ $voucher->description }}</p>
        <div class="space-y-2 text-sm mb-4">
            <div class="flex justify-between">
                <span>Jenis:</span>
                <span class="font-medium">
                    {{ $voucher->type == 'percentage_discount' ? 'Diskon' : 'Layanan Gratis' }}
                </span>
            </div>
            <div class="flex justify-between">
                <span>Minimum Transaksi:</span>
                <span class="font-medium">
                    Rp {{ number_format($voucher->minimum_transaction, 0, ',', '.') }}
                </span>
            </div>
        </div>
        <!-- Form Penukaran Voucher -->
        <form action="{{ route('user.collection-voucher') }}" method="POST">
            @csrf
            <input type="hidden" name="voucher_id" value="{{ $voucher->id }}">
            <button type="submit"
                class="w-full bg-[#FF8FA4] hover:bg-[#F542C8] text-white font-bold py-2 px-4 rounded-lg transition duration-300 {{ Auth::user()->points < $voucher->points_required ? 'opacity-50 cursor-not-allowed' : '' }}"
                {{ Auth::user()->points < $voucher->points_required ? 'disabled' : '' }}>
                Tukar Sekarang
            </button>
        </form>
    </div>
@endforeach
