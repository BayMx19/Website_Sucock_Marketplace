@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="breadcome-list">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div style="margin-top: 30px;">
                    <div class="sparkline12-list">
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="all-form-element-inner">

                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-12" style="margin-top: 20px !important;">
                                                        <div class="col-lg-12">
                                                            <div class="pro-edt-img"
                                                                 style="border: 1px solid #cccccc; max-width: 100%; width: 200px; height: 200px; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                                                <img src="{{ asset('storage/' . $produk->gambar) }}"
                                                                     alt="Foto Produk {{$produk->nama_produk}}"
                                                                     style="width: 150px; height: 150px;"
                                                                     id="foto" />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-5"
                                                             style="margin-top: 20px !important;">
                                                            <div class="row">
                                                                <div class="col-lg-12">

                                                                    {{-- Nama Produk --}}
                                                                    <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa-solid fa-box"
                                                                                style="color: #ffffff;"></i>
                                                                            Nama Produk</span>
                                                                        <input type="text" id="nama_produk" name="nama_produk"
                                                                               class="form-control"
                                                                               value="{{$produk->nama_produk}}" readonly>
                                                                    </div>

                                                                    {{-- Nama Toko --}}
                                                                    <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa-solid fa-user"
                                                                                style="color: #ffffff;"></i>
                                                                            Nama Toko</span>
                                                                        <input type="text" id="nama_toko" name="nama_toko"
                                                                               class="form-control"
                                                                               value="{{$produk->user->name}}" readonly>
                                                                    </div>

                                                                    {{-- Harga --}}
                                                                    <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa-solid fa-tag"
                                                                                style="color: #ffffff;"></i>
                                                                            Harga</span>
                                                                        <input type="text" id="harga" name="harga"
                                                                               data-harga="{{ $produk->harga }}"
                                                                               class="form-control"
                                                                               value="{{ number_format($produk->harga,0,',','.') }}"
                                                                               readonly>
                                                                    </div>

                                                                    {{-- Promo --}}
                                                                    <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa-solid fa-gift"
                                                                                style="color: #ffffff;"></i>
                                                                            Promo</span>
                                                                        <input type="text" id="promo" name="promo"
                                                                               data-diskon="{{ $produk->promo ? $produk->promo->diskon_persen : 0 }}"
                                                                               value="{{ $produk->promo ? $produk->promo->nama . ' - ' . $produk->promo->diskon_persen . '%' : '-' }}"
                                                                               class="form-control" readonly>
                                                                    </div>

                                                                    {{-- Harga Setelah Diskon --}}
                                                                    <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa-solid fa-percent"
                                                                                style="color: #ffffff;"></i>
                                                                            Harga Setelah Diskon</span>
                                                                        <input type="text" id="harga_diskon" class="form-control" readonly>
                                                                    </div>

                                                                    {{-- Stok --}}
                                                                    <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa-solid fa-warehouse"
                                                                                style="color: #ffffff;"></i>
                                                                            Stok</span>
                                                                        <input type="text" id="stok" name="stok"
                                                                               class="form-control"
                                                                               value="{{$produk->stok}}" readonly>
                                                                    </div>

                                                                    {{-- Deskripsi --}}
                                                                    <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa-solid fa-align-left"
                                                                                style="color: #ffffff;"></i>
                                                                            Deskripsi</span>
                                                                        <input type="text" id="deskripsi" name="deskripsi"
                                                                               class="form-control"
                                                                               value="{{$produk->deskripsi}}" readonly>
                                                                    </div>

                                                                    {{-- Status --}}
                                                                    <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa-solid fa-toggle-on"
                                                                                style="color: #ffffff;"></i>
                                                                            Status</span>
                                                                        <input type="text" id="status" name="status"
                                                                               class="form-control"
                                                                               value="{{ $produk->status == 'ACTIVE' ? 'Aktif' : ($produk->status == 'INACTIVE' ? 'Tidak Aktif' : $produk->status) }}"
                                                                               readonly>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div> {{-- all-form-element-inner --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JS untuk hitung harga diskon --}}
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hargaInput = document.getElementById('harga');
            const promoInput = document.getElementById('promo');
            const hargaDiskonInput = document.getElementById('harga_diskon');

            const harga = parseFloat(hargaInput.dataset.harga) || 0;
            const diskon = parseFloat(promoInput.dataset.diskon) || 0;

            let hargaDiskon = harga;
            if(diskon > 0){
                hargaDiskon = harga - (harga * (diskon / 100));
            }

            hargaDiskonInput.value = 'Rp ' + hargaDiskon.toLocaleString('id-ID');
        });
    </script>
    @endpush
@endsection
