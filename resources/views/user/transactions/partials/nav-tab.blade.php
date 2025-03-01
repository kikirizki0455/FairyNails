<div class="flex flex-wrap md:flex-nowrap border-b overflow-x-auto whitespace-nowrap gap-x-4">
    <a href="{{ route('user.transactions') }}"
        class="px-4 py-3 font-semibold inline-block {{ !request('payment_status') ? 'text-pink-500 border-b-2 border-pink-500' : 'text-gray-500 hover:text-gray-700' }}">
        Semua
    </a>
    <a href="{{ route('user.transactions', ['payment_status' => 'pending']) }}"
        class="px-4 py-3 font-semibold inline-block {{ request('payment_status') == 'pending' ? 'text-pink-500 border-b-2 border-pink-500' : 'text-gray-500 hover:text-gray-700' }}">
        Menunggu Pembayaran
    </a>
    <a href="{{ route('user.transactions', ['payment_status' => 'process']) }}"
        class="px-4 py-3 font-semibold inline-block {{ request('payment_status') == 'process' ? 'text-pink-500 border-b-2 border-pink-500' : 'text-gray-500 hover:text-gray-700' }}">
        Diproses
    </a>
    <a href="{{ route('user.transactions', ['payment_status' => 'completed']) }}"
        class="px-4 py-3 font-semibold inline-block {{ request('payment_status') == 'completed' ? 'text-pink-500 border-b-2 border-pink-500' : 'text-gray-500 hover:text-gray-700' }}">
        Selesai
    </a>
    <a href="{{ route('user.transactions', ['payment_status' => 'cancelled']) }}"
        class="px-4 py-3 font-semibold inline-block {{ request('payment_status') == 'cancelled' ? 'text-pink-500 border-b-2 border-pink-500' : 'text-gray-500 hover:text-gray-700' }}">
        Dibatalkan
    </a>
</div>
