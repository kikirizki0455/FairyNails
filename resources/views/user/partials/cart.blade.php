<div x-data="{ cartOpen: false, cartCount: {{ count(session()->get('cart', [])) }} }">
    <!-- Cart Icon Button -->
    <button @click="cartOpen = !cartOpen"
        class="relative p-2 text-[#ff8fa4] hover:text-[#292352] transition-colors duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <!-- Cart Badge -->
        <span x-show="cartCount > 0"
            class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-[#FF8FA4] rounded-full">
            <span x-text="cartCount"></span>
        </span>
    </button>

    <!-- Cart Dropdown Panel -->
    <div x-show="cartOpen" @click.away="cartOpen = false" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute right-0 mt-2 w-72 bg-white rounded-lg shadow-xl z-50 overflow-hidden">
        <div class="px-4 py-3 border-b border-gray-200">
            <h3 class="text-sm font-medium text-gray-800">Keranjang Belanja</h3>
        </div>

        <!-- Cart Items -->
        <div class="max-h-96 overflow-y-auto">
            @if (count(session()->get('cart', [])) > 0)
                @foreach (session()->get('cart', []) as $id => $details)
                    <div class="flex items-center px-4 py-3 hover:bg-gray-50 border-b border-gray-100">
                        <div class="ml-3 flex-1">
                            <p class="text-sm font-medium text-gray-800 truncate">{{ $details['name'] }}
                            </p>
                            <p class="text-xs text-gray-500">{{ $details['quantity'] }} x Rp
                                {{ number_format($details['price'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="px-4 py-6 text-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-10 w-10 text-gray-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <p class="mt-2 text-sm">Keranjang belanja masih kosong</p>
                </div>
            @endif
        </div>

        <!-- Cart Footer -->
        @if (count(session()->get('cart', [])) > 0)
            <div class="px-4 py-3 bg-gray-50">
                <div class="flex justify-between text-sm font-medium text-gray-800 mb-3">

                </div>
                <div class="grid grid-cols-2 gap-2">
                    <a href="{{ route('user.cart') }}"
                        class="px-4 py-2 text-xs font-medium text-center text-gray-600 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors duration-200">
                        Lihat Keranjang
                    </a>

                    <form action="{{ route('user.checkout', session('transaction_id')) }}" method="POST">
                        @csrf
                        <input type="hidden" name="transaction_data"
                            value="{{ json_encode(session('transactionDetails')) }}">
                        <button type="submit"
                            class="px-4 py-2 text-xs font-medium text-center text-white bg-[#FF8FA4] rounded-md hover:bg-[#f07a92] transition-colors duration-200">
                            Checkout
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>
</div>
