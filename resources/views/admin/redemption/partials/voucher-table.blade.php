<div class="overflow-auto rounded-lg border border-gray-200">
    <!-- Tampilan desktop -->
    <table class="min-w-full divide-y divide-gray-200 hidden md:table">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Voucher
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Value</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Poin
                    Dibutuhkan</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Min.
                    Transaksi</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($vouchers as $voucher)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="text-sm font-semibold text-gray-900">{{ $voucher->name }}</div>
                        <div class="text-sm text-gray-500 mt-1">{{ $voucher->description }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-2 py-1 bg-gray-100 text-gray-800 rounded-md font-mono text-sm">{{ $voucher->code }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-3 py-1 rounded-full text-sm font-medium {{ $voucher->type === 'percentage_discount' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ $voucher->type === 'percentage_discount' ? 'Diskon' : 'Layanan Gratis' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-3 py-1 rounded-full text-sm font-medium 
                            {{ $voucher->type === 'percentage_discount' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ $voucher->value !== null ? number_format($voucher->value, 0) . '%' : '-' }}
                        </span>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-semibold text-gray-900">
                        {{ number_format($voucher->points_required, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-semibold text-gray-900">
                        Rp{{ number_format($voucher->minimum_transaction, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center space-x-4">
                            <button type="button" onclick="openEditModal('{{ $voucher->id }}')"
                                class="text-[#FF8FA4] hover:text-[#F542C8] transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </button>
                            <form method="POST" action="#">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium text-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus voucher ini?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tampilan mobile (card-based) -->
    <div class="grid grid-cols-1 gap-3 md:hidden">
        @foreach ($vouchers as $voucher)
            <div class="bg-white p-3 rounded-lg shadow-sm border border-gray-200 text-sm">
                <div class="flex items-start mb-3">
                    <div class="w-2/3">
                        <h3 class="text-base font-semibold text-gray-900 truncate">{{ $voucher->name }}</h3>
                        <p class="text-xs text-gray-500 truncate">{{ $voucher->description }}</p>
                    </div>
                    <span
                        class="px-2 py-1 rounded-full text-xs font-medium {{ $voucher->type === 'percentage_discount' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                        {{ $voucher->type === 'percentage_discount' ? 'Diskon' : 'Layanan Gratis' }}
                    </span>
                </div>

                <div class="mt-2 space-y-1 text-xs">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Kode:</span>
                        <span
                            class="px-2 py-1 bg-gray-100 text-gray-800 rounded-md font-mono truncate">{{ $voucher->code }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Poin Dibutuhkan:</span>
                        <span
                            class="font-semibold text-gray-900">{{ number_format($voucher->points_required, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Min. Transaksi:</span>
                        <span
                            class="font-semibold text-gray-900">Rp{{ number_format($voucher->minimum_transaction, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="mt-3 flex justify-end space-x-2">
                    <button type="button" onclick="openEditModal('{{ $voucher->id }}')"
                        class="text-[#FF8FA4] hover:text-[#F542C8] transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                    </button>
                    <form method="POST" action="#">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900 font-medium"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus voucher ini?')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</div>
