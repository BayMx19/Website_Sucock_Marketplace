@extends('layout.template')
@section('content')
<main style="background-color: #F0F0F0;">
    <section class="popular-items">
        <div class="col-lg-4">
            <div class="blog_right_sidebar">
                <aside class="single_sidebar_widget search_widget">
                    <form action="" method="get">
                        <div class="form-group">
                            <div class="input-group mb-3 ml-40">
                                <input type="text" class="form-control" placeholder='Cari...' name="keyword" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari...'">
                                <div class="input-group-append">
                                    <button class="btns" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </div>

                    </form>
                </aside>
            </div>
        </div>
        <div class="container">
            <div class="row product-btn justify-content-between mb-40">
                <div class="properties__button">
                    <!--Nav Button  -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                <h3>Semua</h3>
                            </a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                <h3>Populer</h3>
                            </a>
                        </div>
                    </nav>
                    <!--End Nav Button  -->
                </div>
            </div>
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="{{ asset('assets') }}/img/JP Gold.jpg" alt="gambar produk" style="width: 400px; height: 370px;">
                                        <a href="/produk/detail">
                                            <div class="img-cap">
                                                <span>Beli Sekarang</span>
                                            </div>
                                        </a>
                                        <!-- <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div> -->
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="">JP Gold</a></h3>

                                        <h4 style="font-weight: 800; color: #548c9a;">Rp. 100.000</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="{{ asset('assets') }}/img/Garuda Gold.jpg" alt="gambar produk" style="width: 400px; height: 370px;">
                                        <a href="">
                                            <div class="img-cap">
                                                <span>Beli Sekarang</span>
                                            </div>
                                        </a>
                                        <!-- <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div> -->
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="">Garuda Gold</a></h3>
                                        <h4 style="font-weight: 800; color: #548c9a;">Rp.85.000</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="{{ asset('assets') }}/img/Alpha New.jpg" alt="gambar produk" style="width: 400px; height: 370px;">
                                        <a href="">
                                            <div class="img-cap">
                                                <span>Beli Sekarang</span>
                                            </div>
                                        </a>
                                        <!-- <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div> -->
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="">Alpha New</a></h3>

                                        <h4 style="font-weight: 800; color: #548c9a;">Rp. 80.000</h4>
                                    </div>
                                </div>
                            </div>
                                                </div>

                </div>
                <!-- Card two -->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="" alt="gambar produk" style="width: 400px; height: 370px;">
                                        <a href="">
                                            <div class="img-cap">
                                                <span>Beli Sekarang</span>
                                            </div>
                                        </a>
                                        <!-- <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div> -->
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="">Garuda Gold</a></h3>
                                        <div class="rating" style="margin-bottom: 5px;">
                                            <i class="fa fa-star" style="color: #24CAA1;">5</i>
                                        </div>
                                        <h4 style="font-weight: 800; color: #548c9a;">Rp. 85.000</h4>
                                    </div>
                                </div>
                            </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="" alt="gambar produk" style="width: 400px; height: 370px;">
                                        <a href="">
                                            <div class="img-cap">
                                                <span>Beli Sekarang</span>
                                            </div>
                                        </a>
                                        <!-- <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div> -->
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="">JP Gold</a></h3>
                                        <div class="rating" style="margin-bottom: 5px;">
                                            <i class="fa fa-star" style="color: #24CAA1;">4</i>
                                        </div>
                                        <h4 style="font-weight: 800; color: #548c9a;">Rp. 100.000</h4>
                                    </div>
                                </div>
                            </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="" alt="gambar produk" style="width: 400px; height: 370px;">
                                        <a href="">
                                            <div class="img-cap">
                                                <span>Beli Sekarang</span>
                                            </div>
                                        </a>
                                        <!-- <div class="favorit-items">
                                    <span class="flaticon-heart"></span>
                                </div> -->
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="">Alpha New</a></h3>
                                        <div class="rating" style="margin-bottom: 5px;">
                                            <i class="fa fa-star" style="color: #24CAA1;">4</i>
                                        </div>
                                        <h4 style="font-weight: 800; color: #548c9a;">Rp. 80.000</h4>
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
