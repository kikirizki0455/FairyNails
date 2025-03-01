<div class="space-y-2">
    <label class="block text-sm font-medium text-gray-700">Status Pembayaran</label>
    <select name="payment_status" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FF8FA4]">
        <option value="">Semua Status</option>
        <option value="pending" {{ request('payment_status') == 'pending' ? 'selected' : '' }}>
            Pending</option>
        <option value="process" {{ request('payment_status') == 'process' ? 'selected' : '' }}>
            process</option>
        <option value="completed" {{ request('payment_status') == 'completed' ? 'selected' : '' }}>
            Completed</option>
        <option value="cancelled" {{ request('payment_status') == 'cancelled' ? 'selected' : '' }}>
            Cancelled</option>
    </select>
</div>

<div class="space-y-2">
    <label class="block text-sm font-medium text-gray-700">Dari Tanggal</label>
    <input type="date" name="date_from" value="{{ request('date_from') }}"
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FF8FA4]">
</div>

<div class="space-y-2">
    <label class="block text-sm font-medium text-gray-700">Sampai Tanggal</label>
    <input type="date" name="date_to" value="{{ request('date_to') }}"
        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#FF8FA4]">
</div>

<div class="flex items-end space-x-2">
    <button type="submit"
        class="bg-[#FF8FA4] hover:bg-[#F542C8] text-white px-4 py-2 rounded-lg transition duration-300">
        Filter
    </button>
    <a href="{{ route('admin.transactions') }}"
        class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg transition duration-300">
        Reset
    </a>
</div>
