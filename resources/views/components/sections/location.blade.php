<!-- Tambahkan kode ini di section-location -->
<div class="section-location mt-[100px]">
    <div class="title">
        <x-heading title="Location"></x-heading>
        <!-- Tambahkan placeholder map -->
        <div class="relative mt-12">

            {{-- skeleton loader --}}
            <div x-show ="!imageLoaded[0]" class="absolute inset-0 skeleton rounded-md">
                <div
                    class="w-full h-full rounded-md bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200 animate-shimmer">
                </div>
            </div>

            <div id="map-placeholder" class="w-full h-[400px] bg-gray-100 flex items-center justify-center">
                <span class="text-gray-500">Memuat peta...</span>
            </div>
            <div id="map" class="w-full h-[400px] border border-black hidden"></div>
        </div>
    </div>
</div>

<!-- Tambahkan Leaflet.js -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Tambahkan script untuk memuat peta -->
<script>
    let mapLoaded = false;

    function loadLeafletMap() {
        if (mapLoaded) return;
        mapLoaded = true;

        // Ganti koordinat sesuai lokasi Anda
        const location = [-6.971787, 107.761314];

        // Sembunyikan placeholder dan tampilkan peta
        document.getElementById('map-placeholder').style.display = 'none';
        document.getElementById('map').style.display = 'block';

        // Inisialisasi peta
        var map = L.map('map').setView(location, 15);

        // Tambahkan layer peta OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Tambahkan marker
        L.marker(location).addTo(map)
            .bindPopup(
                '<b>Fairy Nails Art</b><br>Jl. Kaktus I No.75, Rancaekek Wetan, Kec. Rancaekek, Kabupaten Bandung, Jawa Barat 40394<br>No. Telepon: 085157226285'
            )
            .openPopup();
    }

    // Lazy load menggunakan Intersection Observer
    document.addEventListener('DOMContentLoaded', () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    loadLeafletMap();
                    observer.disconnect();
                }
            });
        }, {
            threshold: 0.1
        });

        observer.observe(document.querySelector('.section-location'));
    });
</script>
