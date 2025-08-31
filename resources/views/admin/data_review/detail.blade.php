@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcome-list">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="breadcomb-wp">

                        <div class="breadcomb-ctn">
                            <h2 class="text-white mb-0">Detail Review</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 30px;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="{{ route('admin.data_users.update', $review->id)}}"
                                                    enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                                                style="margin-top: 20px !important;">

                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-5"
                                                                    style="margin-top: 20px !important;">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-user"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Nama Pembeli</span>
                                                                                <input type="text" id="nama_pembeli"
                                                                                    name="nama_pembeli"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Nama Pembelin"
                                                                                    value="{{$review->nama_pembeli}}"
                                                                                    readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-tag"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Nama Produk</span>
                                                                                <input type="text" id="nama_produk"
                                                                                    name="nama_produk"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Nama Produk"
                                                                                    value="{{$review->nama_produk}}"
                                                                                    readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-user"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Nama Penjual</span>
                                                                                <input type="text" id="nama_penjual"
                                                                                    name="nama_penjual"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Nama Penjual"
                                                                                    value="{{$review->nama_penjual}}"
                                                                                    readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-pencil"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Kode Pesanan</span>
                                                                                <input type="text" id="kode_pesanan"
                                                                                    name="kode_pesanan"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Kode Pesanan"
                                                                                    value="{{$review->kode_pesanan}}"
                                                                                    readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"> <i
                                                                                        class="fa-solid fa-star"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Bintang</span>
                                                                                <input type="text" id="bintang"
                                                                                    name="bintang" class="form-control"
                                                                                    placeholder="Masukkan Bintang "
                                                                                    value="{{$review->bintang}}"
                                                                                    readonly>
                                                                            </div>

                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-pencil"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Ulasan
                                                                                </span>
                                                                                <input type="text" id="review_text"
                                                                                    name="review_text"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Review "
                                                                                    value="{{$review->review_text}}"
                                                                                    readonly>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group-inner">
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-12 text-center">
                                                                    <div class="login-horizental cancel-wp">
                                                                        <button class="btn_1" type="submit">
                                                                            Simpan Data Users
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </form>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
