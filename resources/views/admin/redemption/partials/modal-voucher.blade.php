<div class="p-6 text-gray-800">
    <h3 class="text-2xl font-bold  mb-6">Buat Voucher Baru</h3>
    <form action="{{ route('admin.redemption.store') }}" method="POST" x-data="{ voucherType: '{{ old('type', 'percentage_discount') }}' }">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama Voucher -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Nama Voucher <span
                        class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FF8FA4] @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kode Voucher -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Kode Voucher <span
                        class="text-red-500">*</span></label>
                <input type="text" name="code" value="{{ old('code') }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FF8FA4] @error('code') border-red-500 @enderror">
                @error('code')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tipe Voucher -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Tipe Voucher <span
                        class="text-red-500">*</span></label>
                <select name="type" x-model="voucherType" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FF8FA4] @error('type') border-red-500 @enderror">
                    <option value="percentage_discount">Diskon Persentase</option>
                    <option value="free_service">Layanan Gratis</option>
                </select>
                @error('type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Poin Dibutuhkan -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Poin Dibutuhkan <span
                        class="text-red-500">*</span></label>
                <input type="number" name="points_required" value="{{ old('points_required') }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FF8FA4] @error('points_required') border-red-500 @enderror">
                @error('points_required')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nilai Diskon (conditional) -->
            <div class="space-y-2" x-show="voucherType === 'percentage_discount'">
                <label class="block text-sm font-medium text-gray-700">Persentase Diskon (%) <span
                        class="text-red-500">*</span></label>
                <input type="number" name="value" value="{{ old('value') }}" step="0.01"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FF8FA4] @error('value') border-red-500 @enderror"
                    x-bind:required="voucherType === 'percentage_discount'">
                @error('value')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kategori Produk (conditional) -->
            <div class="space-y-2" x-show="voucherType === 'free_service'">
                <label class="block text-sm font-medium text-gray-700">Kategori Layanan <span
                        class="text-red-500">*</span></label>
                <input type="text" name="product_category" value="{{ old('product_category') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FF8FA4] @error('product_category') border-red-500 @enderror"
                    x-bind:required="voucherType === 'free_service'">
                @error('product_category')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Minimum Transaksi -->
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Minimum Transaksi (Rp) <span
                        class="text-red-500">*</span></label>
                <input type="number" name="minimum_transaction" value="{{ old('minimum_transaction', 60000) }}"
                    required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FF8FA4] @error('minimum_transaction') border-red-500 @enderror">
                @error('minimum_transaction')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="space-y-2 md:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" rows="3"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FF8FA4] @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-8 flex justify-end gap-4">
            <button type="reset" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">
                Reset
            </button>
            <button type="submit"
                class="bg-[#FF8FA4] hover:bg-[#F542C8] text-white px-6 py-2 rounded-lg transition duration-300">
                Simpan Voucher
            </button>
        </div>
    </form>
</div>
