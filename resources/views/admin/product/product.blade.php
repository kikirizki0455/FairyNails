@extends('layouts.admin')

@section('title', 'Product | Fairy Nails')

@section('content')
    <div class="w-full min-h-screen bg-gray-100">
        <div class="container mx-auto px-4 sm:px-8 py-8 max-w-screen-xl">
            <x-head title="Product Management">
                <a href="{{ route('admin.product.create') }}"
                    class="bg-[#FF8FA4] hover:bg-[#F542C8] text-white font-bold py-2 px-4 rounded-lg transition duration-300 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                            clip-rule="evenodd" />
                    </svg>
                    Add Product
                </a>
            </x-head>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden w-full">
                <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-[#FF8FA4] to-[#F542C8]">
                    <h2 class="text-xl font-semibold text-white">Product List</h2>
                </div>

                <!-- Desktop view (hidden on mobile) -->
                <div class="hidden md:block overflow-x-auto w-full">
                    @include('admin.product.partials.table-desktop-product')
                </div>

                <!-- Mobile view (visible only on mobile) -->
                <div class="md:hidden">
                    @include('admin/product/partials/table-mobile-product')
                </div>

                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <span class="text-sm text-gray-600 text-center sm:text-left">
                            Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of
                            {{ $products->total() }} results
                        </span>
                        <div class="pagination-container w-full sm:w-auto">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals untuk setiap produk -->
    @foreach ($products as $product)
        <x-modal name="edit-product-{{ $product->id }}" maxWidth="2xl">
            @include('admin.product.partials.modal-product')
        </x-modal>
    @endforeach

    <style>
        /* Ensure the pagination is responsive */
        @media (max-width: 640px) {
            .pagination-container nav {
                display: flex;
                justify-content: center;
                width: 100%;
                overflow-x: auto;
            }
        }
    </style>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Fungsi untuk membuka modal edit
        function openEditModal(productId) {
            const event = new CustomEvent('open-modal', {
                detail: 'edit-product-' + productId
            });
            window.dispatchEvent(event);
        }

        // Fungsi untuk menutup modal edit
        function closeEditModal(productId) {
            const event = new CustomEvent('close-modal', {
                detail: 'edit-product-' + productId
            });
            window.dispatchEvent(event);
        }

        function confirmDelete(productId, type = 'desktop') {
            const formId = type === 'mobile' ?
                `deleteFormMobile-${productId}` :
                `deleteForm-${productId}`;

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Produk yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                customClass: {
                    container: 'swal-responsive',
                    popup: 'swal-popup-responsive',
                    actions: 'swal-actions-responsive'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
    <style>
        /* Responsive SweetAlert */
        @media (max-width: 640px) {
            .swal-popup-responsive {
                width: 90% !important;
                font-size: 14px !important;
            }

            .swal-actions-responsive {
                flex-direction: column;
            }

            .swal-button {
                width: 100% !important;
                margin: 5px 0 !important;
            }
        }
    </style>
@endpush
