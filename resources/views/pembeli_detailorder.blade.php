@extends('layout.template')
@section('content')
<main style="background-color: #F0F0F0;">
    <section class="popular-items">
        <div class="container">
            <div class="row product-btn justify-content-between mb-40">
                <div class="properties__button">
                    <!--Nav Button  -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin-top: 50px;">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                <h3>Detail Pesanan</h3>
                            </a>
                        </div>
                    </nav>
                    <!--End Nav Button  -->
                </div>
                <!-- Grid and List view -->
                <div class="grid-list-view">
                </div>

            </div>
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent" style="background-color:white; margin: -20px;">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="whole-wrap">
                        <div class="container ml-20">
                            <div class="col-md-12">
                                                                        <section class="section-top-border">
                                        <div class="container box_1170">
                                            <div class="row mb-5">
                                                <div class="col-md-2">
                                                    <img src="{{ asset('assets') }}/img/JP Gold.jpg" alt="Foto Produk" class="img-fluid" style='width: 170px; height: 150px;'>

                                                </div>
                                                <div class="col-md-4" style="background-color: #F0F0F0;">
                                                    <h6 class="mt-10 text-center" style="font-weight: 600;">Cangkir</h6>
                                                    <h6 class="mt-10 text-center" style="font-weight: 800; color: #E8AEB1;">Rp15.000</h6>
                                                    <h6 class="mt-10 text-center" style="color: darkgray;">Jumlah : 2</h6>
                                                </div>
                                            </div>
                                            <p class="sample-text">
                                                <b>Nama :</b> Kurnia Sari                                                </p>
                                            <p class="sample-text">
                                                <b>No. Hp :</b> 0815331120722                                                </p>
                                            <p class="sample-text">
                                                <b>Email :</b> kurniasari@gmail.com                                               </p>
                                            <p class="sample-text">
                                                <b>Alamat Pengiriman</b> : Kab.Kediri                                               </p>
                                            <p class="sample-text">
                                                <b>Metode Pengiriman : </b> reguler                                                </p>
                                            <p class="sample-text">
                                                <b>Metode Pembayaran :</b> COD                                                </p>
                                            <p class="sample-text">
                                                <b>Waktu Pesanan : </b> 2025-04-29 20:26:26                                                </p>
                                            <p class="sample-text" style="color: rgb(117, 26, 202);">
                                                <b> Pembayaran :</b> Belum dikonfirmasi                                                </p>
                                            <p class="sample-text" style="color: rgb(117, 26, 202);">
                                                <b>Status Pesanan :</b> Sedang Diproses                                                </p>

                                        </div>
                                    </section>

                                    <hr>

                                    <div class="section-top-border text-right">
                                        <h6 class="mb-20" style="font-weight: 800;">Ongkir : Rp5.000</h6>
                                        <h6 class="mb-20" style="font-weight: 800;">Total Pembayaran : Rp 100.000</h6>
                                        <h6 class="mb-20" style="font-weight: 800;">No.Transaksi : TR20250429152626</h6>
                                        <h6 class="mb-20" style="font-weight: 800;">No.Transaksi Detail : TR202504291526266810D38221945</h6>

                                        <td><a href='#' class='btn_1 mb-50' onclick="javascript: window.location.href='';">Batalkan Pesanan</a>
                                                    </td>                                            <hr>

                                    </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- Card two -->

            </div>
            <!-- End Nav Card -->
        </div>
    </section>
</main>
@endsection
