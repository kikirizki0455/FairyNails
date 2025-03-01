<!-- Filter dan Search Bar untuk Mobile -->
<div class="bg-white rounded-lg shadow-sm p-4 border border-gray-200 mb-6">
    <div class="grid grid-cols-1 gap-4">
        <!-- Dropdown Level Filter -->
        <div>
            <label for="level-filter-mobile" class="block text-sm font-semibold text-gray-700 mb-1">Filter Berdasarkan
                Level:</label>
            <select id="level-filter-mobile" name="level"
                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-[#F542C8] focus:border-[#F542C8] transition"
                onchange="filterByLevel(this.value)">
                <option value="">Semua Level</option>
                @foreach ($levels as $level)
                    <option value="{{ $level }}" {{ request('level') == $level ? 'selected' : '' }}>
                        Level {{ $level }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Search Bar -->
        <div>
            <form action="{{ route('admin.member') }}" method="GET" class="relative">
                <input type="hidden" name="level" value="{{ request('level') }}">
                <input type="text" name="search" placeholder="Cari berdasarkan nama..."
                    value="{{ request('search') }}"
                    class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-[#F542C8] focus:border-[#F542C8] transition">
                <button type="submit"
                    class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-[#F542C8] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
