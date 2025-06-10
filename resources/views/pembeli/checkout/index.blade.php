@extends('layout.template') @section('content') <main>
    <!-- Hero Area Start-->
    <div class="popular-items section-padding">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle text-center mt-100">
                        <h2 class="judul-produk"> <span>Checkout</span></h2>
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
                                                        <div class="text-muted">Rp. 10.000</div>
                                                    </div>
                                                </div>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input mr-3" type="radio" name="ongkir_id"
                                                        value="2" required>
                                                    <i class="fa-solid fa-truck fa-lg mr-3"></i>
                                                    <div style="text-align: left;">
                                                        <div class="font-weight-bold mb-1">Hemat</div>
                                                        <div class="text-muted">Rp. 5.000</div>
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
                                                    <input class="form-check-input mr-3" type="radio"
                                                        name="pembayaran_id" value="1" required>
                                                    <i class="fa-solid fa-hand-holding-dollar fa-lg mr-3"></i>
                                                    <div style="text-align: left;" class="font-weight-bold">COD</div>
                                                </div>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input mr-3" type="radio"
                                                        name="pembayaran_id" value="2" required>
                                                    <i class="fa-solid fa-wallet fa-lg mr-3"></i>
                                                    <div style="text-align: left;" class="font-weight-bold">E-Wallet /
                                                        VA </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1" style="border-right: 1px solid #ddd;"></div>
                                            <!-- ALAMAT -->
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3 alamat-block mb-3 p-3"
                                                style="background-color: white !important; border: 1px solid #ddd; border-radius: 5px; position: relative; max-width: 400px;">
                                                <div style="font-weight: bold;"> Alamat Pengiriman </div>
                                                <div style="margin-top: 4px; font-size: 14px; line-height: 1.4;"> Kurnia
                                                    Sari <br>Jl. Mawar No. 10 <br> Provinsi Jawa Timur <br> Kota Kediri
                                                    <br> Kecamatan Pesantren <br> Kelurahan Banjaran <br> RT 03 / RW 05
                                                    <br> 64123 <br>
                                                    <br>
                                                    <strong>Kontak:</strong> 0815331120722
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <br>
                                        <div class="row mb-2">
                                            <h5 class="mb-3" style="font-weight: bold;">Daftar Produk</h5>
                                            <div class="accordion" id="accordionProduk">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#produk1"
                                                            aria-expanded="false" aria-controls="produk1"
                                                            style="background-color: whitesmoke;"> JP Gold - Rp. 100.000
                                                        </button>
                                                    </h2>
                                                    <div id="produk1" class="accordion-collapse collapse"
                                                        aria-labelledby="headingOne">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <img src="../penjual/foto/64345a11d90fa6422be698f9703.jpg"
                                                                        alt="" class="img-fluid"
                                                                        style="width: 100%; max-width: 170px; height: 150px; object-fit: cover;">
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <p><strong>Nama:</strong> JP Gold</p>
                                                                    <p><strong>Harga:</strong> Rp. 100.000</p>
                                                                    <p><strong>Jumlah:</strong> 1</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingTwo">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#produk2"
                                                            aria-expanded="false" aria-controls="produk2"
                                                            style="background-color: whitesmoke;"> Silver Ring - Rp.
                                                            75.000 </button>
                                                    </h2>
                                                    <div id="produk2" class="accordion-collapse collapse"
                                                        aria-labelledby="headingTwo">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <img src="https://via.placeholder.com/170x150"
                                                                        alt="" class="img-fluid"
                                                                        style="width: 100%; max-width: 170px; height: 150px; object-fit: cover;">
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <p><strong>Nama:</strong> Silver Ring</p>
                                                                    <p><strong>Harga:</strong> Rp. 75.000</p>
                                                                    <p><strong>Jumlah:</strong> 2</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="section-top-border text-center">
                                        <!-- Subtotal Produk -->
                                        <h6 class="mb-2" style="font-weight: 500; font-size: 1rem;"> Total Harga
                                            (Produk) : Rp. 100.000 </h6>
                                        <h6 class="mb-2" style="font-weight: 500; font-size: 1rem;"> Total Ongkos Kirim
                                            : Rp. 100.000 </h6>
                                        <!-- Total Produk -->
                                        <h5 class="mb-4" style="font-weight: 700; font-size: 1.5rem;"> Total Tagihan
                                            Anda : Rp. 100.000 </h5>
                                        <!-- Tombol Checkout -->
                                        <button class="btn btn-checkout" name="checkout"
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
</main> @endsection