@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcome-list">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="breadcomb-wp">
                        <div class="breadcomb-ctn">
                            <h2 class="text-white mb-0">Edit Promo</h2>
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
                                            <form action="{{ route('penjual.data_promo.update', $promo->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                {{-- Nama Promo --}}
                                                <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                    <span class="input-group-addon">
                                                        <i class="fa-solid fa-tag" style="color: #ffffff;"></i> 
                                                        Nama Promo
                                                    </span>
                                                    <input type="text" name="nama" class="form-control"
                                                        value="{{ old('nama', $promo->nama) }}"
                                                        placeholder="Masukkan Nama Promo">
                                                </div>

                                                {{-- Diskon Persen --}}
                                                <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                    <span class="input-group-addon">
                                                        <i class="fa-solid fa-percent" style="color: #ffffff;"></i> 
                                                        Diskon (%)
                                                    </span>
                                                    <input type="number" name="diskon_persen" class="form-control"
                                                        value="{{ old('diskon_persen', $promo->diskon_persen) }}"
                                                        placeholder="Masukkan Persentase Diskon">
                                                </div>

                                                {{-- Tanggal Mulai --}}
                                                <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                    <span class="input-group-addon">
                                                        <i class="fa-solid fa-calendar-day" style="color: #ffffff;"></i> 
                                                        Mulai
                                                    </span>
                                                    <input type="date" name="mulai" class="form-control"
                                                        value="{{ old('mulai', $promo->mulai) }}">
                                                </div>

                                                {{-- Tanggal Selesai --}}
                                                <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                    <span class="input-group-addon">
                                                        <i class="fa-solid fa-calendar-check" style="color: #ffffff;"></i> 
                                                        Selesai
                                                    </span>
                                                    <input type="date" name="selesai" class="form-control"
                                                        value="{{ old('selesai', $promo->selesai) }}">
                                                </div>

                                                {{-- Status --}}
                                                <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                    <span class="input-group-addon">
                                                        <i class="fa-solid fa-toggle-on" style="color: #ffffff;"></i> 
                                                        Status
                                                    </span>
                                                    <div class="form-select-list">
                                                        <select class="form-control custom-select-value" name="status">
                                                            <option value="ACTIVE" {{ $promo->status == 'ACTIVE' ? 'selected' : '' }}>Aktif</option>
                                                            <option value="INACTIVE" {{ $promo->status == 'INACTIVE' ? 'selected' : '' }}>Tidak Aktif</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Tombol Simpan --}}
                                                <div class="form-group-inner">
                                                    <div class="login-btn-inner">
                                                        <div class="row">
                                                            <div class="col-12 text-center">
                                                                <div class="login-horizental cancel-wp">
                                                                    <button class="btn_1" type="submit">
                                                                        Simpan Perubahan
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
