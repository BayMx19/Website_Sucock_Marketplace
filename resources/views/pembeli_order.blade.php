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
                                    <h3>Order</h3>
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
                    <div class="tab-pane fade show active">
                        <div class="whole-wrap">
                            <div class="container ml-20">
                                <div class="col-md-12">
                                                                            <div class="section-top-border">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6 class="mb-30" style="font-weight: 800;">2 Produk</h6>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="mb-30 text-right" style="color: rgb(117, 26, 202);">Sedang Diproses</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2" style="background-color: #F0F0F0;">
                                                    <img src="" alt="Foto Produk" class="img-fluid" style='width: 170px; height: 150px;'>
                                                </div>
                                                <div class="col-md-4" style="background-color: #F0F0F0;">
                                                    <h6 class="mt-10 text-center" style="font-weight: 600;">JP Gold</h6>
                                                    <h6 class="mt-10 text-center" style="font-weight: 800; color: #E8AEB1;">Rp. 100.000</h6>
                                                    <h6 class="mt-10 text-center" style="color: darkgray;">Jumlah : 2</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section-top-border text-right">
                                            <h6 style="font-weight: 800;">No. Transaksi : TR20250429152626</h6>
                                            <h6 style="font-weight: 800;">Total Pembayaran : Rp. 100.000</h6>
                                            <a href="/order/detail">
                                                <h6 class="mb-20" style="color: rgb(117, 26, 202);">Lihat Detail Pesanan ></h6>
                                            </a>
                                            <td><a href='#' class='btn_1 mb-50' onclick="javascript: window.location.href=''; ">Batalkan Pesanan</a>
                                                        </td>                                        </div>


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
