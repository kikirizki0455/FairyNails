 <!-- User Info Card -->
 <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8">
     <div class="px-6 py-4 border-b bg-gradient-to-r from-[#FF8FA4] to-[#F542C8]">
         <h2 class="text-xl font-semibold text-white">Informasi Akun</h2>
     </div>
     <div class="p-6">
         <div class="flex flex-col md:flex-row items-center gap-6">
             <div
                 class="flex-shrink-0 w-24 h-24 bg-[#FF8FA4] rounded-full flex items-center justify-center text-3xl font-bold text-white">
                 {{ substr(auth()->user()->name, 0, 1) }}
             </div>
             <div class="flex-grow space-y-3 text-center md:text-left">
                 <h3 class="text-2xl font-bold text-gray-800">{{ auth()->user()->name }}</h3>
                 <p class="text-gray-600">{{ auth()->user()->email }}</p>

                 <div class="flex flex-col sm:flex-row gap-4 mt-4">
                     <div class="bg-pink-50 rounded-lg px-4 py-3 flex flex-col items-center sm:items-start">
                         <span class="text-sm text-gray-500">Level</span>
                         <div class="flex items-center mt-1">
                             <span class="px-2 py-1 bg-pink-100 text-pink-800 rounded-full text-xs font-semibold">
                                 @if (auth()->user()->exp < 3001)
                                     Silver
                                 @elseif(auth()->user()->exp < 7001)
                                     Gold
                                 @else
                                     Platinum
                                 @endif
                             </span>
                             <span class="ml-2 text-gray-700">{{ auth()->user()->exp }} XP</span>
                         </div>
                     </div>

                     <div class="bg-orange-50 rounded-lg px-4 py-3 flex flex-col items-center sm:items-start">
                         <span class="text-sm text-gray-500">Poin Saya</span>
                         <div class="flex items-center mt-1">
                             <span class="text-lg font-bold text-orange-500">{{ auth()->user()->points ?? 0 }}</span>
                             <span class="ml-1 text-gray-700">poin</span>
                         </div>
                     </div>

                     <div class="bg-green-50 rounded-lg px-4 py-3 flex flex-col items-center sm:items-start">
                         <span class="text-sm text-gray-500">Diskon Member</span>
                         <div class="flex items-center mt-1">
                             <span class="text-lg font-bold text-green-600">
                                 @if (auth()->user()->exp < 3001)
                                     3%
                                 @elseif(auth()->user()->exp < 7001)
                                     5%
                                 @else
                                     8%
                                 @endif
                             </span>
                             <span class="ml-1 text-gray-700">setiap layanan</span>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="w-full md:w-auto mt-6 md:mt-0">
                 <div class="bg-gray-100 rounded-lg p-6 text-center">
                     <div class="mb-2 text-sm text-gray-500">Progres Level</div>
                     @php
                         if (auth()->user()->exp < 3001) {
                             $currentExp = auth()->user()->exp;
                             $targetExp = 3000;
                             $nextLevel = 'Gold';
                         } elseif (auth()->user()->exp < 7001) {
                             $currentExp = auth()->user()->exp - 3000;
                             $targetExp = 4000;
                             $nextLevel = 'Platinum';
                         } else {
                             $currentExp = auth()->user()->exp;
                             $targetExp = $currentExp;
                             $nextLevel = 'Platinum';
                         }

                         $progressPercentage = $targetExp > 0 ? min(($currentExp / $targetExp) * 100, 100) : 100;
                     @endphp

                     <div class="w-full bg-gray-200 rounded-full h-2.5 mb-2">
                         <div class="bg-[#FF8FA4] h-2.5 rounded-full" style="width: {{ $progressPercentage }}%">
                         </div>
                     </div>

                     @if (auth()->user()->exp < 7001)
                         <div class="text-xs text-gray-600">{{ $currentExp }} / {{ $targetExp }} XP untuk
                             {{ $nextLevel }}</div>
                     @else
                         <div class="text-xs text-gray-600">Level Maksimum Tercapai!</div>
                     @endif
                 </div>
             </div>
         </div>
     </div>
