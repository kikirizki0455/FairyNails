<nav class="mt-8 flex flex-col gap-y-4 px-2">
    <a href="{{ route('user.dashboard') }}"
        class="flex items-center py-2.5 px-3 rounded transition duration-200 hover:bg-[#292352]">
        <img src="{{ asset('assets/icon/home.png') }}" alt="dashboard" class="w-6 h-6">
        <span x-show="!$store.sidebar.collapsed" class="ml-3">Dashboard</span>
    </a>
    <a href="{{ route('user.product') }}"
        class="flex items-center py-2.5 px-3 rounded transition duration-200 hover:bg-[#292352]">
        <img src="{{ asset('assets/icon/product.png') }}" alt="product" class="w-6 h-6">
        <span x-show="!$store.sidebar.collapsed" class="ml-3">Product</span>
    </a>
    <a href="{{ route('user.transactions') }}"
        class="flex items-center py-2.5 px-3 rounded transition duration-200 hover:bg-[#292352]">
        <img src="{{ asset('assets/icon/transaction.png') }}" alt="transaction" class="w-6 h-6">
        <span x-show="!$store.sidebar.collapsed" class="ml-3">Transactions</span>
    </a>
    <a href="{{ route('user.redeem') }}"
        class="flex items-center py-2.5 px-3 rounded transition duration-200 hover:bg-[#292352]">
        <img src="{{ asset('assets/icon/redeem.png') }}" alt="redeem" class="w-6 h-6">
        <span x-show="!$store.sidebar.collapsed" class="ml-3">Redeem</span>
    </a>
</nav>
