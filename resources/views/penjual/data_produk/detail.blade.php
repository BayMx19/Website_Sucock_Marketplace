@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12">
        <div class="breadcome-list">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcomb-wp">
                        <div class="breadcomb-ctn">
                            <h2 class="text-white mb-0">Detail Produk</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div style="margin-top: 30px;">
                    <div class="sparkline12-list">
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="all-form-element-inner">
                                            <form>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-12" style="margin-top: 20px !important;">
                                                            <div class="col-lg-12">
                                                                <div class="pro-edt-img"
                                                                    style="border: 1px solid #ccc; max-width: 100%; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                                                    <img src="{{ asset('storage/' . $produk->gambar) }}"
                                                                        alt="Foto Produk"
                                                                        style="width: 150px; height: 150px;"
                                                                        id="foto_produk_preview" />
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 mt-5" style="margin-top: 20px !important;">
                                                                <div class="row">
                                                                    <div class="col-lg-12 mt-5">

                                                                        {{-- Nama Toko --}}
                                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i class="fa-solid fa-user" style="color: #ffffff;"></i> Nama Toko</span>
                                                                            <input type="text" class="form-control" value="{{Auth::user()->name}}" readonly>
                                                                        </div>

                                                                        {{-- Nama Produk --}}
                                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i class="fa-solid fa-pencil" style="color: #ffffff;"></i> Nama Produk</span>
                                                                            <input type="text" class="form-control" value="{{ $produk->nama_produk }}" readonly>
                                                                        </div>

                                                                        {{-- Harga --}}
                                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i class="fa-solid fa-tag" style="color: #ffffff;"></i> Harga</span>
                                                                            <input type="number" id="harga" class="form-control" value="{{ $produk->harga }}" readonly>
                                                                        </div>

                                                                        {{-- Promo --}}
                                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i class="fa-solid fa-gift" style="color: #ffffff;"></i> Promo</span>
                                                                            <input type="text" id="promo" class="form-control"
                                                                                   value="{{ $produk->promo ? $produk->promo->nama . ' - ' . $produk->promo->diskon_persen . '%' : '-' }}" readonly
                                                                                   data-diskon="{{ $produk->promo ? $produk->promo->diskon_persen : 0 }}">
                                                                        </div>

                                                                        {{-- Harga Setelah Diskon --}}
                                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i class="fa-solid fa-percent" style="color: #ffffff;"></i> Harga Setelah Diskon</span>
                                                                            <input type="text" id="harga_diskon" class="form-control" readonly>
                                                                        </div>

                                                                        {{-- Stok --}}
                                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i class="fa-solid fa-boxes" style="color: #ffffff;"></i> Stok</span>
                                                                            <input type="number" class="form-control" value="{{ $produk->stok }}" readonly>
                                                                        </div>

                                                                        {{-- Deskripsi --}}
                                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i class="fa-solid fa-align-left" style="color: #ffffff;"></i> Deskripsi</span>
                                                                            <textarea class="form-control" rows="3" readonly>{{ $produk->deskripsi }}</textarea>
                                                                        </div>

                                                                        {{-- Status --}}
                                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i class="fa-solid fa-toggle-on" style="color: #ffffff;"></i> Status</span>
                                                                            <input type="text" class="form-control"
                                                                                   value="{{ $produk->status == 'ACTIVE' ? 'Aktif' : ($produk->status == 'INACTIVE' ? 'Tidak Aktif' : $produk->status) }}" readonly>
                                                                        </div>

                                                                        {{-- Tombol Kembali --}}
                                                                        <div class="form-group-inner mt-3">
                                                                            <div class="login-btn-inner">
                                                                                <div class="row">
                                                                                    <div class="col-12 text-center">
                                                                                        <div class="login-horizental cancel-wp">
                                                                                            <a href="{{ route('penjual.data_produk.index') }}" class="btn_1">
                                                                                                Kembali
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> {{-- all-form-element-inner --}}
                                    </div>
                                </div>
                            </div> {{-- sparkline12-graph --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const hargaInput = document.getElementById('harga');
    const promoInput = document.getElementById('promo');
    const hargaDiskon = document.getElementById('harga_diskon');

    function hitungDiskon() {
        const harga = parseFloat(hargaInput.value) || 0;
        const diskon = parseFloat(promoInput.dataset.diskon) || 0;
        const total = harga - (harga * (diskon / 100));
        hargaDiskon.value = 'Rp ' + total.toLocaleString('id-ID');
    }

    hitungDiskon(); // langsung hitung saat page load
});
</script>
@endpush
