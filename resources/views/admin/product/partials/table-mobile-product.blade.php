@foreach ($products as $product)
    <div class="border-b border-gray-200 p-4">
        <div class="flex items-start mb-3">
            <div class="ml-4 flex-1">
                <div class="text-md font-medium text-gray-900">{{ $product->name }}</div>
                <div class="text-sm text-gray-500">{{ Str::limit($product->description, 60) }}</div>
                <div class="mt-1">
                    <span class="px-2 text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">
                        {{ $product->category }}
                    </span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-2 mb-3">
            <div>
                <span class="text-xs text-gray-500">Price:</span>
                <div class="text-sm font-medium">Rp {{ number_format($product->price, 0, ',', '.') }}
                </div>
            </div>

            <div>
                <span class="text-xs text-gray-500 ">Status:</span>
                <div>
                    <span
                        class="px-2 text-xs leading-5 font-semibold rounded-full 
                    {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end space-x-4 pt-2 border-t border-gray-100">
            <button type="button" onclick="openEditModal('{{ $product->id }}')"
                class="text-[#FF8FA4] hover:text-[#F542C8] transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg>
            </button>

            <form id="deleteFormMobile-{{ $product->id }}" action="{{ route('admin.product.destroy', $product->id) }}"
                method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="text-red-500 hover:text-red-700 transition-colors duration-200"
                    onclick="confirmDelete({{ $product->id }}, 'mobile')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
@endforeach
