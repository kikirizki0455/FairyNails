 <!-- Mobile View -->
 <div class="md:hidden">
     <form action="{{ route('transactions.export') }}" method="POST">
         @csrf
         <div class="p-4 space-y-4">
             <div class="flex items-center space-x-2">
                 <input type="checkbox" id="select-all-mobile"
                     class="h-4 w-4 text-pink-500 focus:ring-pink-400 border-gray-300 rounded">
                 <label for="select-all-mobile" class="text-sm font-medium text-gray-700">Pilih Semua</label>
             </div>

             @forelse($transactions as $transaction)
                 <div class="bg-white rounded-lg shadow p-4">
                     <div class="space-y-2">
                         <div class="flex justify-between items-center">
                             <div class="flex items-center space-x-2">
                                 <input type="checkbox" name="selected_transactions[]" value="{{ $transaction->id }}"
                                     class="h-4 w-4 text-pink-500 focus:ring-pink-400 border-gray-300 rounded">
                                 <span class="font-semibold">#{{ $transaction->id }}</span>
                             </div>
                             <span
                                 class="px-2 text-xs font-semibold rounded-full 
                                {{ $transaction->payment_status == 'completed'
                                    ? 'bg-green-100 text-green-800'
                                    : ($transaction->payment_status == 'pending'
                                        ? 'bg-yellow-100 text-yellow-800'
                                        : 'bg-red-100 text-red-800') }}">
                                 {{ ucfirst($transaction->payment_status) }}
                             </span>
                         </div>
                         <div class="text-sm text-gray-600">{{ $transaction->user->name ?? 'N/A' }}</div>
                         <div class="text-sm font-medium">Total: Rp
                             {{ number_format($transaction->total_amount, 0, ',', '.') }}</div>
                         <div class="text-sm text-gray-500">Voucher:
                             {{ ucfirst(str_replace('_', ' ', $transaction->userVoucher?->voucher?->type ?? 'Tanpa Voucher')) }}
                         </div>
                         <div class="text-sm text-gray-500">Point: {{ $transaction->points_earned }} pts</div>
                         <div class="text-sm text-gray-500">Tanggal: {{ $transaction->created_at->format('d M Y H:i') }}
                         </div>
                         <div class="pt-2">
                             <a href="{{ route('admin.transactions.show', $transaction->id) }}"
                                 class="text-[#FF8FA4] hover:text-[#F542C8] text-sm font-medium">
                                 Lihat Detail
                             </a>
                         </div>
                     </div>
                 </div>
             @empty
                 <div class="text-center text-gray-500 p-4 bg-white rounded-lg shadow">Tidak ada data transaksi</div>
             @endforelse

             <div class="pt-4">
                 <button type="submit"
                     class="w-full flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#FF8FA4] hover:bg-[#F542C8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                     </svg>
                     Export Excel
                 </button>
             </div>
         </div>
     </form>
 </div>

 @push('script')
     <script>
         // For mobile select all
         document.getElementById('select-all-mobile').addEventListener('click', function() {
             let checkboxes = document.querySelectorAll('input[name="selected_transactions[]"]');
             checkboxes.forEach(checkbox => checkbox.checked = this.checked);
         });
     </script>
 @endpush
