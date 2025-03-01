@extends('layouts.admin')

@section('title', 'Dashboard | Fairy Nails')

@section('content')
    <div class="container mx-auto px-4 sm:px-8 py-8 max-w-screen-xl">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-sm font-bold text-[#FF8FA4]">
                <span class="bg-[#FF8FA4] text-white p-2 rounded-lg shadow-md">Dashboard Admin</span>
            </h1>
            <div class="text-sm text-gray-500">
                <span class="font-medium">Tanggal:</span> {{ now()->format('d M Y') }}
            </div>
        </div>

        <!-- Statistik Utama -->
        @include('admin.partials.statistik')

        <!-- Grafik Pendapatan Bulanan -->
        @include('admin.partials.chart')

        <!-- Total Pendapatan -->
        @include('admin.partials.income')

        <!-- Transaksi Terbaru -->
        @include('admin.partials.transactions')
    </div>

    <div class="grid grid-cols-1  gap-8  w-full">
        <!-- Pelanggan dengan Poin Tertinggi -->
        @include('admin.partials.highest-points')
    </div>

    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data untuk grafik pendapatan bulanan
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

            // Chart pendapatan bulanan
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Pendapatan (Rp)',
                        data: @json($monthlyRevenueData),
                        backgroundColor: 'rgba(255, 143, 164, 0.2)',
                        borderColor: '#FF8FA4',
                        borderWidth: 2,
                        tension: 0.3,
                        pointBackgroundColor: '#FF8FA4',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 1,
                        pointRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(context.raw);
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                                }
                            }
                        }
                    }
                }
            });

            // Chart kategori produk
            const productCategoryCtx = document.getElementById('productCategoryChart').getContext('2d');
            const productCategoryChart = new Chart(productCategoryCtx, {
                type: 'doughnut',
                data: {
                    labels: @json(array_keys($productCategories)),
                    datasets: [{
                        data: @json(array_values($productCategoryCounts)),
                        backgroundColor: [
                            '#FF8FA4',
                            '#F542C8',
                            '#9B63FC',
                            '#4CACFF',
                            '#45D9A3',
                            '#FFD166'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    }
                }
            });
        });
    </script>
@endpush
