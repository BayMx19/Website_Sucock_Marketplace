@extends('layout.template')
@section('content')
<main style="background-color: white;">
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="blog_left_sidebar">
                        <form action="{{ route('pembeli.update.profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{ asset('assets/img/hero-bg-2.jpg') }}" alt="">
                                    <div class="blog_item_date">
                                        <img
                                            src="{{ $user->foto_profil ? asset('storage/' . $user->foto_profil) : asset('assets/img/default-user.png') }}"
                                            alt="Foto Profil"
                                            class="img-fluid"
                                            style="border-radius: 50%; width: 150px; height: 150px; max-width:100%; vertical-align:middle;">
                                    </div>
                                </div>
                                <div class="blog_details">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">

                                                <div class="col-sm-12 mt-50 mb-10">
                                                    <label><h2>Nama Lengkap</h2></label>
                                                    <input type="text" name="name" required class="single-input" value="{{ $user->name }}">
                                                </div>

                                                <div class="col-12 mt-10 mb-10">
                                                    <label><h2>Username / Email</h2></label>
                                                    <input type="email" name="email" required class="single-input" value="{{ $user->email }}">
                                                </div>

                                                <div class="col-12 mt-10 mb-10">
                                                    <label><h2>Jenis Kelamin</h2></label>
                                                    <select name="jenis_kelamin" class="single-input">
                                                        @if (empty($user->jenis_kelamin))
                                                            <option value="" selected>-- Pilih --</option>
                                                        @endif
                                                        <option value="Laki-laki" {{ $user->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                                        <option value="Perempuan" {{ $user->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                                                    </select>
                                                </div>

                                                <div class="col-12 mt-10 mb-10">
                                                    <label><h2>No. HP</h2></label>
                                                    <input type="text" name="nohp" required class="single-input" value="{{ $user->nohp }}">
                                                </div>

                                                <div class="col-12 mt-10 mb-10">
                                                    <label><h2>Foto Profil</h2></label>
                                                    <input type="file" name="foto_profil" class="single-input">
                                                </div>
                                                <div class="col-12 mt-10 mb-10 position-relative">
                                                    <label><h2>Password Baru</h2></label>
                                                    <input type="password" 
                                                        name="password" 
                                                        id="password"
                                                        class="single-input" 
                                                        placeholder="Kosongkan jika tidak ingin mengganti">
                                                    <span class="toggle-password" 
                                                        onclick="togglePassword('password')" 
                                                        style="position: absolute; right: 25px; bottom: 8px; cursor: pointer;">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                </div>

                                                <div class="col-12 mt-10 mb-10 position-relative">
                                                    <label><h2>Konfirmasi Password Baru</h2></label>
                                                    <input type="password" 
                                                        name="password_confirmation" 
                                                        id="password_confirmation"
                                                        class="single-input" 
                                                        placeholder="Ulangi password baru">
                                                    <span class="toggle-password" 
                                                        onclick="togglePassword('password_confirmation')" 
                                                        style="position: absolute; right: 25px; bottom: 8px; cursor: pointer;">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                </div>

                                                <div class="col-12 mt-4">
                                                    <button type="submit" class="btn_1">Simpan Perubahan</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    function togglePassword(id) {
        const input = document.getElementById(id);
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
    }
</script>

@endsection
