@extends('layout.template')
@section('content')
<main style="background-color: #F0F0F0;">
    <section class="popular-items">
        <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12 pencarian-produk">
            <div class="search-form-wrapper">
                <form action="" method="get">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari..." name="keyword"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari...'"
                                value="{{ request('keyword') }}">
                            <button class="btn btn-search-bar" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

        <div class="container">
    <div class="row">
        @foreach($list_produk as $produk)
            <div class="col-md-3 mb-4"> {{-- 4 kolom per baris --}}
                <div class="single-popular-items mb-50 text-center">
                    <div class="popular-img" style="position: relative; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalProduk{{ $produk->id }}">
                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="gambar produk"
                             class="img-fluid"
                             style="height: 300px; object-fit: cover; width: 100%;">
                        <div class="img-cap" style="position: absolute; bottom: 10px; left: 0; right: 0; color: white; background: rgba(0,0,0,0.5); padding: 5px 0; cursor: pointer;">
                            <span>Lihat Produk</span>
                        </div>
                    </div>
                    <div class="popular-caption">
                        <h3><a href="/produk/detail/{{ $produk->id }}">{{ $produk->nama }}</a></h3>
                        <h4 style="font-weight: 800; color: #548c9a;">
                            Rp. {{ number_format($produk->harga, 0, ',', '.') }}
                        </h4>
                    </div>
                </div>
            </div>

            {{-- Modal Produk --}}
            <div class="modal fade" id="modalProduk{{ $produk->id }}" tabindex="-1" aria-labelledby="produkModalLabel{{ $produk->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="produkModalLabel{{ $produk->id }}">{{ $produk->nama }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body d-flex flex-wrap">
                            <div class="col-md-6">
                                <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid rounded" alt="Gambar Produk">
                            </div>
                            <div class="col-md-6 ps-md-4 pt-3 pt-md-0">
                                <h4 style="font-weight: bold;">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</h4>
                                <p class="mb-1"><strong>Stok:</strong> {{ $produk->stok }}</p>
                                <p class="mb-1"><strong>Penjual:</strong> {{ $produk->user->name }}</p>
                                <p class="mt-2">{{ $produk->deskripsi }}</p>
                                <hr>
                                <div class="mt-3">
                                    <label for="jumlah_{{ $produk->id }}" class="form-label"><strong>Jumlah:</strong></label>
                                    <div class="input-group" style="width: 150px;">
                                        <button class="btn btn-outline-secondary btn-decrease" type="button">−</button>
                                        <input type="number" name="jumlah" id="jumlah_{{ $produk->id }}" class="form-control text-center jumlah-input" value="1" min="1">
                                        <button class="btn btn-outline-secondary btn-increase" type="button">+</button>
                                    </div>

                                    <button class="btn btn-primary mt-3 btn-tambah-keranjang" data-produk-id="{{ $produk->id }}">
                                        Tambahkan ke Keranjang
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>

    </section>
</main>
<script>
    const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.btn-increase').forEach(btn => {
            btn.addEventListener('click', function () {
                let input = this.previousElementSibling;
                input.value = parseInt(input.value) + 1;
            });
        });

        document.querySelectorAll('.btn-decrease').forEach(btn => {
            btn.addEventListener('click', function () {
                let input = this.nextElementSibling;
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            });
        });

        document.querySelectorAll('.btn-tambah-keranjang').forEach(btn => {
            btn.addEventListener('click', function () {

                if (!isLoggedIn) {
                    window.location.href = '/login';
                    return;
                }
                const produkId = this.dataset.produkId;
                const jumlahInput = document.querySelector(`#jumlah_${produkId}`);
                const jumlah = parseInt(jumlahInput.value);

            });
        });
    });
</script>

@endsection
