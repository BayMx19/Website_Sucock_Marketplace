@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcome-list">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="breadcomb-wp">

                        <div class="breadcomb-ctn">
                            <h2 class="text-white mb-0">Detail Pesanan</h2>

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
                                                <form action="{{ route('admin.data_users.update', $pesanan->id)}}"
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
                                                                                        class="fa-solid fa-pencil"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Kode Pesanan</span>
                                                                                <input type="text" id="kode_pesanan"
                                                                                    name="kode_pesanan"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Kode Pesanan"
                                                                                    value="{{$pesanan->kode_pesanan}}"
                                                                                    readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-tag"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Total Harga</span>
                                                                                <input type="text" id="total_harga"
                                                                                    name="total_harga"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Total Harga"
                                                                                    value="{{$pesanan->total_harga}}"
                                                                                    readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-calendar"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Tanggal Pesanan</span>
                                                                                <input type="date" id="tanggal_pesanan"
                                                                                    name="tanggal_pesanan"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Tanggal Pesanan"
                                                                                    value="{{$pesanan->tanggal_pesanan}}"
                                                                                    readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"> <i
                                                                                        class="fa-solid fa-toggle-on"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Status Pesanan</span>
                                                                                <input type="text" id="status_pesanan"
                                                                                    name="status_pesanan"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Status Pesanan "
                                                                                    value="{{$pesanan->status_pesanan}}"
                                                                                    readonly>
                                                                            </div>

                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-user"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Nama Pembeli
                                                                                </span>
                                                                                <input type="text" id="nama_pembeli"
                                                                                    name="nama_pembeli"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Nama Pembeli "
                                                                                    value="{{$pesanan->nama_pembeli}}"
                                                                                    readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-box"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Nama Produk</span>
                                                                                <input type="text" id="nama_produk"
                                                                                    name="nama_produk"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Nama Produk "
                                                                                    value="{{$pesanan->nama_produk}}"
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
                                                                                    value="{{$pesanan->nama_penjual}}"
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