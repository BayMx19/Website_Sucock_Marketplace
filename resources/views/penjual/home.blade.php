@extends('layout.template2')
@section('contentadmin')

<div class="container-xl py-4">

    {{-- Cards Section --}}
    <div class="row g-4 mb-5">
        @php
            $cards = [
                ['icon' => 'fa-solid fa-wallet', 'label' => 'Saldo Toko', 'value' => 'Rp. ' . number_format($saldo ?? 0, 0, ',', '.') ],
                ['icon' => 'fa-solid fa-box', 'label' => 'Jumlah Produk', 'value' => $jmlProduk],
                ['icon' => 'fa-solid fa-clock', 'label' => 'Pesanan Belum Selesai', 'value' => $pesananBelum],
                ['icon' => 'fa-solid fa-circle-check', 'label' => 'Pesanan Selesai', 'value' => $pesananSelesai],
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
                    <h2 class="h2 fw-bold mb-4">Laporan Jumlah Transaksi</h2>
                    <canvas id="grafik_transaksi"></canvas>
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
            labels: {!! json_encode($jml_pendapatan_penjual->pluck('bulan')) !!},
            datasets: [{
                label: 'Jumlah Pemasukan',
                data: {!! json_encode($jml_pendapatan_penjual->pluck('total')) !!},
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

    // Diagram Total Transaksi
    const ctx2 = document.getElementById('grafik_transaksi');

    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: {!! json_encode($jml_transaksi_selesai->pluck('bulan')) !!},
            datasets: [{
                label: 'Jumlah Pesanan Terselesaikan',
                data: {!! json_encode($jml_pendapatan_penjual->pluck('jumlah_pesanan')) !!},
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
                    },
                    title: {
                        display: true,
                        text: 'Total Transaksi',
                        font: {
                            size: 14
                        }
                    }
                }
            },
        }
    });
    
</script>

@endsection
