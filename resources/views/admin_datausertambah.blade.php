@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcome-list">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="breadcomb-wp">
                        <div class="breadcomb-icon">
                            <i class="fa-solid fa-house" style="color: #0f0f0f;"></i>
                        </div>
                        <div class="breadcomb-ctn">
                            <h2>Tambah Data</h2>
                            <p>Silahkan Isi Form Tambah</p>
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
                                        <form action="" method="POST" enctype="multipart/form-data">

                                            <div class="form-group-inner">
                                                <div class="row">
                                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-lg-4">
                                                            <div class="pro-edt-img" style="border: 1px solid #cccccc; max-width: 100%; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center;">
                                                                <img src="img/logo/646e6e2a7fec3admin.jpg" alt="" style="width: 150px; height: 150px;" id="foto" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="product-edt-pix-wrap">
                                                                        <div class="mg-b-pro-edt file-upload-inner ts-forms">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"> <i class="fa-solid fa-image" style="color: #ffffff;"></i> Foto Profil</span>
                                                                                <div class="input append-small-btn">
                                                                                    <div class="file-button"><i class="fa-solid fa-upload" style="color: #ffffff;"></i>
                                                                                        Upload
                                                                                        <input type="file" id="foto" name="foto" onchange="document.getElementById('profil').value = this.value;">
                                                                                    </div>
                                                                                </div>
                                                                                <input type="text" id="profil" placeholder="Silahkan Upload Foto">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                            <span class="input-group-addon"><i class="fa-solid fa-pencil" style="color: #ffffff;"></i> Nama</span>
                                                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                                                        </div>
                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                            <span class="input-group-addon"><i class="fa-solid fa-id-card" style="color: #fefefe;"></i> Username</span>
                                                            <input type="text" id="user" name="user" class="form-control" placeholder="Username">
                                                        </div>
                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                            <span class="input-group-addon"><i class="fa-solid fa-venus-mars" style="color: #ffffff;"></i> Jenis Kelamin </span>
                                                            <div class="form-select-list">
                                                                <select class="form-control custom-select-value" id="gender" name="gender">
                                                                    <option value="L" >Laki - Laki</option>
                                                                    <option value="P" selected>Perempuan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-group mg-b-pro-edt mg-r-pro-edt ts-forms">
                                                            <span class="input-group-addon"> <i class="fa-solid fa-envelope" style="color: #ffffff;"></i> Email</span>
                                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                                                        </div>
                                                        <div class="input-group mg-b-pro-edt mg-r-pro-edt ts-forms">
                                                            <span class="input-group-addon"><i class="fa-solid fa-phone" style="color: #ffffff;"></i> No. Hp</span>
                                                            <input type="number" id="nohp" name="nohp" class="form-control" placeholder="No Hp">
                                                        </div>
                                                        <div class="input-group mg-b-pro-edt mg-r-pro-edt ts-forms" style="margin-bottom: 25px;">
                                                            <span class="input-group-addon"><i class="fa-solid fa-location-dot" style="color: #ffffff;"></i> Alamat </span>
                                                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat User"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <div class="login-horizental cancel-wp">
                                                                <button
                                                                    class="btn_1"

                                                                    type="submit">
                                                                    Simpan
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
@endsection
