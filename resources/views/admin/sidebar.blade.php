<nav class="mt-8 flex flex-col gap-y-4 px-2">
    <a href="{{ route('admin.dashboard') }}"
        class="flex items-center py-2.5 px-3 rounded transition duration-200 hover:bg-[#292352]">
        <img src="{{ asset('assets/icon/home.png') }}" alt="dashboard" class="w-6 h-6">
        <span x-show="!$store.sidebar.collapsed" class="ml-3">Dashboard</span>
    </a>
    <a href="{{ route('admin.product') }}"
        class="flex items-center py-2.5 px-3 rounded transition duration-200 hover:bg-[#292352]">
        <img src="{{ asset('assets/icon/product.png') }}" alt="product" class="w-6 h-6">
        <span x-show="!$store.sidebar.collapsed" class="ml-3">Product</span>
    </a>
    <a href="{{ route('admin.transactions') }}"
        class="flex items-center py-2.5 px-3 rounded transition duration-200 hover:bg-[#292352]">
        <img src="{{ asset('assets/icon/transaction.png') }}" alt="transaction" class="w-6 h-6">
        <span x-show="!$store.sidebar.collapsed" class="ml-3">Transactions</span>
    </a>
    <a href="{{ route('admin.redeem') }}"
        class="flex items-center py-2.5 px-3 rounded transition duration-200 hover:bg-[#292352]">
        <img src="{{ asset('assets/icon/redeem.png') }}" alt="redeem" class="w-6 h-6">
        <span x-show="!$store.sidebar.collapsed" class="ml-3">Redeem</span>
    </a>
    <a href="{{ route('admin.member') }}"
        class="flex items-center py-2.5 px-3 rounded transition duration-200 hover:bg-[#292352]">
        <img src="{{ asset('assets/icon/user.png') }}" alt="member" class="w-6 h-6">
        <span x-show="!$store.sidebar.collapsed" class="ml-3">Member</span>
    </a>
    <a href="{{ route('admin.user-validation.index') }}"
        class="flex items-center py-2.5 px-3 rounded transition duration-200 hover:bg-[#292352]">
        <img src="{{ asset('assets/icon/user.png') }}" alt="member" class="w-6 h-6">
        <span x-show="!$store.sidebar.collapsed" class="ml-3">Validation User</span>
    </a>
</nav>
