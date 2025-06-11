@extends('layout.template2')
@section('contentadmin')

<div class="container-xl py-4">

    {{-- Cards Section --}}
    <div class="row g-4 mb-5">
        @php
            $cards = [
                ['icon' => 'fa-solid fa-user', 'label' => 'Jumlah Pelanggan', 'value' => $total_pengguna],
                ['icon' => 'fa-solid fa-comment', 'label' => 'Jumlah Review', 'value' => $total_review],
                ['icon' => 'fa-solid fa-store', 'label' => 'Jumlah Toko', 'value' => $total_toko],
                ['icon' => 'fa-solid fa-box', 'label' => 'Jumlah Produk', 'value' => $total_produk],
            ];
        @endphp

        @foreach($cards as $card)
        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
            <div class="card shadow-sm border-0" style="min-height: 120px; background: linear-gradient(135deg, #6fa8ba, #548c99); transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='scale(1.03)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.2)';"
            onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)';">
                <div class="card-body text-white text-center p-1" style="padding-top: 2 !important; padding-bottom: 2;">
                    <div class="row">
                        <div class="col-4">
                            <div class="icon-circle mb-3 mx-auto" style="background-color: rgba(255,255,255,0.15); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fa-solid {{ $card['icon'] }} fa-xl"></i>
                            </div>
                        </div>
                        <div class="col-8" style="margin-top: -20px;">
                            <h6 class="text-uppercase fw-bold mb-1 mt-1" style="letter-spacing: 1px;">{{ $card['label'] }}</h6>
                            <h2 class="fw-bold mb-2">{{ $card['value'] }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- {{-- Charts Section --}} -->
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h2 class="h2 fw-bold mb-4">Laporan Saldo Pemasukan</h2>
                    <canvas id="grafik_pemasukan"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h2 class="h2 fw-bold mb-4">Laporan Review Pelanggan</h2>
                    <canvas id="grafik_review"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    // Diagram Saldo Pemasukan
    const ctx = document.getElementById('grafik_pemasukan');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($jml_pendapatan->pluck('bulan')) !!},
            datasets: [{
                label: 'Jumlah Pemasukan',
                data: {!! json_encode($jml_pendapatan->pluck('total')) !!},
                borderWidth: 2,
                borderColor: '#3498db',
                backgroundColor: 'rgba(52, 152, 219, 0.2)',
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            aspectRatio: 2,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                        callback: function(value) {
                            // Format angka besar (contoh: 1000000 jadi 1jt)
                            if (value >= 1000000) return (value / 1000000) + ' jt';
                            if (value >= 1000) return (value / 1000) + ' rb';
                            return value;
                        }
                    },
                    title: {
                        display: true,
                        text: 'Total Pemasukan (Rp)',
                        font: {
                            size: 14
                        }
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            // Format tooltip jadi Rupiah
                            let value = context.parsed.y;
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });


    // Diagram Batang Review
    const ctx2 = document.getElementById('grafik_review').getContext('2d');

    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: {!! json_encode($jml_rerata_review->pluck('name')) !!},
            datasets: [{
                label: 'Rata-Rata Review',
                data: {!! json_encode($jml_rerata_review->pluck('rerata_bintang')) !!},
                borderColor: 'rgba(255, 255, 255, 0.5)',
                backgroundColor: '#679FB0',
                borderWidth: 1
                }]
            },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            aspectRatio: 2,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                            callback: function(value) {
                                return Number.isInteger(value) ? value : null;
                        }
                    }
                }
            }
        }
    });


</script>

@endsection
