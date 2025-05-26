@extends('layout.template')
@section('content')
<main style="background-color: #f0f0f0;">
    <!--================login_part Area =================-->
    <section class="login_part p-1">
        <div class="auth-container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 px-0">
                    <div class="login_part_text text-center">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 px-0">
                    <div class="login_part_form" style="background-color: white;">
                        
                        <div class="login_part_form_iner">
                            <div class="login_part_text_iner w-100 text-center">
                                <h1 class="text-bold">Daftar</h1>
                            </div>
                            <form class="row contact_form" action="{{ route('register')}}" method="POST">
                                @csrf
                                <div class="col-md-12 form-group p_star mt-5">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Nama Toko" required>
                                </div>
                                <div class="col-md-12 form-group p_star mt-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Pengguna"
                                        required>
                                </div>
                                <div class="col-md-12 form-group p_star mt-3">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" required>
                                </div>
                                <input type="hidden" name="role" value="penjual">
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="btn_3">
                                        Daftar
                                    </button>
                                    <p class="lost_pass" style="font-weight: 500;">Sudah Punya Akun?
                                        <a href="{{ route('login') }}" style="color: rgb(117, 26, 202);">Login
                                            Disini</a>
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
