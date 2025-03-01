@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Validasi User Baru</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama</th>
                            <th
                                class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                Email</th>
                            <th
                                class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                No. Telepon</th>
                            <th
                                class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">
                                Alamat</th>
                            <th
                                class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($pendingUsers as $user)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 sm:px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-500 md:hidden">{{ $user->email }}</div>
                                    <div class="text-sm text-gray-500 sm:hidden">{{ $user->phone }}</div>
                                </td>
                                <td class="px-4 sm:px-6 py-4 hidden md:table-cell">
                                    <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                </td>
                                <td class="px-4 sm:px-6 py-4 hidden sm:table-cell">
                                    <div class="text-sm text-gray-900">{{ $user->phone }}</div>
                                </td>
                                <td class="px-4 sm:px-6 py-4 hidden lg:table-cell">
                                    <div class="text-sm text-gray-900">{{ $user->address }}</div>
                                </td>
                                <td class="px-4 sm:px-6 py-4 text-sm">
                                    <div class="flex flex-col sm:flex-row space-y-1 sm:space-y-0 sm:space-x-2">
                                        <form action="{{ route('admin.user-validation.approve', $user->id) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="text-green-600 hover:text-green-900 bg-green-100 hover:bg-green-200 px-2 py-1 rounded-md text-xs sm:text-sm w-full sm:w-auto">Setujui</button>
                                        </form>
                                        <form action="{{ route('admin.user-validation.reject', $user->id) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900 bg-red-100 hover:bg-red-200 px-2 py-1 rounded-md text-xs sm:text-sm w-full sm:w-auto">Tolak</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr class="sm:hidden border-b border-gray-200 bg-gray-50">
                                <td colspan="5" class="px-4 py-2">
                                    <div class="text-xs text-gray-500">
                                        <span class="font-medium">Alamat:</span> {{ $user->address }}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 sm:px-6 py-4 text-center text-gray-500">
                                    Tidak ada user yang perlu divalidasi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
