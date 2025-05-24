@extends('layout.template')
@section('content')
<main style="background-color: #f0f0f0;">
    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h1 style="padding: 150px; margin-top: 50px; font-weight: 700;">Daftar</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form" style="background-color: white;">
                        <div class="login_part_form_iner">
                            <form class="row contact_form" action="" method="POST" enctype="multipart/form-data" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <label style="margin-left: 10px;">Foto Profil</label>
                                    <input type="file" class="form-control" id="fotoprofil" name="fotoprofil" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No.Hp" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required></textarea>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="btn_3">
                                        Daftar
                                    </button>
                                    <p class="lost_pass" style="font-weight: 500;">Sudah Punya Akun?
                                        <a href="{{ route('login') }}" style="color: rgb(117, 26, 202);">Login Disini</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
</main>
@endsection
