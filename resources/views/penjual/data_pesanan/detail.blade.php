@extends('layout.template3')

@section('content')
<main>
    <div class="popular-items section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle text-center mt-100">
                        <div class="section-tittle mt-100">
                            <div class="judul-wrapper">
                                <a href="{{route('admin.data_pesanan.index')}}"><button class="back-button">
                                    <i class="fa fa-arrow-left"></i>
                                </button></a>
                                <h1 class="judul-produk"><span>Detail Pesanan</span></h1>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="tab-content" id="nav-tabContent" style="margin: -20px;">
                <div class="tab-pane fade show active">
                    <div class="whole-wrap">
                        <div class="container ml-20">
                            <form method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <div class="section-top-border">
                                        <hr>
                                        <div class="row mb-5">
                                            <!-- Informasi Transaksi -->
                                            <div class="col-md-2 pl-4 d-flex flex-column justify-content-center">
                                                <h6 class="mb-4 font-weight-bold text-left text-bold">Informasi Transaksi</h6>

                                                @php $info = $pesanan[0]; @endphp

                                                <ul class="list-unstyled text-left">
                                                    <li><strong>Kode Pesanan :</strong> {{ $info->kode_pesanan }}</li>
                                                    <li><strong>Status :</strong> {{ $info->status_pesanan }}</li>
                                                    <li><strong>Tanggal :</strong> {{ \Carbon\Carbon::parse($info->tanggal_pesanan)->format('d M Y') }}</li>
                                                    <li><strong>Pembeli :</strong> {{ $info->nama_pembeli }}</li>
                                                    <li><strong>Penjual :</strong> {{ $info->nama_penjual }}</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-1" style="border-left: 1px solid #ddd;"></div>

                                            <!-- Metode Pengiriman -->
                                            <div class="col-md-2 pr-5 d-flex flex-column justify-content-center">
                                                <h6 class="mb-4 font-weight-bold text-left text-bold">Metode Pengiriman</h6>
                                                @php
                                                    $pengiriman = $pesanan[0]->metode_pengiriman ?? 'Reguler';
                                                @endphp
                                                <div class="form-check d-flex align-items-center mb-3">
                                                    <input class="form-check-input" type="radio" name="ongkir_id" value="1" {{ $pengiriman == 'Reguler' ? 'checked' : '' }} disabled>
                                                    <i class="fa-solid fa-truck-fast fa-lg ml-3 mr-3"></i>
                                                    <div style="text-align: left;">
                                                        <div class="font-weight-bold">Reguler</div>
                                                        <div class="text-muted">Rp. 10.000</div>
                                                    </div>
                                                </div>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input mr-3" type="radio" name="ongkir_id" value="2" {{ $pengiriman == 'Hemat' ? 'checked' : '' }} disabled>
                                                    <i class="fa-solid fa-truck fa-lg mr-3"></i>
                                                    <div style="text-align: left;">
                                                        <div class="font-weight-bold mb-1">Hemat</div>
                                                        <div class="text-muted">Rp. 5.000</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-1" style="border-left: 1px solid #ddd;"></div>

                                            <!-- Metode Pembayaran -->
                                            <div class="col-md-2 pl-4 d-flex flex-column justify-content-center">
                                                <h6 class="mb-4 font-weight-bold text-left text-bold">Metode Pembayaran</h6>
                                                @php
                                                    $pembayaran = $pesanan[0]->metode_pembayaran ?? 'COD';
                                                @endphp
                                                <div class="form-check mb-4 d-flex align-items-center">
                                                    <input class="form-check-input mr-3" type="radio" name="pembayaran_id" value="1" {{ $pembayaran == 'COD' ? 'checked' : '' }} disabled>
                                                    <i class="fa-solid fa-hand-holding-dollar fa-lg mr-3"></i>
                                                    <div class="font-weight-bold">COD</div>
                                                </div>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input mr-3" type="radio" name="pembayaran_id" value="2" {{ $pembayaran != 'COD' ? 'checked' : '' }} disabled>
                                                    <i class="fa-solid fa-wallet fa-lg mr-3"></i>
                                                    <div class="font-weight-bold">E-Wallet / VA</div>
                                                </div>
                                            </div>

                                            <div class="col-md-1" style="border-left: 1px solid #ddd;"></div>

                                            <!-- ALAMAT -->
                                            <div class="col-md-3 alamat-block mb-3 p-3" style="background-color: white !important; border: 1px solid #ddd; border-radius: 5px; position: relative; max-width: 400px;">
                                                <div style="font-weight: bold;">Alamat Pengiriman</div>
                                                <div style="margin-top: 4px; font-size: 14px; line-height: 1.4;">
                                                    {{ $pesanan[0]->nama_pembeli }} <br>
                                                    {{ $pesanan[0]->alamat }} <br>
                                                    Provinsi {{ $pesanan[0]->provinsi }} <br>
                                                    Kota {{ $pesanan[0]->kota }} <br>
                                                    Kecamatan {{ $pesanan[0]->kecamatan }} <br>
                                                    Kelurahan {{ $pesanan[0]->kelurahan }} <br>
                                                    RT {{ $pesanan[0]->RT }} / RW {{ $pesanan[0]->RW }} <br>
                                                    {{ $pesanan[0]->kode_pos }} <br><br>
                                                    <strong>Kontak:</strong> {{ $pesanan[0]->nohp }}
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <br>
                                        <div class="row mb-2">
                                            <h5 class="mb-3" style="font-weight: bold;">Daftar Produk</h5>
                                            <div class="accordion" id="accordionProduk">
                                                @foreach($pesanan as $index => $item)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="heading{{ $index }}">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#produk{{ $index }}"
                                                                aria-expanded="false" aria-controls="produk{{ $index }}"
                                                                style="background-color: whitesmoke;">
                                                                {{ $item->nama_produk }} - Rp. {{ number_format($item->harga, 0, ',', '.') }}
                                                            </button>
                                                        </h2>
                                                        <div id="produk{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}">
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="" class="img-fluid"style="width: 100%; max-width: 170px; height: 150px; object-fit: cover;">
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <p><strong>Nama:</strong> {{ $item->nama_produk }}</p>
                                                                        <p><strong>Harga:</strong> Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                                                                        <p><strong>Jumlah:</strong> {{ $item->jumlah_produk }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                        @php
                                                $totalHargaProduk = $pesanan->sum(function($p) {
                                                    return $p->harga * $p->jumlah_produk;
                                                });

                                                $ongkir = ($pesanan[0]->metode_pengiriman ?? 'Reguler') == 'Reguler' ? 10000 : 5000;

                                                $biayaLayanan = ($pesanan[0]->metode_pembayaran ?? 'E-Wallet / VA') == 'E-Wallet / VA' ? 5000 : 0;

                                                $totalTagihan = $totalHargaProduk + $ongkir + $biayaLayanan;
                                            @endphp
                                       <div class="section-top-border text-center">
                                            <h6 class="mb-2" style="font-weight: 500; font-size: 1rem;">Total Harga (Produk): Rp. {{ number_format($totalHargaProduk, 0, ',', '.') }}</h6>
                                            <h6 class="mb-2" style="font-weight: 500; font-size: 1rem;">Biaya Ongkos Kirim: Rp. {{ number_format($ongkir, 0, ',', '.') }}</h6>
                                            <h6 class="mb-2" style="font-weight: 500; font-size: 1rem;">Biaya Layanan: Rp. {{ number_format($biayaLayanan, 0, ',', '.') }}</h6>


                                            <h5 class="mb-4" style="font-weight: 700; font-size: 1.5rem;">Total Tagihan: Rp. {{ number_format($totalTagihan, 0, ',', '.') }}</h5>
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
@endsection
