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
                            <h2>Edit Data</h2>
                            <p>Silahkan Isi Form Edit</p>
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
                                            <input type="hidden" name="aksi" id="aksi" value="edit" />
                                            <input type="hidden" name="hid" id="hid" value="" />
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
                                                                                <span class="input-group-addon"> <input type="checkbox" name="cbcek" id="cbcek" value="GANTI" onclick="javascript: if(this.checked==true){
                                                                                    document.getElementById('foto').style.display='none';
                                                                                    }else{
                                                                                    document.getElementById('foto').style.display='block'; }" /></span>
                                                                                <div class="input append-small-btn">
                                                                                    <div class="file-button">
                                                                                        Upload
                                                                                        <input type="file" id="foto" name="foto" onchange="document.getElementById('profil').value = this.value;">
                                                                                    </div>
                                                                                </div>
                                                                                <input type="text" id="profil" placeholder="Centang jika foto mau diganti ">
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
                                                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="fifit syafaaty">
                                                        </div>
                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                            <span class="input-group-addon"><i class="fa-solid fa-id-card" style="color: #fefefe;"></i> Username</span>
                                                            <input type="text" id="user" name="user" class="form-control" placeholder="Username" value="fifit10">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-group mg-b-pro-edt mg-r-pro-edt ts-forms">
                                                            <span class="input-group-addon"> <i class="fa-solid fa-envelope" style="color: #ffffff;"></i> Email</span>
                                                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="fifit.21001@mhs.unesa.ac.id">
                                                        </div>
                                                        <div class="input-group mg-b-pro-edt mg-r-pro-edt ts-forms">
                                                            <span class="input-group-addon"><i class="fa-solid fa-phone" style="color: #ffffff;"></i> No. Hp</span>
                                                            <input type="number" id="nohp" name="nohp" class="form-control" placeholder="No Hp" value="085816353523">
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
