<div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mb-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b bg-gradient-to-r from-[#FF8FA4] to-[#F542C8]">
            <h2 class="text-xl font-semibold text-white">Total Pendapatan</h2>
        </div>
        <div class="p-6">
            <div class="text-center">
                <h3 class="text-3xl font-bold text-gray-800">Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                </h3>
                <p class="text-gray-500 mt-2">Pendapatan Keseluruhan</p>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-6">
                <div class="text-center p-4 bg-green-50 rounded-lg">
                    <p class="text-sm text-gray-500">Bulan Ini</p>
                    <p class="text-xl font-bold text-green-600">Rp
                        {{ number_format($monthlyRevenue, 0, ',', '.') }}</p>
                </div>
                <div class="text-center p-4 bg-blue-50 rounded-lg">
                    <p class="text-sm text-gray-500">Hari Ini</p>
                    <p class="text-xl font-bold text-blue-600">Rp {{ number_format($dailyRevenue, 0, ',', '.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
