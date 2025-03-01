<nav class="bg-white shadow-md">
    <div class="max-w-full sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Tombol Sidebar Mobile -->
            <div class="md:hidden">
                <button @click="open = !open" class="p-4 text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>

            <!-- Informasi Point -->
            <div class="flex gap-x-2 text-[#ff8fa4]">
                <img src="{{ asset('assets/icon/star.png') }}" alt="start" class="w-6 h-6">
                <h1>{{ Auth::user()->points }} Point</h1>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-[#ff8fa4] bg-white rounded-md hover:text-[#292352] transition ease-in-out duration-150">
                            <img src="{{ asset('assets/icon/user.png') }}" alt="User" class="w-5 h-5">
                            <span>{{ Auth::user()->name }}</span>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">Log
                                Out</x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
