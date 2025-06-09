@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcome-list">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="breadcomb-wp">

                        <div class="breadcomb-ctn">
                            <h2 style="margin-top: 15px;" class="text-white">Profile Saya</h2>
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
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div id="myTabContent1" class="tab-content">
                                                <div class="product-tab-list tab-pane fade active in"
                                                    style="border: 1px solid #cccccc; max-width: 100%; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; margin: 30px 0px 0px 30px;">
                                                    <img src="{{ Auth::user()->foto_profil ? asset('storage/' . Auth::user()->foto_profil) : asset('/assets/img/default-user.png') }}"
                                                        alt="" style="width: 150px; height: 150px;" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="single-product-details res-pro-tb">
                                                <div class="single-pro-cn">
                                                    <h2 style="margin-top: 20px !important">Informasi Akun</h2>
                                                    <h4 style="margin-top: 25px;">Nama : {{$profilPenjual->name}}</h4>
                                                    <h4 style="margin-top: 15px;">Email : {{$profilPenjual->email}}</h4>
                                                    <h4 style="margin-top: 15px;">Role : {{$profilPenjual->role}}</h4>
                                                    <h4 style="margin-top: 15px;">No. HP : {{$profilPenjual->nohp}}</h4>
                                                    <h4 style="margin-top: 15px;">Jenis Kelamin :
                                                        {{$profilPenjual->jenis_kelamin}}</h4>
                                                    <h4 style="margin-top: 15px;">Status Akun : {{$profilPenjual->status}}
                                                    </h4>
                                                    <h2 style="margin-top: 20px !important">Informasi Alamat</h2>
                                                    @php
                                                    $alamat = $profilPenjual->dataAlamat->first();
                                                    @endphp
                                                    <h4 style="margin-top: 15px;">Alamat : {{$alamat->alamat ?? ''}}</h4>
                                                    <h4 style="margin-top: 15px;">Provinsi : {{$alamat->provinsi ?? ''}}
                                                    </h4>
                                                    <h4 style="margin-top: 15px;">Kota : {{$alamat->kota ?? ''}}</h4>
                                                    <h4 style="margin-top: 15px;">Kecamatan :
                                                        {{$alamat->kecamatan ?? ''}}</h4>
                                                    <h4 style="margin-top: 15px;">Kelurahan :
                                                        {{$alamat->kelurahan ?? ''}}</h4>
                                                    <h4 style="margin-top: 15px;">RT : {{$alamat->RT ?? ''}}</h4>
                                                    <h4 style="margin-top: 15px;">RW : {{$alamat->RW ?? ''}}</h4>
                                                    <h4 style="margin-top: 15px;">Kode Pos : {{$alamat->kode_pos ?? ''}}
                                                    </h4>
                                                    </h4>

                                                </div>
                                                <div class="single-pro-cn"
                                                    style="margin-top: 30px; margin-bottom: 30px;">
                                                    <a href="/penjual/profile/{{$profilPenjual->id}}/edit"><button data-toggle="tooltip"
                                                            title="Edit" class="btn_1">Edit Data</button></a>
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
