<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    <!-- Input Pencarian -->
    <div class="col-span-1">
        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari Produk</label>
        <input type="text" id="search" placeholder="Masukkan nama produk..."
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
    </div>

    <!-- Dropdown Kategori -->
    <div class="col-span-1">
        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
        <select id="category"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
            <option value="">Semua Kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category }}">{{ $category }}</option>
            @endforeach

        </select>
    </div>

    <!-- Dropdown Urutkan -->
    <div class="col-span-1">
        <label for="sort" class="block text-sm font-medium text-gray-700 mb-1">Urutkan</label>
        <select id="sort"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
            <option value="newest">Terbaru</option>
            <option value="price_low">Harga: Rendah ke Tinggi</option>
            <option value="price_high">Harga: Tinggi ke Rendah</option>
        </select>
    </div>

    <!-- Tombol Filter -->
    <div class="col-span-1 flex items-end">
        <button id="filter-button"
            class="w-full bg-[#FF8FA4] hover:bg-[#EF557A] text-white px-6 py-2 rounded-lg font-medium transition-colors">
            Filter
        </button>
    </div>
</div>

<!-- Loading Indicator -->
<div id="loading" class="hidden mt-4 text-center">
    <div class="inline-block animate-spin rounded-full h-6 w-6 border-t-2 border-b-2 border-pink-500"></div>
    <span class="ml-2 text-gray-600">Memuat...</span>
</div>

<!-- Tempat Menampilkan Hasil Filter -->
<div id="product-list" class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    <!-- Hasil produk akan ditampilkan di sini -->
</div>

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const categorySelect = document.getElementById('category');
            const sortSelect = document.getElementById('sort');
            const filterButton = document.getElementById('filter-button');
            const loadingIndicator = document.getElementById('loading');
            const productList = document.getElementById('product-list');

            let debounceTimeout;
            let currentRequest = null;

            // Fungsi untuk fetch produk dengan parameter filter
            function fetchProducts() {
                const query = searchInput.value.trim();
                const category = categorySelect.value;
                const sort = sortSelect.value;

                // Batalkan request sebelumnya jika masih berjalan
                if (currentRequest) {
                    currentRequest.abort();
                }

                // Tampilkan loading indicator
                loadingIndicator.classList.remove('hidden');

                // Buat URL dengan parameter filter
                const url =
                    `/produk/filter?query=${encodeURIComponent(query)}&category=${encodeURIComponent(category)}&sort=${encodeURIComponent(sort)}`;

                // Gunakan Fetch API dengan AbortController
                const controller = new AbortController();
                const signal = controller.signal;
                currentRequest = controller;

                fetch(url, {
                        signal
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok: ' + response.status);
                        }
                        return response.text();
                    })
                    .then(data => {
                        if (data.trim() === '') {
                            productList.innerHTML =
                                '<div class="col-span-full text-center py-8"><p class="text-gray-600">Tidak ada produk yang ditemukan.</p></div>';
                        } else {
                            productList.innerHTML = data;
                        }
                        currentRequest = null;
                    })
                    .catch(error => {
                        if (error.name !== 'AbortError') {
                            console.error('Error:', error);
                            productList.innerHTML =
                                '<div class="col-span-full text-center py-8"><p class="text-red-500">Terjadi kesalahan saat memuat data.</p></div>';
                        }
                    })
                    .finally(() => {
                        // Sembunyikan loading indicator jika ini adalah request terakhir
                        if (currentRequest === null) {
                            loadingIndicator.classList.add('hidden');
                        }
                    });
            }

            // Debounce untuk input pencarian
            searchInput.addEventListener('input', function() {
                clearTimeout(debounceTimeout);
                debounceTimeout = setTimeout(fetchProducts, 500); // Delay 500ms
            });

            // Event listener untuk dropdown kategori dan urutkan
            categorySelect.addEventListener('change', fetchProducts);
            sortSelect.addEventListener('change', fetchProducts);

            // Event listener untuk tombol filter
            filterButton.addEventListener('click', fetchProducts);

            // Pastikan halaman tidak langsung filter saat pertama kali dimuat
            // kecuali jika ada parameter URL yang membutuhkannya
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('query') || urlParams.has('category') || urlParams.has('sort')) {
                // Set nilai input berdasarkan parameter URL jika ada
                if (urlParams.has('query')) {
                    searchInput.value = urlParams.get('query');
                }
                if (urlParams.has('category')) {
                    categorySelect.value = urlParams.get('category');
                }
                if (urlParams.has('sort')) {
                    sortSelect.value = urlParams.get('sort');
                }

                // Lakukan filter
                fetchProducts();
            } else {
                // Tampilkan pesan awal
                productList.innerHTML =
                    '<div class="col-span-full text-center py-8"><p class="text-gray-600">Silakan masukkan pencarian atau pilih kategori.</p></div>';
            }
        });
    </script>
@endpush
