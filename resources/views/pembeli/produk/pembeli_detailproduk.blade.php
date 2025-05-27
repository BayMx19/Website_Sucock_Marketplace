@extends('layout.template')
@section('content')
<main style="background-color: #F0F0F0;">
    <section class="popular-items">
        <div class="container">

            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent" style="margin: -20px;">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="whole-wrap">
                                                        <div class="container ml-20">
                                <div class="col-md-12">
                                    <div class="section-top-border">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="" alt="" class="img-fluid" style="border-radius: 30px;">
                                                    </div>
                                                    <div class="col-md-4 mt-50">
                                                        <h5 style="font-weight: 800;">lasmijan.sport</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-flex justify-content-end" >
                                            <a href="" class="mt-20">
                                                <i class="fa-solid fa-message fa-2xl mt-50 ms-auto" style="color: black"></i>
                                                <h6>  Chat Penjual </h6>
                                            </a>

                                        </div>
                                        <div class="row mt-20">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <img src="{{ asset('assets') }}/img/JP Gold.jpg" alt="" style="width: 470px; height: 450px;">
                                            </div>
                                            <div class="col-md-6">
                                                <h2 class="mt-10" style="font-weight: 800;">JP Gold</h2>
                                                <h5 class="mt-10" style="font-weight: 800; color: #548c9a;">Rp. 100.000</h5>
                                                <h5 class="mt-10" style="color: rgb(0, 0, 0);">Detail : <br> - Kualitas tinggi, desain elegan, dan cocok untuk pertandingan.<br />
- Bahan : bulu entok berkualitas<br />
- Berat : 250 Gram </h5>
                                                <div class="card_area" style="margin-top: 0px;">
                                                    <div class="product_count_area">
                                                        <h5>Stok : 21</h5>
                                                    </div>
                                                </div>

                                                <form action="" method="POST">
                                                    <div class="card_area" style="margin-top: 0px;">
                                                        <div class="product_count_area">
                                                            <div class="product_count d-inline-block" style="margin: 20px;">
                                                                <input class="product_count_item input-number" id="jumlah" name="jumlah" type="number" value="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="section-top-border">
                                                        <input type="submit" value="Masukkan ke Keranjang" class="btn_1 mb-50"></a>
                                                    </div>
                                            </div>


                                            <div class="col-md-3" style="margin-top: 30px;">
                                                <img src="" alt="" style="width: 200px; height: 180px;">
                                            </div>

                                            <div class="col-md-3" style="margin-top: 30px;">
                                                <img src="" alt="" style="width: 200px; height: 180px;">
                                            </div>

                                        </div>
                                    </div>

                                    </form>
                                </div>
                                                                        <div class="row product-btn">
                                        <div class="properties__button">
                                            <!--Nav Button  -->
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin-top: 50px;">
                                                    <a class="nav-item nav-link active" id="nav-home-tab" aria-controls="nav-home" aria-selected="true">
                                                        <h3>Review <i class="fa fa-star" style="color: #24CAA1;"> 4</i></h3>
                                                    </a>
                                                </div>
                                            </nav>
                                            <!--End Nav Button  -->
                                        </div>
                                        <!-- Grid and List view -->
                                        <div class="grid-list-view">
                                        </div>
                                    </div>
                                    <div class="row mb-40 mt-20">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img src="" alt="" class="img-fluid" style="border-radius: 100%; width:100px; height:100px;">
                                                </div>
                                                <div class="col-md-9">
                                                    <h6 style="font-weight: 800;">Kurnia sari</h6>
                                                    <i class="fa fa-star" style="color: #24CAA1;"></i><i class="fa fa-star" style="color: #24CAA1;"></i><i class="fa fa-star" style="color: #24CAA1;"></i><i class="fa fa-star" style="color: #24CAA1;"></i>
                                                    <p style="color: rgb(107, 107, 107);">Shuttlecock JP Gold sangat berkualitas! Bulu yang digunakan sangat stabil dan tahan lama. Cocok untuk latihan maupun pertandingan.</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                </div>
                                                </div>
                </div>

            </div>
            <!-- End Nav Card -->
        </div>
    </section>
</main>
@endsection
