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
                                <h1 class="text-bold">Login</h1>
                            </div>
                            <form class="row contact_form" action="{{ route('login')}}" method="POST">
                                @csrf
                                <div class="col-md-12 form-group p_star mt-5">
                                    <input type="text" class="form-control @eror('email')" id="email" name="email"
                                        placeholder="Masukkan Email Anda">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group p_star mt-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Masukkan Password Anda">
                                </div>
                                <div class="col-md-12 form-group p_star mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group mt-5">
                                    <button type="submit" class="btn_3">
                                        Login
                                    </button>
                                    <p class="lost_pass text-center" style="font-weight: 500;">Belum Punya Akun?<a
                                            href="{{ route('register') }}" style="color: rgb(117, 26, 202);"> Daftar
                                            Sekarang!</a></p>
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
