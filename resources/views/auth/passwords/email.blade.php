@extends('layout.template')

@section('content')
<main style="background-color: #f0f0f0;">
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
                                <h1 class="text-bold">Reset Password</h1>
                                <p class="mt-2">Masukkan email Anda untuk menerima link reset password.</p>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success mt-3">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form class="row contact_form" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="col-md-12 form-group p_star mt-5">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}"
                                        placeholder="Masukkan Email Anda"
                                        required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 form-group mt-5">
                                    <button type="submit" class="btn_3">
                                        Kirim Link Reset Password
                                    </button>
                                    <p class="lost_pass text-center mt-3" style="font-weight: 500;">
                                        <a href="{{ route('login') }}" style="color: rgb(117, 26, 202);">Kembali ke Login</a>
                                    </p>
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
