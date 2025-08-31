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
                                            <form action="{{ route('penjual.data_produk.update', $produk->id) }}"
                                                enctype="multipart/form-data" method="POST">
                                                @csrf
                                                @method('PUT')
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

                                                            <!-- <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="product-edt-pix-wrap">
                                                                            <div
                                                                                class="mg-b-pro-edt file-upload-inner ts-forms">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon">
                                                                                        <i class="fa-solid fa-image"
                                                                                            style="color: #ffffff;"></i>
                                                                                        Foto Produk
                                                                                    </span>

                                                                                    <div class="input append-small-btn">
                                                                                        <button type="button"
                                                                                            class="btn btn-primary"
                                                                                            onclick="document.getElementById('gambar').click();">
                                                                                            <i class="fa-solid fa-upload"></i>
                                                                                            Cari Foto
                                                                                        </button>
                                                                                        <input type="file" id="gambar"
                                                                                            name="gambar"
                                                                                            accept="image/*"
                                                                                            style="display: none;"
                                                                                            onchange="document.getElementById('gambar_text').value = this.files[0] ? this.files[0].name : ''">
                                                                                    </div>

                                                                                    <input type="text" id="gambar_text"
                                                                                        placeholder="Silahkan Upload Foto"
                                                                                        readonly class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->

                                                            <div class="col-lg-12 mt-5" style="margin-top: 20px !important;">
                                                                <div class="row">
                                                                    <div class="col-lg-12 mt-5">
                                                                        <div
                                                                                class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa-solid fa-user"
                                                                                        style="color: #ffffff;"></i>
                                                                                    Nama Toko</span>
                                                                                <input type="text" id="penjual_id" name="penjual_id"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Nama Toko Anda"
                                                                                    value="{{Auth::user()->name}}"
                                                                                    readonly>
                                                                                <input type="hidden" id="penjual_id" name="penjual_id"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan Nama Toko Anda"
                                                                                    value="{{Auth::user()->id}}"
                                                                                    >
                                                                            </div>
                                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i
                                                                                    class="fa-solid fa-pencil"
                                                                                    style="color: #ffffff;"></i>
                                                                                Nama Produk</span>
                                                                            <input type="text" name="nama_produk"
                                                                                class="form-control"
                                                                                placeholder="Masukkan Nama Produk"
                                                                                value="{{ $produk->nama_produk }}" readonly>
                                                                        </div>

                                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i
                                                                                    class="fa-solid fa-tag"
                                                                                    style="color: #ffffff;"></i>
                                                                                Harga</span>
                                                                            <input type="number" name="harga"
                                                                                class="form-control"
                                                                                placeholder="Masukkan Harga"
                                                                                value="{{ $produk->harga }}" readonly>
                                                                        </div>

                                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i
                                                                                    class="fa-solid fa-boxes"
                                                                                    style="color: #ffffff;"></i>
                                                                                Stok</span>
                                                                            <input type="number" name="stok"
                                                                                class="form-control"
                                                                                placeholder="Masukkan Stok"
                                                                                value="{{ $produk->stok }}" readonly>
                                                                        </div>

                                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i
                                                                                    class="fa-solid fa-align-left"
                                                                                    style="color: #ffffff;"></i>
                                                                                Deskripsi</span>
                                                                            <textarea name="deskripsi"
                                                                                class="form-control"
                                                                                rows="3" readonly>{{ $produk->deskripsi }}</textarea>
                                                                        </div>

                                                                        <div class="input-group mg-b-pro-edt mg-l-pro-edt ts-forms">
                                                                            <span class="input-group-addon"><i
                                                                                    class="fa-solid fa-toggle-on"
                                                                                    style="color: #ffffff;"></i>
                                                                                Status</span>
                                                                            <div class="form-select-list">
                                                                                <input type="text" name="status"
                                                                                class="form-control"
                                                                                placeholder="Masukkan Status"
                                                                                value="{{ $produk->status == 'ACTIVE' ? 'Aktif' : ($produk->status == 'INACTIVE' ? 'Tidak Aktif' : $produk->status) }}" readonly>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="form-group-inner">
                                                    <div class="login-btn-inner">
                                                        <div class="row">
                                                            <div class="col-12 text-center">
                                                                <div class="login-horizental cancel-wp">
                                                                    <button class="btn_1" type="submit">
                                                                        Simpan Data Produk
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
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
