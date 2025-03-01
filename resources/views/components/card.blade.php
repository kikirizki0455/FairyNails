<div class="card w-full md:w-[300px] lg:w-[355px] min-h-[275px] text-center flex flex-col items-center justify-center">
    <div class="title w-full">
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
        }" class="icon mb-4 relative">
            @if (isset($image) && $image)
                <!-- Skeleton -->
                <div x-show="!imageLoaded && isVisible" class="w-[300px] h-[350px] rounded-2xl m-2 overflow-hidden">
                    <div class="w-full h-full bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200 animate-shimmer">
                    </div>
                </div>

                <!-- Image -->
                <template x-if="isVisible">
                    <img :src="isVisible ? '{{ asset($image) }}' : ''" alt="{{ $title }}"
                        class="w-[300px] h-[350px] rounded-2xl m-2 shadow-xl mx-auto p-2 border-2 border-[#272635] object-cover transition-opacity duration-300"
                        :class="{ 'opacity-0': !imageLoaded, 'opacity-100': imageLoaded }" @load="imageLoaded = true">
                </template>
            @else
                <!-- Skeleton untuk Icon -->
                <div x-show="!imageLoaded && isVisible"
                    class="w-[80px] h-[80px] md:w-[100px] md:h-[100px] lg:w-[120px] lg:h-[120px] mx-auto rounded-full overflow-hidden">
                    <div class="w-full h-full bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200 animate-shimmer">
                    </div>
                </div>

                <!-- Icon -->
                <template x-if="isVisible">
                    <img :src="isVisible ? '{{ asset($icon) }}' : ''" alt="{{ $title }}"
                        class="w-[80px] h-[80px] md:w-[100px] md:h-[100px] lg:w-[120px] lg:h-[120px] mx-auto rounded-full p-2 border-2 border-black object-contain transition-opacity duration-300"
                        :class="{ 'opacity-0': !imageLoaded, 'opacity-100': imageLoaded }" @load="imageLoaded = true">
                </template>
            @endif

            <!-- Title -->
            <h1 class="mt-4 mb-3 text-lg md:text-xl lg:text-2xl text-[#292352] font-semibold px-4">
                {{ $title }}
            </h1>
        </div>

        <!-- Description -->
        <div x-data="{ isVisible: false }" x-init="setTimeout(() => {
            const observer = new IntersectionObserver(
                ([entry]) => {
                    isVisible = entry.isIntersecting;
                    if (isVisible) observer.unobserve($el);
                }, { rootMargin: '50px', threshold: 0.1 }
            );
            observer.observe($el);
        }, 100)"
            class="description text-sm md:text-base text-[#272635] px-4 transition-opacity duration-300"
            :class="{ 'opacity-0': !isVisible, 'opacity-100': isVisible }">
            <p>{{ $description }}</p>
        </div>
    </div>
</div>
