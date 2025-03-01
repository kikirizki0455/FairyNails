@forelse($userVouchers as $userVoucher)
    <div class="border rounded-lg p-4 hover:shadow-md transition-shadow duration-200">
        <div class="flex justify-between items-start mb-4">
            <h3 class="text-lg font-semibold text-[#FF8FA4]">{{ $userVoucher->voucher->name }}</h3>
            <span
                class="{{ $userVoucher->is_used ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }} px-2 py-1 rounded-full text-sm">
                {{ $userVoucher->is_used ? 'Digunakan' : 'Aktif' }}
            </span>
        </div>
        <div class="space-y-2 text-sm">
            <div class="flex justify-between">
                <span>Kode:</span>
                <span class="font-mono font-bold">{{ $userVoucher->voucher->code }}</span>
            </div>
            <div class="flex justify-between">
                <span>Kadaluarsa:</span>
                <span class="font-medium">
                    {{ $userVoucher->expire_date ? \Carbon\Carbon::parse($userVoucher->expire_date)->format('d M Y') : '-' }}

                </span>
            </div>
        </div>
    </div>
@empty
    <div class="col-span-full text-center py-8">
        <p class="text-gray-500">Belum ada voucher yang dimiliki</p>
    </div>
@endforelse
