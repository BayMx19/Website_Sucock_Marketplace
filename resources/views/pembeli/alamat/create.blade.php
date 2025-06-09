@extends('layout.template')

@section('content')
<main style="background-color: white;">
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_details">
                                <h2 class="mb-4">Tambah Alamat Baru</h2>

                                <form action="{{ route('pembeli.alamat.store') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-sm-12 mb-3">
                                            <label><h4>Alamat</h4></label>
                                            <textarea name="alamat" class="single-textarea @error('alamat') is-invalid @enderror" rows="3" required>{{ old('alamat') }}</textarea>
                                            @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <label><h4>Provinsi</h4></label>
                                            <input type="text" name="provinsi" class="single-input @error('provinsi') is-invalid @enderror" value="{{ old('provinsi') }}" required>
                                            @error('provinsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <label><h4>Kota</h4></label>
                                            <input type="text" name="kota" class="single-input @error('kota') is-invalid @enderror" value="{{ old('kota') }}" required>
                                            @error('kota')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <label><h4>Kecamatan</h4></label>
                                            <input type="text" name="kecamatan" class="single-input @error('kecamatan') is-invalid @enderror" value="{{ old('kecamatan') }}" required>
                                            @error('kecamatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <label><h4>Kelurahan</h4></label>
                                            <input type="text" name="kelurahan" class="single-input @error('kelurahan') is-invalid @enderror" value="{{ old('kelurahan') }}" required>
                                            @error('kelurahan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <label><h4>RT</h4></label>
                                            <input type="text" name="RT" maxlength="3" class="single-input @error('RT') is-invalid @enderror" value="{{ old('RT') }}">
                                            @error('RT')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <label><h4>RW</h4></label>
                                            <input type="text" name="RW" maxlength="3" class="single-input @error('RW') is-invalid @enderror" value="{{ old('RW') }}">
                                            @error('RW')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <label><h4>Kode Pos</h4></label>
                                            <input type="text" name="kode_pos" class="single-input @error('kode_pos') is-invalid @enderror" value="{{ old('kode_pos') }}">
                                            @error('kode_pos')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <button type="submit" class="btn_1 mt-3"><i class="fa fa-save"></i> Simpan Alamat</button>
                                    <a href="{{ route('pembeli.profile') }}" class="btn btn-secondary mt-3 ms-2">Batal</a>
                                </form>

                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
