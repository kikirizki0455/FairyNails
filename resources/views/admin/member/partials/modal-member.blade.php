<div class="p-6 text-white">
    <h3 class="text-2xl font-bold  mb-4">Edit user</h3>

    <form action="{{ route('admin.product.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label class="block text-sm font-medium">Nama Produk</label>
                <input type="text" name="name" value="{{ $user->name }}"
                    class="w-full px-4 py-2 border text-gray-600 rounded-lg focus:ring-2 focus:ring-[#FF8FA4]">
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-medium">Description</label>
                <input type="text" name="description" value="{{ $user->description }}"
                    class="w-full px-4 py-2 border text-gray-600 rounded-lg focus:ring-2 focus:ring-[#FF8FA4]">
            </div>
            <!-- Kategori -->
            <div class="space-y-2">
                <label class="block text-sm font-medium ">Kategori</label>
                <select name="category" id="category" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FF8FA4] text-gray-600 focus:border-[#FF8FA4] transition duration-300">
                    <option value="">Pilih Kategori</option>
                    <option value="Nail Art">Nail Art</option>
                    <option value="Nail Extension">Extension</option>
                    <option value="Press On Nails">Press On Nails</option>
                </select>
                @error('category')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-medium">Price</label>
                <input type="text" name="price" value="{{ number_format($user->price, 0, ',', '.') }}"
                    class="w-full px-4 py-2 border text-gray-600 rounded-lg focus:ring-2 focus:ring-[#FF8FA4]">
            </div>

            <!-- Tambahkan field lainnya -->
        </div>

        <div class="mt-6 flex justify-end gap-4">
            <button type="button" onclick="closeEditModal('{{ $user->id }}')"
                class="px-6 py-2 border border-gray-300 rounded-lg">
                Batal
            </button>
            <button type="submit" class="bg-[#FF8FA4] hover:bg-[#F542C8] text-white px-6 py-2 rounded-lg">
                Simpan
            </button>
        </div>
    </form>
</div>
