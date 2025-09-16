@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcome-list">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="breadcomb-wp">
                        <div class="breadcomb-ctn">
                            <h2 class="text-white mb-0">Tambah Promo</h2>
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
                                                <form action="{{ route('penjual.data_promo.store') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px !important;">

                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">

                                                                            <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                                                                                    Nama Toko
                                                                                </span>
                                                                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                                                                <input type="hidden" name="penjual_id" value="{{ Auth::user()->id }}">
                                                                            </div>

                                                                            <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa-solid fa-ticket" style="color: #ffffff;"></i>
                                                                                    Nama Promo
                                                                                </span>
                                                                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama Promo Anda">
                                                                            </div>

                                                                            <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa-solid fa-percent" style="color: #ffffff;"></i>
                                                                                    Diskon (%)
                                                                                </span>
                                                                                <input type="number" id="diskon_persen" name="diskon_persen" class="form-control" placeholder="Masukkan Diskon Dalam Persen" min="0" max="100">
                                                                            </div>

                                                                            <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa-solid fa-calendar-days" style="color: #ffffff;"></i>
                                                                                    Tanggal Mulai
                                                                                </span>
                                                                                <input type="date" id="mulai" name="mulai" class="form-control">
                                                                            </div>

                                                                            <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa-solid fa-calendar-xmark" style="color: #ffffff;"></i>
                                                                                    Tanggal Selesai
                                                                                </span>
                                                                                <input type="date" id="selesai" name="selesai" class="form-control">
                                                                            </div>

                                                                            <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon">
                                                                                    <i class="fa-solid fa-toggle-on" style="color: #ffffff;"></i>
                                                                                    Status
                                                                                </span>
                                                                                <div class="form-select-list">
                                                                                    <select class="form-control custom-select-value" id="status" name="status">
                                                                                        <option value="" selected>-- Pilih Status Promo --</option>
                                                                                        <option value="ACTIVE">Aktif</option>
                                                                                        <option value="INACTIVE">Tidak Aktif</option>
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
