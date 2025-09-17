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
                                <h1 class="text-bold">Masuk</h1>
                            </div>
                            @if (session('error'))
                                <div class="alert alert-danger mt-3">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form class="row contact_form" action="{{ route('login')}}" method="POST">
                                @csrf
                                <div class="col-md-12 form-group p_star mt-5">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                        placeholder="Masukkan Email Anda">
                                </div>
                                <div class="col-md-12 form-group p_star mt-3 position-relative">
                                    <input type="password" 
                                        class="form-control @error('password') is-invalid @enderror"
                                        id="password" 
                                        name="password" 
                                        placeholder="Masukkan Password Anda">

                                    <span class="toggle-password" 
                                        onclick="togglePassword()" 
                                        style="position: absolute; right: 25px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                <div class="col-md-12 form-group p_star mt-3 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            Ingat Saya
                                        </label>
                                    </div>

                                    <a href="{{ route('password.request') }}" style="color: rgb(117, 26, 202); font-weight: 500;">
                                        Lupa Password?
                                    </a>
                                </div>
                                <div class="col-md-12 form-group mt-5">
                                    <button type="submit" class="btn_3">
                                        Masuk
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

@if ($errors->has('email'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Email dan Password salah',
            text: 'Harap Periksa kembali Email dan Password anda',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if ($errors->has('password'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Email dan Password salah',
            text: 'Harap Periksa kembali Email dan Password anda',
            confirmButtonText: 'OK'
        });
    </script>
@endif
@if (session('verified'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Akun Berhasil Diverifikasi',
            text: 'Silakan login menggunakan akun Anda.',
            confirmButtonText: 'OK'
        });
    </script>
@endif
@if (session('unverified'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Akun Belum Terverifikasi',
            text: 'Silakan cek email Anda untuk verifikasi akun terlebih dahulu.',
            confirmButtonText: 'OK'
        });
    </script>
@endif
<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    }
</script>

@endsection
