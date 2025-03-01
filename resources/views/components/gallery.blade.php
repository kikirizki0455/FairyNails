<!-- Gallery Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-2 p-4">
    @foreach ($images as $index => $image)
        <div x-data="{
            imageLoaded: false,
            isVisible: false,
            init() {
                const observer = new IntersectionObserver(
                    ([entry]) => {
                        this.isVisible = entry.isIntersecting;
                        if (this.isVisible) {
                            observer.unobserve(this.$el);
                        }
                    }, { rootMargin: '50px', threshold: 0.1 }
                );
                observer.observe(this.$el);
            }
        }"
            class="relative rounded-lg overflow-hidden cursor-pointer group transition-all duration-300 hover:shadow-xl
            {{ $index == 0 ? 'sm:col-span-2 sm:row-span-2' : 'col-span-1 row-span-1' }}"
            onclick="openModal({{ $index }})">

            <!-- Skeleton Loader -->
            <div x-show ="!imageLoaded[0]" class="absolute inset-0 skeleton rounded-md">
                <div
                    class="w-full h-full rounded-md bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200 animate-shimmer">
                </div>
            </div>


            <!-- Tambahkan placeholder blur -->
            <template x-if="isVisible">
                <div class="relative w-full h-full">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                        data-src="{{ $image }}" alt="gallery-{{ $index }}"
                        class="lazyload w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                        style="aspect-ratio: {{ $index == 0 ? '16/9' : '4/3' }}" loading="lazy">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300">
                    </div>
                </div>
            </template>

        </div>
    @endforeach
</div>

<!-- Modal -->
<div id="imageModal" class="fixed inset-0 w-full h-full bg-black/90 z-50 hidden">
    <div class="relative w-full h-full flex items-center justify-center p-4">
        <!-- Close Button -->
        <button onclick="closeModal()"
            class="absolute top-4 right-4 text-white hover:text-gray-300 transition-colors z-50">
            <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Navigation Buttons -->
        <button onclick="prevImage()"
            class="absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 transition-colors">
            <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <button onclick="nextImage()"
            class="absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 transition-colors">
            <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        <!-- Image Container -->
        <div class="w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative aspect-[2/3] w-full">
                <img id="modalImage" src="" class="absolute inset-0 w-full h-full object-contain">
            </div>
        </div>
    </div>
</div>

<script>
    let images = @json($images);
    let currentIndex = 0;

    function openModal(index) {
        currentIndex = index;
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');

        modalImage.src = images[currentIndex];
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        document.getElementById('imageModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        document.getElementById('modalImage').src = images[currentIndex];
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        document.getElementById('modalImage').src = images[currentIndex];
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (document.getElementById('imageModal').classList.contains('hidden')) return;

        switch (e.key) {
            case 'ArrowLeft':
                prevImage();
                break;
            case 'ArrowRight':
                nextImage();
                break;
            case 'Escape':
                closeModal();
                break;
        }
    });
    // Close modal when clicking outside the image
    document.getElementById('imageModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>
