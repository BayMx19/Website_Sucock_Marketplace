@extends('layout.template')
@section('content')
<main>
<div class="popular-items section-padding halaman-keranjang" >
  <div class="container">
 <!-- Section tittle -->
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-8 col-md-10">
            <div class="section-tittle text-center mt-100">
              <h1 class="judul-produk"><span>Keranjang Saya</span></h1>
            </div>
          </div>
        </div>
    {{-- TOKO 1 --}}
    <div class="cart-toko" style="background: #f9fafd; padding: 20px; border-radius: 10px; margin-bottom: 30px;">
      <h5 style="font-weight: 600; color: #333;">Toko: Lasmijan.sport</h5>

      <div class="produk-item d-flex align-items-center bg-white rounded shadow-sm p-3 mb-3">
        <input type="checkbox" class="form-check-input me-3" style="width: 20px; height: 20px;">
        <img src="{{ asset('assets/img/JP Gold.jpg') }}" alt="Produk" style="width: 120px; height: 100px; object-fit: cover; border-radius: 8px;">
        <div class="ms-3 flex-grow-1">
          <h6 style="font-weight: 600; margin-bottom: 5px;">JP Gold</h6>
          <p style="color: #666; font-size: 14px;">- Toko: Lasmijan.sport</p>
          <p style="font-weight: 700; color: #548c9a;">Rp. 100.000</p>
        </div>
        <div style="width: 80px; text-align: center;">
          <input type="number" value="1" min="1" style="width: 60px; text-align: center;" readonly>
        </div>
        <div style="width: 120px; text-align: right; font-weight: 700; color: #333;">
          Rp. 100.000
        </div>
        <div style="width: 50px; text-align: center;">
          <button class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></button>
        </div>
      </div>

      {{-- Total per toko --}}
      <div class="d-flex justify-content-end align-items-center" style="font-weight: 700; font-size: 16px; color: #0f8c56;">
        Total : Rp. 100.000
      </div>
    </div>

    {{-- TOKO 2 --}}
    <div class="cart-toko" style="background: #f9fafd; padding: 20px; border-radius: 10px; margin-bottom: 30px;">
      <h5 style="font-weight: 600; color: #333;">Toko: SportyStore</h5>

      <div class="produk-item d-flex align-items-center bg-white rounded shadow-sm p-3 mb-3">
        <input type="checkbox" class="form-check-input me-3" style="width: 20px; height: 20px;">
        <img src="{{ asset('assets/img/vespa-merah.jpg') }}" alt="Produk" style="width: 120px; height: 100px; object-fit: cover; border-radius: 8px;">
        <div class="ms-3 flex-grow-1">
          <h6 style="font-weight: 600; margin-bottom: 5px;">Kaos desain vespa merah</h6>
          <p style="color: #666; font-size: 14px;">- Toko: SportyStore</p>
          <p style="font-weight: 700; color: #548c9a;">Rp. 90.000</p>
        </div>
        <div style="width: 80px; text-align: center;">
          <input type="number" value="2" min="1" style="width: 60px; text-align: center;" readonly>
        </div>
        <div style="width: 120px; text-align: right; font-weight: 700; color: #333;">
          Rp. 180.000
        </div>
        <div style="width: 50px; text-align: center;">
          <button class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></button>
        </div>
      </div>

      <div class="produk-item d-flex align-items-center bg-white rounded shadow-sm p-3 mb-3">
        <input type="checkbox" class="form-check-input me-3" style="width: 20px; height: 20px;">
        <img src="{{ asset('assets/img/kaos-one-piece.jpg') }}" alt="Produk" style="width: 120px; height: 100px; object-fit: cover; border-radius: 8px;">
        <div class="ms-3 flex-grow-1">
          <h6 style="font-weight: 600; margin-bottom: 5px;">Kaos desain one Piece cs</h6>
          <p style="color: #666; font-size: 14px;">- Toko: SportyStore</p>
          <p style="font-weight: 700; color: #548c9a;">Rp. 92.000</p>
        </div>
        <div style="width: 80px; text-align: center;">
          <input type="number" value="2" min="1" style="width: 60px; text-align: center;" readonly>
        </div>
        <div style="width: 120px; text-align: right; font-weight: 700; color: #333;">
          Rp. 184.000
        </div>
        <div style="width: 50px; text-align: center;">
          <button class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></button>
        </div>
      </div>

      {{-- Total per toko --}}
      <div class="d-flex justify-content-end align-items-center" style="font-weight: 700; font-size: 16px; color: #0f8c56;">
        Total : Rp. 364.000
      </div>
    </div>

    {{-- Tombol bawah --}}
    <div class="d-flex justify-content-center gap-4 mt-4">
      <a href="{{route('home')}}" class="btn btn-secondary px-4 py-2" style="border-radius: 6px;">Kembali Berbelanja</a>
      <a href="#" class="btn btn-keranjang px-4 py-2" style="border-radius: 6px;">Selesaikan Pesanan</a>
    </div>
  </div>
</div>
</main>
@endsection
