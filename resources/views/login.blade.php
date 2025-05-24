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
                            <h1  style="padding: 150px; margin-top: 50px; font-weight: 700;">Login</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form" style="background-color: white;">
                        <div class="login_part_form_iner">
                            <form class="row contact_form" action="" method="POST" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username / Email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="btn_3">
                                        Login
                                    </button>
                                    <p class="lost_pass" style="font-weight: 500;">Belum Punya Akun?<a href="{{ route('daftar') }}" style="color: rgb(117, 26, 202);"> Daftar Sekarang</a></p>
                                    <p class="lost_pass" style="font-weight: 500;">Gabung Sebagai Penjual?<a href="{{ route('daftarpenjual') }}" style="color: rgb(117, 26, 202);"> Klik Disini</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
