@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcome-list">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="breadcomb-wp">

                        <div class="breadcomb-ctn">
                            <h2 class="text-white mb-0">Tambah Data Users</h2>

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
                                                <form action="{{ route('admin.data_users.store')}}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <!-- <div class="col-lg-4">
                                                                    <div class="pro-edt-img"
                                                                        style="border: 1px solid #cccccc; max-width: 100%; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center;">
                                                                        <img src="img/logo/646e6e2a7fec3admin.jpg"
                                                                            alt="" style="width: 150px; height: 150px;"
                                                                            id="foto" />
                                                                    </div>
                                                                </div> -->
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
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-pencil"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Nama</span>
                                                                                <input type="text" id="name" name="name"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Nama Anda">
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-phone"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Nomor
                                                                                    HP</span>
                                                                                <input type="number" id="nohp"
                                                                                    name="nohp" class="form-control"
                                                                                    placeholder="Masukkan Nomor HP Anda">
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"> <i
                                                                                        class="fa-solid fa-envelope"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Email</span>
                                                                                <input type="email" id="email"
                                                                                    name="email" class="form-control"
                                                                                    placeholder="Masukkan Email Anda">
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"> <i
                                                                                        class="fa-solid fa-lock"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Password</span>
                                                                                <input type="password" id="password"
                                                                                    name="password" class="form-control"
                                                                                    placeholder="Masukkan Password Anda">
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"> <i
                                                                                        class="fa-solid fa-lock"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Konfirmasi Password</span>
                                                                                <input type="password"
                                                                                    id="password_confirmation"
                                                                                    name="password_confirmation"
                                                                                    class="form-control"
                                                                                    placeholder="Konfirmasi Password Anda">
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-user-tag"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Role
                                                                                </span>
                                                                                <div class="form-select-list">
                                                                                    <select
                                                                                        class="form-control custom-select-value"
                                                                                        id="role" name="role">
                                                                                        <option value="" selected>--
                                                                                            Pilih Role --
                                                                                        </option>
                                                                                        <option value="Admin">
                                                                                            Admin
                                                                                        </option>
                                                                                        <option value="Penjual">
                                                                                            Penjual
                                                                                        </option>
                                                                                        <option value="Pembeli">
                                                                                            Pembeli
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-map-marker-alt"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Alamat</span>
                                                                                <input type="text" id="alamat"
                                                                                    name="alamat" class="form-control"
                                                                                    placeholder="Masukkan Alamat Anda">
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-globe-asia"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Provinsi</span>
                                                                                <input type="text" id="provinsi"
                                                                                    name="provinsi" class="form-control"
                                                                                    placeholder="Masukkan Provinsi Anda">
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-city"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Kota</span>
                                                                                <input type="text" id="kota" name="kota"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Kota Anda">
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
                                                                                    placeholder="Masukkan Kecamatan Anda">
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
                                                                                    placeholder="Masukkan Kelurahan Anda">
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-hashtag"
                                                                                        style="color: #ffffff;"></i>
                                                                                    RT</span>
                                                                                <input type="text" id="RT" name="RT"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan RT Anda">
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-hashtag"
                                                                                        style="color: #ffffff;"></i>
                                                                                    RW</span>
                                                                                <input type="text" id="RW" name="RW"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan RW Anda">
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-map"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Kode Pos</span>
                                                                                <input type="text" id="kode_pos"
                                                                                    name="kode_pos" class="form-control"
                                                                                    placeholder="Masukkan Kode Pos Anda">
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-venus-mars"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Jenis
                                                                                    Kelamin
                                                                                </span>
                                                                                <div class="form-select-list">
                                                                                    <select
                                                                                        class="form-control custom-select-value"
                                                                                        id="jenis_kelamin"
                                                                                        name="jenis_kelamin">
                                                                                        <option value="" selected>--
                                                                                            Pilih Jenis Kelamin Anda--
                                                                                        </option>
                                                                                        <option value="Laki-Laki">Laki -
                                                                                            Laki
                                                                                        </option>
                                                                                        <option value="Perempuan">
                                                                                            Perempuan
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-user-check"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Status
                                                                                </span>
                                                                                <div class="form-select-list">
                                                                                    <select
                                                                                        class="form-control custom-select-value"
                                                                                        id="status" name="status">
                                                                                        <option value="" selected>--
                                                                                            Pilih Status User --
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
                                                                            Simpan Data Users
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