<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b bg-gradient-to-r from-[#FF8FA4] to-[#F542C8]">
            <h2 class="text-xl font-semibold text-white">Pendapatan Bulanan ({{ now()->format('Y') }})</h2>
        </div>
        <div class="p-6">
            <canvas id="revenueChart" height="300"></canvas>
        </div>
    </div>

    <!-- Grafik Kategori Produk Terjual -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b bg-gradient-to-r from-[#FF8FA4] to-[#F542C8]">
            <h2 class="text-xl font-semibold text-white">Kategori Produk Terjual</h2>
        </div>
        <div class="p-6">
            <canvas id="productCategoryChart" height="300"></canvas>
        </div>
    </div>
</div>
