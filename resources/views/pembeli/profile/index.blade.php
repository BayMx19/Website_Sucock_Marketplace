@extends('layout.template')
@section('content')
<main style="background-color: white;">

    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ asset('assets') }}/img/hero-bg-2.jpg" alt="">
                                    <div class="blog_item_date">
                                            <img
                                                src="{{ auth()->user()->foto_profil ? asset('storage/' . auth()->user()->foto_profil) : asset('assets/img/default-user.png') }}"
                                                alt="Foto Profil"
                                                class="img-fluid"
                                                style="border-radius: 50%; width: 150px; height: 150px; max-width:100%; vertical-align:middle;">
                                        </div>
                                    </div>
                            <div class="blog_details">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="row">
                                                <div class="col-sm-12 mt-50 mb-10">
                                                    <label><h2>Nama Lengkap</h2></label>
                                                    <input type="text" class="single-input" value="{{ $user->name }}" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label><h2>Jenis Kelamin</h2></label>
                                                    <input type="text" class="single-input" value="{{ $user->jenis_kelamin ?? '-' }}" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label><h2>Email</h2></label>
                                                    <input type="text" class="single-input" value="{{ $user->email }}" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label><h2>No. HP</h2></label>
                                                    <input type="text" class="single-input" value="{{ $user->nohp ?? '-' }}" disabled>
                                                </div>

                                                {{-- Alamat Terstruktur --}}
                                                <div class="col-12 mt-10 mb-10">
                                                    <label><h2>Provinsi</h2></label>
                                                    <input type="text" class="single-input" value="{{ $user->alamat->provinsi ?? '-' }}" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label><h2>Kota / Kabupaten</h2></label>
                                                    <input type="text" class="single-input" value="{{ $user->alamat->kota ?? '-' }}" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label><h2>Kecamatan</h2></label>
                                                    <input type="text" class="single-input" value="{{ $user->alamat->kecamatan ?? '-' }}" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label><h2>Kelurahan</h2></label>
                                                    <input type="text" class="single-input" value="{{ $user->alamat->kelurahan ?? '-' }}" disabled>
                                                </div>
                                                <div class="col-6 mt-10 mb-10">
                                                    <label><h2>RT</h2></label>
                                                    <input type="text" class="single-input" value="{{ $user->alamat->RT ?? '-' }}" disabled>
                                                </div>
                                                <div class="col-6 mt-10 mb-10">
                                                    <label><h2>RW</h2></label>
                                                    <input type="text" class="single-input" value="{{ $user->alamat->RW ?? '-' }}" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label><h2>Alamat Detail</h2></label>
                                                    <textarea class="single-textarea" disabled>{{ $user->alamat->alamat ?? '-' }}</textarea>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label><h2>Kode Pos</h2></label>
                                                    <input type="text" class="single-input" value="{{ $user->alamat->kode_pos ?? '-' }}" disabled>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </article>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget newsletter_widget" style="background-color: whitesmoke;">
                            <h4 class="widget_title">Riwayat Transaksi</h4>
                            <a href="">
                                <button class="w-100 btn_1 "> <i class="fa fa-clock-rotate-left"></i> Riwayat Transaksi</button>
                            </a>

                        </aside>
                        <aside class="single_sidebar_widget newsletter_widget" style="background-color: whitesmoke;">
                            <h4 class="widget_title">Edit Data</h4>
                            <a href="{{route('pembeli.edit.profile')}}">
                                <button class="w-100 btn_1 "> <i class="fa fa-edit"></i> Edit Data</button>
                            </a>

                        </aside>
                        <aside class="single_sidebar_widget newsletter_widget" style="background-color: whitesmoke;">
                            <h4 class="widget_title">Alamat Utama</h4>

                            @if(auth()->user()->dataAlamat && auth()->user()->dataAlamat->count() > 0)
                                <form id="formAlamatUtama" action="{{ route('pembeli.profil.alamat-utama') }}" method="POST">
                                    @csrf
                                    @foreach(auth()->user()->dataAlamat as $alamat)
                                        <div class="alamat-block mb-3 p-3" style="border: 1px solid #ddd; border-radius: 5px; position: relative;">
                                            <div style="font-weight: bold;">
                                                {{ $alamat->label ?? 'Alamat' }}
                                                @if($alamat->is_utama)
                                                    <span style="background-color: #ffcccb; color: #a00; font-size: 12px; padding: 2px 6px; border-radius: 10px; margin-left: 10px;">Utama</span>
                                                @endif
                                            </div>
                                            <div style="margin-top: 4px;">
                                                {{ $alamat->alamat ?? '' }} <br>
                                                Provinsi : {{ $alamat->provinsi ?? ''}} <br>
                                                Kota : {{ $alamat->kota ?? '' }} <br>
                                                Kecamatan : {{ $alamat->kecamatan ?? ''}} <br>
                                                Kelurahan : {{ $alamat->kelurahan ?? '' }} <br>
                                                RT {{ $alamat->RT ?? '-' }} / RW {{ $alamat->RW ?? '-' }} <br>

                                            </div>
                                            <input type="radio" name="alamat_id" value="{{ $alamat->id }}" id="alamat-{{ $alamat->id }}"
                                                {{ $alamat->is_utama ? 'checked' : '' }}
                                                style="position: absolute; top: 15px; right: 15px; transform: scale(1.3); cursor: pointer;"
                                                onchange="document.getElementById('formAlamatUtama').submit()"
                                            >
                                        </div>
                                    @endforeach
                                </form>
                            @else
                                <p class="text-muted">Belum ada alamat yang ditambahkan.</p>
                            @endif

                            <a href="{{ route('pembeli.alamat.create') }}">
                                <button class="btn_1 w-100"><i class="fa fa-plus"></i> Tambah Alamat</button>
                            </a>
                        </aside>


                        <aside class="single_sidebar_widget newsletter_widget" style="background-color: whitesmoke;">
                            <h4 class="widget_title">Logout</h4>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-100 btn_1">
                                    <i class="fa fa-power-off"></i> Logout
                                </button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
