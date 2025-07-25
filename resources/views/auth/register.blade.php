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
                                        placeholder="Nama Lengkap Pengguna" required>
                                </div>
                                <div class="col-md-12 form-group p_star mt-3">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email Pengguna" required>
                                </div>
                                <div class="col-md-12 form-group p_star mt-3">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" required>
                                </div>
                                <div class="col-md-12 form-group p_star mt-3">
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Konfirmasi Password" required>
                                </div>

                                <input type="hidden" name="role" value="Pembeli">
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="btn_3">
                                        Daftar
                                    </button>
                                    <p class="lost_pass" style="font-weight: 500;">Sudah Punya Akun?
                                        <a href="{{ route('login') }}" style="color: rgb(117, 26, 202);">Login
                                            Disini</a>
                                    </p>
                                    <p class="lost_pass" style="font-weight: 500;">Bergabung Sebagai Mitra Kami?
                                        <a href="{{ route('daftarpenjual') }}" style="color: rgb(117, 26, 202);">Gabung
                                            Sekarang</a>
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

@if ($errors->any())
    @php
        $nameErrors = $errors->get('name');
        $emailErrors = $errors->get('email');
        $passwordErrors = $errors->get('password');
    @endphp

    @if ($nameErrors)
        @foreach ($nameErrors as $msg)
            @if (str_contains($msg, 'required'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Nama Harus Diisi',
                        text: 'Silakan isi nama terlebih dahulu.',
                        confirmButtonText: 'OK'
                    });
                </script>
            @elseif (str_contains($msg, 'may only contain letters and spaces'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Format Nama Kurang Tepat',
                        text: 'Harap isikan nama anda dengan sesuai.',
                        confirmButtonText: 'OK'
                    });
                </script>
            @elseif (str_contains($msg, 'may not be greater than'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Nama Terlalu Panjang',
                        text: 'Harap isikan nama anda dengan sesuai.',
                        confirmButtonText: 'OK'
                    });
                </script>
            @else
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan Nama',
                        text: '{{ $msg }}',
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif
        @endforeach
    @endif

    @if ($emailErrors)
        @foreach ($emailErrors as $msg)
            @if (str_contains($msg, 'has already been taken'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Email Terpakai',
                        text: 'Email telah digunakan. Silakan gunakan email lain.',
                        confirmButtonText: 'OK'
                    });
                </script>
            @elseif (str_contains($msg, 'must be a valid email'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Format Email Salah',
                        text: 'Silakan masukkan email yang benar.',
                        confirmButtonText: 'OK'
                    });
                </script>
            @elseif (str_contains($msg, 'required'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Email Wajib Diisi',
                        text: 'Silakan masukkan email terlebih dahulu.',
                        confirmButtonText: 'OK'
                    });
                </script>
            @else
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan Email',
                        text: '{{ $msg }}',
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif
        @endforeach
    @endif

    @if ($passwordErrors)
        @foreach ($passwordErrors as $msg)
            @if (str_contains($msg, 'required'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Password Wajib Diisi',
                        text: 'Silakan masukkan password terlebih dahulu.',
                        confirmButtonText: 'OK'
                    });
                </script>
            @elseif (str_contains($msg, 'at least 8 characters'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Password Terlalu Pendek',
                        text: 'Password minimal harus 8 karakter.',
                        confirmButtonText: 'OK'
                    });
                </script>
            @elseif (str_contains($msg, 'confirmation does not match'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Konfirmasi Password Tidak Cocok',
                        text: 'Ulangi password dan pastikan cocok dengan konfirmasi.',
                        confirmButtonText: 'OK'
                    });
                </script>
            @elseif (str_contains($msg, 'format is invalid'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Format Password Salah',
                        text: 'Password paling tidak harus terdiri dari huruf kecil, huruf besar, simbol, dan angka.',
                        confirmButtonText: 'OK'
                    });
                </script>
            @else
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Kesalahan Password',
                        text: '{{ $msg }}',
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif
        @endforeach
    @endif
@endif

@endsection
