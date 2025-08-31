@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcome-list">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="breadcomb-wp">

                        <div class="breadcomb-ctn">
                            <h2 class="text-white mb-0">Detail Toko</h2>

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
                                                <form action="{{ route('admin.data_users.update', $toko->id)}}"
                                                    enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                                                style="margin-top: 20px !important;">
                                                                <div class="col-lg-12">
                                                                    <div class="pro-edt-img"
                                                                        style="border: 1px solid #cccccc; max-width: 100%; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                                                        <img src="{{ asset('storage/' . $toko->foto_profil) }}"
                                                                            alt="Foto Profil {{$toko->name}}"
                                                                            style="width: 150px; height: 150px;"
                                                                            id="foto" />


                                                                    </div>
                                                                </div>
                                                                <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="product-edt-pix-wrap">
                                                                                <div
                                                                                    class="mg-b-pro-edt file-upload-inner ts-forms">
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-addon">
                                                                                            <i class="fa-solid fa-image"
                                                                                                style="color: #ffffff;"></i>
                                                                                            Foto Profil
                                                                                        </span>

                                                                                        <div
                                                                                            class="input append-small-btn">
                                                                                            <button type="button"
                                                                                                class="btn btn-primary"
                                                                                                onclick="document.getElementById('foto_profil').click();">
                                                                                                <i
                                                                                                    class="fa-solid fa-upload"></i>
                                                                                                Cari Foto
                                                                                            </button>

                                                                                            <input type="file"
                                                                                                id="foto_profil"
                                                                                                name="foto_profil"
                                                                                                accept="image/*"
                                                                                                style="display: none;"
                                                                                                onchange="document.getElementById('profil').value = this.files[0] ? this.files[0].name : ''">
                                                                                        </div>

                                                                                        <input type="text" id="profil"
                                                                                            placeholder="Silahkan Upload Foto"
                                                                                            readonly
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>




                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-5"
                                                                    style="margin-top: 20px !important;">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-pencil"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Nama Toko</span>
                                                                                <input type="text" id="name" name="name"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Nama Toko Anda"
                                                                                    value="{{$toko->name}}" readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-phone"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Nomor
                                                                                    HP Toko</span>
                                                                                <input type="number" id="nohp"
                                                                                    name="nohp" class="form-control"
                                                                                    placeholder="Masukkan Nomor HP Toko Anda"
                                                                                    value="{{$toko->nohp}}" readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"> <i
                                                                                        class="fa-solid fa-envelope"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Email Toko</span>
                                                                                <input type="email" id="email"
                                                                                    name="email" class="form-control"
                                                                                    placeholder="Masukkan Email Toko Anda"
                                                                                    value="{{$toko->email}}" readonly>
                                                                            </div>

                                                                            <!-- <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-user-tag"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Role
                                                                                </span>
                                                                                <input type="text" id="role" name="role"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Role Anda"
                                                                                    value="{{$toko->role}}" readonly>
                                                                            </div> -->
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-map-marker-alt"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Alamat Toko</span>
                                                                                <input type="text" id="alamat"
                                                                                    name="alamat" class="form-control"
                                                                                    placeholder="Masukkan Alamat Toko Anda"
                                                                                    value="{{$toko->alamat->alamat ?? '-'}}" readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-globe-asia"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Provinsi</span>
                                                                                <input type="text" id="provinsi"
                                                                                    name="provinsi" class="form-control"
                                                                                    placeholder="Masukkan Provinsi Toko Anda"
                                                                                    value="{{$toko->alamat->provinsi ?? '-'}}"
                                                                                    readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-city"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Kota</span>
                                                                                <input type="text" id="kota" name="kota"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Kota Toko Anda"
                                                                                    value="{{$toko->alamat->kota ?? '-'}}" readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-map"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Kecamatan</span>
                                                                                <input type="text" id="kecamatan"
                                                                                    name="kecamatan"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Kecamatan Toko Anda"
                                                                                    value="{{$toko->alamat->kecamatan ?? '-'}}"
                                                                                    readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-map"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Kelurahan</span>
                                                                                <input type="text" id="kelurahan"
                                                                                    name="kelurahan"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Kelurahan Toko Anda"
                                                                                    value="{{$toko->alamat->kelurahan ?? '-'}}"
                                                                                    readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-hashtag"
                                                                                        style="color: #ffffff;"></i>
                                                                                    RT</span>
                                                                                <input type="text" id="RT" name="RT"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan RT Toko Anda"
                                                                                    value="{{$toko->alamat->RT ?? '-'}}" readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-hashtag"
                                                                                        style="color: #ffffff;"></i>
                                                                                    RW</span>
                                                                                <input type="text" id="RW" name="RW"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan RW Toko Anda"
                                                                                    value="{{$toko->alamat->RW ?? '-'}}" readonly>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-map"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Kode Pos</span>
                                                                                <input type="text" id="kode_pos"
                                                                                    name="kode_pos" class="form-control"
                                                                                    placeholder="Masukkan Kode Pos Toko Anda"
                                                                                    value="{{$toko->alamat->kode_pos ?? '-'}}"
                                                                                    readonly>
                                                                            </div>
                                                                            <!-- <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-venus-mars"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Jenis
                                                                                    Kelamin
                                                                                </span>
                                                                                <input type="text" id="jenis_kelamin"
                                                                                    name="jenis_kelamin"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Jenis Kelamin Anda"
                                                                                    value="{{$toko->jenis_kelamin}}"
                                                                                    readonly>
                                                                            </div> -->
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-user-check"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Status Toko
                                                                                </span>
                                                                                <input type="text" id="status"
                                                                                    name="status" class="form-control"
                                                                                    placeholder="Masukkan Status Toko Anda"
                                                                                    value="{{ $toko->status == 'ACTIVE' ? 'Aktif' : ($toko->status == 'INACTIVE' ? 'Tidak Aktif' : $toko->status) }}" readonly>
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