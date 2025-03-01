<!-- Nama Produk -->
<div class="space-y-2">
    <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
    <input type="text" name="name" id="name" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FF8FA4] focus:border-[#FF8FA4] transition duration-300"
        placeholder="Masukkan nama produk">
    @error('name')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Kategori -->
<div class="space-y-2">
    <label class="block text-sm font-medium text-gray-700">Kategori</label>
    <select name="category" id="category" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FF8FA4] focus:border-[#FF8FA4] transition duration-300">
        <option value="">Pilih Kategori</option>
        <option value="Nail Art">Nail Art</option>
        <option value="Nail Extension">Extension</option>
        <option value="Press On Nails">Press On Nails</option>
    </select>
    @error('category')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Harga -->
<div class="space-y-2">
    <label class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
    <input type="number" name="price" id="price" required
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FF8FA4] focus:border-[#FF8FA4] transition duration-300"
        placeholder="Contoh: 150000">
    @error('price')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Deskripsi -->
<div class="space-y-2 md:col-span-2">
    <label class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
    <textarea name="description" id="description" rows="4"
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FF8FA4] focus:border-[#FF8FA4] transition duration-300"
        placeholder="Masukkan deskripsi produk"></textarea>
    @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
