<div class="space-y-4">
    @forelse ($users as $user)
        <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-200">
            <!-- Bagian Informasi Pengguna -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Kolom Kiri: Nama, Poin, Exp, Level -->
                <div>
                    <div class="mb-2">
                        <span class="text-xs text-gray-500">Name:</span>
                        <div class="text-md font-medium text-gray-900">{{ $user->name }}</div>
                    </div>
                    <div class="mb-2">
                        <span class="text-xs text-gray-500">Point:</span>
                        <div class="text-sm text-gray-500">{{ $user->points }}</div>
                    </div>
                    <div class="mb-2">
                        <span class="text-xs text-gray-500">Exp:</span>
                        <div class="text-sm text-gray-500">{{ $user->exp }}</div>
                    </div>
                    <div>
                        <span class="px-2 text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">
                            {{ $user->level }}
                        </span>
                    </div>
                </div>

                <!-- Kolom Kanan: Email dan Status -->
                <div>
                    <div class="mb-2">
                        <span class="text-xs text-gray-500">Email:</span>
                        <div class="text-sm font-medium">{{ Str::limit($user->email, 20) }}</div>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500">Status:</span>
                        <div>
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $user->status === 'used' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                {{ $user->status === 'used' ? 'Digunakan' : 'Aktif' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi: Edit dan Hapus -->
            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-100 mt-4">
                <button type="button" onclick="openEditModal('{{ $user->id }}')"
                    class="text-[#FF8FA4] hover:text-[#F542C8] transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                </button>
                <form id="deleteFormMobile-{{ $user->id }}" action="{{ route('admin.product.destroy', $user->id) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="text-red-500 hover:text-red-700 transition-colors duration-200"
                        onclick="confirmDelete({{ $user->id }}, 'mobile')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-200 text-center text-gray-500">
            Tidak ada data member yang ditemukan.
        </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="mt-4">
    {{ $users->links() }}
</div>
<script>
    function filterByLevel(level) {
        const url = new URL(window.location.href);

        if (level) {
            url.searchParams.set('level', level);
        } else {
            url.searchParams.delete('level');
        }

        // Pertahankan parameter pencarian jika ada
        const searchParam = url.searchParams.get('search');
        if (searchParam && searchParam.trim() !== '') {
            url.searchParams.set('search', searchParam);
        }

        window.location.href = url.toString();
    }
</script>
