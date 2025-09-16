@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12">
        <div class="breadcome-list">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcomb-wp">
                        <div class="breadcomb-ctn">
                            <h2 class="text-white mb-0">Detail Promo</h2>
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
            <div class="col-lg-12">
                <div style="margin-top: 30px;">
                    <div class="sparkline12-list">
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">

                                            {{-- Nama Promo --}}
                                            <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                <span class="input-group-addon">
                                                    <i class="fa-solid fa-tag" style="color: #ffffff;"></i> 
                                                    Nama Promo
                                                </span>
                                                <input type="text" class="form-control" 
                                                    value="{{ $promo->nama }}" readonly>
                                            </div>

                                            {{-- Diskon Persen --}}
                                            <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                <span class="input-group-addon">
                                                    <i class="fa-solid fa-percent" style="color: #ffffff;"></i> 
                                                    Diskon (%)
                                                </span>
                                                <input type="text" class="form-control" 
                                                    value="{{ $promo->diskon_persen }}%" readonly>
                                            </div>

                                            {{-- Tanggal Mulai --}}
                                            <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                <span class="input-group-addon">
                                                    <i class="fa-solid fa-calendar-day" style="color: #ffffff;"></i> 
                                                    Mulai
                                                </span>
                                                <input type="text" class="form-control" 
                                                    value="{{ \Carbon\Carbon::parse($promo->mulai)->translatedFormat('d F Y') }}" readonly>
                                            </div>

                                            {{-- Tanggal Selesai --}}
                                            <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                <span class="input-group-addon">
                                                    <i class="fa-solid fa-calendar-check" style="color: #ffffff;"></i> 
                                                    Selesai
                                                </span>
                                                <input type="text" class="form-control" 
                                                    value="{{ \Carbon\Carbon::parse($promo->selesai)->translatedFormat('d F Y') }}" readonly>
                                            </div>

                                            {{-- Status --}}
                                            <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                <span class="input-group-addon">
                                                    <i class="fa-solid fa-toggle-on" style="color: #ffffff;"></i> 
                                                    Status
                                                </span>
                                                <input type="text" class="form-control"
                                                    value="{{ $promo->status == 'ACTIVE' ? 'Aktif' : 'Tidak Aktif' }}" readonly>
                                            </div>

                                            {{-- Tombol Kembali --}}
                                            <div class="form-group-inner">
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <div class="login-horizental cancel-wp">
                                                                <a href="{{ route('penjual.data_promo.index') }}" class="btn_1">
                                                                    Kembali
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div> {{-- end all-form-element-inner --}}
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
