@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcome-list">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="breadcomb-wp">

                        <div class="breadcomb-ctn">
                            <h2 class="text-white mb-0">Tambah Produk</h2>

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
                                                <form action="{{ route('penjual.data_produk.store')}}"
                                                    enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                                                style="margin-top: 20px !important;">

                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="product-edt-pix-wrap">
                                                                                <div
                                                                                    class="mg-b-pro-edt file-upload-inner ts-forms">
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-addon">
                                                                                            <i class="fa-solid fa-image"
                                                                                                style="color: #ffffff;"></i>
                                                                                            Foto Produk
                                                                                        </span>

                                                                                        <div
                                                                                            class="input append-small-btn">
                                                                                            <button type="button"
                                                                                                class="btn btn-primary"
                                                                                                onclick="document.getElementById('foto_produk').click();">
                                                                                                <i
                                                                                                    class="fa-solid fa-upload"></i>
                                                                                                Cari Foto
                                                                                            </button>

                                                                                            <input type="file"
                                                                                                id="foto_produk"
                                                                                                name="foto_produk"
                                                                                                accept="image/*"
                                                                                                style="display: none;"
                                                                                                onchange="document.getElementById('produk').value = this.files[0] ? this.files[0].name : ''">
                                                                                        </div>

                                                                                        <input type="text" id="produk"
                                                                                            placeholder="Silahkan Upload Foto"
                                                                                            readonly
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>




                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-5"
                                                                    style="margin-top: 20px !important;">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-user"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Nama Toko</span>
                                                                                <input type="text" id="penjual_id" name="penjual_id"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Nama Toko Anda"
                                                                                    value="{{Auth::user()->name}}"
                                                                                    readonly>
                                                                                <input type="hidden" id="penjual_id" name="penjual_id"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Nama Toko Anda"
                                                                                    value="{{Auth::user()->id}}"
                                                                                    >
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-box"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Nama Produk</span>
                                                                                <input type="text" id="nama_produk" name="nama_produk"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Nama Produk Anda"

                                                                                    >
                                                                            </div>

                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-tag"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Harga</span>
                                                                                <input type="text" id="harga"
                                                                                    name="harga" class="form-control"
                                                                                    placeholder="Masukkan Harga Produk Anda"
                                                                                  >
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-warehouse"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Stok</span>
                                                                                <input type="text" id="stok" name="stok"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Stok Produk Anda"
                                                                                    >
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-align-left"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Deskripsi</span>
                                                                                <input type="text" id="deskripsi"
                                                                                    name="deskripsi"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Deskripsi Produk Anda"

                                                                                    >
                                                                            </div>

                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-toggle-on"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Status
                                                                                </span>
                                                                                <div class="form-select-list">
                                                                                    <select
                                                                                        class="form-control custom-select-value"
                                                                                        id="status" name="status">
                                                                                        <option value="" selected>--
                                                                                            Pilih Status Produk --
                                                                                        </option>
                                                                                        <option value="ACTIVE">Aktif
                                                                                        </option>
                                                                                        <option value="INACTIVE">
                                                                                            Tidak Aktif
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-12 text-center">
                                                                    <div class="login-horizental cancel-wp">
                                                                        <button class="btn_1" type="submit">
                                                                            Simpan Data
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
