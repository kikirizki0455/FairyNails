@if (count($userVouchers) > 0)
    <form action="{{ route('cart.apply-voucher') }}" method="POST">
        @csrf
        <select name="voucher_id"
            class="w-full px-4 py-2 border rounded-lg mb-2 focus:outline-none focus:ring-2 focus:ring-pink-300">
            <option value="">-- Pilih Voucher --</option>
            @foreach ($userVouchers as $userVoucher)
                <option value="{{ $userVoucher->voucher->id }}"
                    {{ $selectedVoucherId == $userVoucher->voucher->id ? 'selected' : '' }}>
                    {{ $userVoucher->voucher->code }} -
                    {{ $userVoucher->voucher->name }}
                </option>
            @endforeach
        </select>
        @if (session('selectedVoucher'))
            <div class="bg-green-100 p-4 rounded-lg mt-4">
                <h3 class="text-green-800 font-semibold">Voucher Diterapkan</h3>
                <p class="text-sm text-gray-700">
                    {{ session('selectedVoucher')['description'] }}
                </p>
                <p class="text-sm"><strong>Jenis:</strong>
                    {{ session('selectedVoucher')['type'] == 'percentage_discount' ? 'Diskon Persentase' : 'Gratis Layanan' }}
                </p>
                <p class="text-sm"><strong>Nilai Voucher:</strong>
                    @if (session('selectedVoucher')['type'] == 'percentage_discount')
                        {{ intval(session('selectedVoucher')['value'] / 1000) }}%
                    @else
                        Rp
                        {{ number_format(session('selectedVoucher')['value'], 0, ',', '.') }}
                    @endif
                </p>
            </div>
        @endif
        <button type="submit" class="w-full bg-gray-200 hover:bg-gray-300 py-2 rounded-lg text-gray-800">
            Terapkan Voucher
        </button>
    </form>
@else
    <div class="text-gray-500 mb-2">Anda belum memiliki voucher</div>
    <a href="{{ route('user.redeem') }}" class="inline-block text-pink-500 hover:underline">
        Klaim voucher sekarang
    </a>
@endif
