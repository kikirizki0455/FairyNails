<!-- User Dropdown -->
<div class="flex items-center justify-between h-16 shadow-md px-4">
    <!-- Tombol Toggle untuk Sidebar -->
    <button @click="$store.sidebar.toggle()" class="p-2 bg-[#FF8FA4] rounded-md text-white shadow-lg md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
    </button>


    <div class="content flex justify-end w-full">
        <!-- Poin User -->
        <div class="flex items-center gap-x-2 text-[#ff8fa4]">
            <img src="{{ asset('assets/icon/star.png') }}" alt="star" class="w-6 h-6">
            <h1 class="text-sm sm:text-base">{{ Auth::user()->points }} Point</h1>
        </div>

        <!-- Dropdown -->
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button
                    class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-[#ff8fa4] bg-white rounded-md hover:text-[#292352] transition duration-150 ease-in-out">
                    <!-- Avatar User -->
                    <img src="{{ asset('assets/icon/user.png') }}" alt="User" class="w-6 h-6">
                    <span class="text-sm sm:text-base">{{ Auth::user()->name }}</span>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
        {{ $slot }}
    </div>
</div>
