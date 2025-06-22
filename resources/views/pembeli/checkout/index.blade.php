@extends('layout.template')
@section('content')

@php
  $dataDiriPembeli = $dataPesanan->first();
@endphp

<meta name="csrf-token" content="{{ csrf_token() }}">

<script type="text/javascript"
      src="https://app.midtrans.com/snap/snap.js"
      data-client-key="{{ config('midtrans.client_key') }}" >

</script>

<main>
    <!-- Hero Area Start-->
    <div class="popular-items section-padding">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle text-center mt-100">
                        <h1 class="judul-produk"> <span>Checkout Pesanan</span></h1>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent" style="margin: -20px;">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="whole-wrap">
                        <div class="container ml-20">
                            <form method="POST">
                                <div class="col-md-12">
                                    <div class="section-top-border">
                                        <hr>
                                        <div class="row mb-5 ">
                                            <!-- Metode Pengiriman -->
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2 pr-5 d-flex flex-column justify-content-center">
                                                <h6 class="mb-4 font-weight-bold text-left text-bold">Metode Pengiriman
                                                </h6>
                                                <div class="form-check d-flex align-items-center mb-3">
                                                    <input class="form-check-input" type="radio" name="ongkir_id"
                                                        value="1" required>
                                                    <i class="fa-solid fa-truck-fast fa-lg ml-3 mr-3"></i>
                                                    <div style="text-align: left;">
                                                        <div class="font-weight-bold">Reguler</div>
                                                        <div class="text-muted">+ Rp. 10.000</div>
                                                    </div>
                                                </div>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input mr-3" type="radio" name="ongkir_id"
                                                        value="2" required>
                                                    <i class="fa-solid fa-truck fa-lg mr-3"></i>
                                                    <div style="text-align: left;">
                                                        <div class="font-weight-bold mb-1">Hemat</div>
                                                        <div class="text-muted">+ Rp. 5.000</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1" style="border-right: 1px solid #ddd;"></div>
                                            <!-- Metode Pembayaran -->
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2 pl-4 d-flex flex-column justify-content-center">
                                                <h6 class="mb-4 font-weight-bold text-left text-bold">Metode Pembayaran
                                                </h6>
                                                <div class="form-check mb-4 d-flex align-items-center">
                                                    <input class="form-check-input mr-3" type="radio" name="pembayaran_id" id="bayar_cod" value="1" required>
                                                    <label class="form-check-label d-flex align-items-center" for="bayar_cod">
                                                        <i class="fa-solid fa-hand-holding-dollar fa-lg mr-3"></i>
                                                        <span class="font-weight-bold">COD</span>
                                                    </label>
                                                </div>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input mr-3" type="radio" name="pembayaran_id" id="bayar_ewallet" value="2" required>
                                                    <label class="form-check-label d-flex align-items-center" for="bayar_ewallet">
                                                        <i class="fa-solid fa-wallet fa-lg mr-3"></i>
                                                        <span class="font-weight-bold">E-Wallet / VA</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-1" style="border-right: 1px solid #ddd;"></div>
                                            <!-- ALAMAT -->
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3 alamat-block mb-3 p-3"
                                                style="background-color: white !important; border: 1px solid #ddd; border-radius: 5px; position: relative; max-width: 400px;">
                                                <div style="font-weight: bold;"> Alamat Pengiriman </div>
                                                <div style="margin-top: 4px; font-size: 14px; line-height: 1.4;" id="nama-pembeli" data-nama="{{ $dataDiriPembeli->nama_pembeli }}">
                                                    {{ $dataDiriPembeli->nama_pembeli }}
                                                    <br>{{ $dataDiriPembeli->alamat }}
                                                    <br> Provinsi {{ $dataDiriPembeli->provinsi }}
                                                    <br> Kota {{ $dataDiriPembeli->kota }}
                                                    <br> Kecamatan {{ $dataDiriPembeli->kecamatan }}
                                                    <br> Kelurahan {{ $dataDiriPembeli->kelurahan }}
                                                    <br> RT {{ $dataDiriPembeli->RT }} / RW {{ $dataDiriPembeli->RW }}
                                                    <br> Kode Pos {{ $dataDiriPembeli->kode_pos }} <br>
                                                    <br>
                                                    <strong id="no-telp" data-nohp="{{ $dataDiriPembeli->nohp }}">Kontak:</strong> {{ $dataDiriPembeli->nohp }}
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <br>
                                        <div class="row mb-2">
                                            <h5 class="mb-3" style="font-weight: bold;">Daftar Produk</h5>
                                            <h5 class="mb-3" id="kode-transaksi" data-kode="{{ $dataDiriPembeli->kode_pesanan }}" style="font-weight: bold;">Kode Transaksi : {{ $dataDiriPembeli->kode_pesanan }}</h5>
                                            @foreach ($dataPesanan as $index => $items)
                                            <div class="accordion" id="accordionProduk{{ $index }}">
                                                <div class="accordion-item">
                                                    <input type="hidden" name="produk_id[]" value="{{ $items->pesanan_id }}">
                                                    <input type="hidden" name="amount[]" value="{{ $items->amount }}">
                                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#produk{{ $index }}"
                                                            aria-expanded="false" aria-controls="produk{{ $index }}"
                                                            style="background-color: whitesmoke;"> {{ $items->nama_produk }} - Rp. {{ number_format($items->harga * $items->amount, 0, ',', '.') }}
                                                        </button>
                                                    </h2>
                                                    <div id="produk{{ $index }}" class="accordion-collapse collapse"
                                                        aria-labelledby="heading{{ $index }}">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <img src="{{ asset('storage/' . $items->gambar) }}"
                                                                        alt="" class="img-fluid"
                                                                        style="width: 100%; max-width: 170px; height: 150px; object-fit: cover;">
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <p ><strong>Nama :</strong> {{ $items->nama_produk }}</p>
                                                                    <p><strong>Harga :</strong> Rp. {{ number_format($items->harga, 0, ',', '.') }}</p>
                                                                    <p><strong>Jumlah :</strong> {{ $items->amount }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="section-top-border text-center">
                                        <!-- Subtotal Produk -->
                                        <h6 class="mb-2" id="total-harga-produk" data-total-harga="{{ $dataDiriPembeli->total_harga }}" style="font-weight: 500; font-size: 1rem;"> Total Harga
                                            (Produk) : Rp. {{ number_format($dataDiriPembeli->total_harga, 0, ',', '.') }} </h6>
                                        <h6 class="mb-2" id="total-ongkir" style="font-weight: 500; font-size: 1rem;"> Total Ongkos Kirim
                                            : Rp. 0 </h6>
                                        <h6 class="mb-2" id="total-biaya-layanan" style="font-weight: 500; font-size: 1rem;"> Total Biaya Layanan : Rp. 0 </h6>
                                        <!-- Total Produk -->
                                        <h5 class="mb-4" id="pembayaran_id" style="font-weight: 700; font-size: 1.5rem;"> Total Tagihan
                                            Anda : Rp. 0 </h5>
                                        <!-- Tombol Checkout -->
                                        <button class="btn btn-checkout" name="checkout" id="pay-button" type="button"
                                            style="font-size: 1.1rem; padding: 12px 30px; font-weight: bold; border-radius: 8px;">
                                            Checkout </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const radioOngkir = document.querySelectorAll('input[name="ongkir_id"]');
        const radioPembayaran = document.querySelectorAll('input[name="pembayaran_id"]');

        // console.log(radioPembayaran);

        const totalOngkirDisplay = document.getElementById('total-ongkir');
        const biayaLayananDisplay = document.getElementById('total-biaya-layanan');
        const totalTagihanDisplay = document.getElementById('pembayaran_id');

        const totalHargaProdukEl = document.getElementById('total-harga-produk');
        const totalHargaProduk = parseInt(totalHargaProdukEl.dataset.totalHarga);

        const tipeOngkir = {
            1: 'Reguler',
            2: 'Hemat'
        };

        const tipeBayar = {
            1: 'COD',
            2: 'E-Wallet / VA'
        };

        const ongkirValues = {
            1: 10000,
            2: 5000
        };

        const pembayaranValues = {
            1: 0,
            2: 5000
        };

        let currentOngkir = 0;
        let currentBiayaLayanan = 0;
        let currentTotal = 0;

        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(angka);
        }

        function updateTotalTagihan() {
            currentTotal = totalHargaProduk + currentOngkir + currentBiayaLayanan;
            totalTagihanDisplay.textContent = 'Total Tagihan Anda : ' + formatRupiah(currentTotal);
        }

        updateTotalTagihan();

        radioOngkir.forEach(function (radio) {
            radio.addEventListener('change', function () {
                const selectedValue = parseInt(this.value);
                currentOngkir = ongkirValues[selectedValue] || 0;
                totalOngkirDisplay.textContent = 'Total Ongkos Kirim : ' + formatRupiah(currentOngkir);
                updateTotalTagihan();
            });
        });

        radioPembayaran.forEach(function (radio) {
            radio.addEventListener('change', function () {
                const selectedValue = parseInt(this.value);
                currentBiayaLayanan = pembayaranValues[selectedValue] || 0;
                biayaLayananDisplay.textContent = 'Total Biaya Layanan : ' + formatRupiah(currentBiayaLayanan);
                updateTotalTagihan();
            });
        });

        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function(e) {
            e.preventDefault();

            const kodeTransaksi = document.getElementById('kode-transaksi').dataset.kode;

            const selectedMetodeBayar = document.querySelector('input[name="pembayaran_id"]:checked');
            const selectedMetodeKirim = document.querySelector('input[name="ongkir_id"]:checked');

            if (!selectedMetodeBayar || !selectedMetodeKirim) {
                alert('Pilih metode pembayaran dan pengiriman terlebih dahulu.');
                return;
            }

            const bayarId = parseInt(selectedMetodeBayar.value);
            const kirimId = parseInt(selectedMetodeKirim.value);

            const metodeBayarNama = tipeBayar[bayarId];
            const metodeKirimNama = tipeOngkir[kirimId];

            let produkData = [];

            const produkIds = document.querySelectorAll('input[name="produk_id[]"]');
            const amounts = document.querySelectorAll('input[name="amount[]"]');

            produkIds.forEach((input, index) => {
                produkData.push({
                    id: input.value,
                    amount: amounts[index].value
                });
            });

            const formData = new FormData();
            formData.append("total_harga", currentTotal);

            fetch(`/checkout/updateHarga/${kodeTransaksi}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData,
            })
            .then(response => {
                if (!response.ok) throw new Error('Gagal Mengirim Data');
                return response.json();
            })
            .then(() => {
                const paymentData = new FormData();
                paymentData.append("metode_bayar", metodeBayarNama);
                paymentData.append("metode_kirim", metodeKirimNama);
                paymentData.append("produkData", JSON.stringify(produkData));

                if (bayarId === 1) {
                    return fetch(`/checkout/payment/${kodeTransaksi}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: paymentData,
                    })
                    .then(response => {
                        return response.json().then(data => {
                            if (!response.ok) {
                                throw data;
                            }
                            return data;
                        });
                    })
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Pesanan Anda berhasil dibuat dengan metode pembayaran COD!',
                            }).then(() => {
                                window.location.href = "/home";
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            html: `
                                <p>${error.message || 'Terjadi kesalahan saat memproses permintaan.'}</p>
                                ${error.error ? `<small class="text-muted">${error.error}</small>` : ''}
                            `,
                            confirmButtonText: 'Tutup'
                        });
                    });
                } else {
                    return fetch(`/checkout/getToken/${kodeTransaksi}`)
                    .then(response => response.json())
                    .then(data => {
                        const snapTokenBaru = data.snapToken;

                        window.snap.pay(snapTokenBaru, {
                            onSuccess: function(result){
                                alert("Pembayaran sukses!");

                                fetch(`/checkout/payment/${kodeTransaksi}`, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: paymentData,
                                })
                                .then(res => {
                                    if (!res.ok) throw new Error('Gagal menyimpan data pembayaran');
                                    alert("Data pembayaran dan pengiriman berhasil disimpan.");
                                    window.location.href = "/home";
                                })
                                .catch(err => {
                                    console.error("Gagal menyimpan pembayaran:", err);
                                });
                            },
                            onPending: function(result){
                                alert("Menunggu pembayaran.");
                            },
                            onError: function(result){
                                alert("Gagal memproses pembayaran.");
                            },
                            onClose: function(){
                                alert("Popup ditutup tanpa pembayaran.");
                            }
                        });
                    });
                }
            })
            .catch(error => {
                console.error('Terjadi kesalahan:', error);
            });
        });
    });
</script>


@endsection
