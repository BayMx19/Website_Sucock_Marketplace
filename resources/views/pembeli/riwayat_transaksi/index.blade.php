@extends('layout.template')

@section('head-extra')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection


@section('content')
@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
@endif
    <main>
        <div class="popular-items section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10 col-md-12">
                        <div class="section-tittle text-center mt-100 mb-40">
                            <h1 class="judul-produk"><span>Riwayat Pesanan</span></h1>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" id="orderStatusTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="sudah-dibayar-tab" data-bs-toggle="tab" href="#sudah-dibayar" role="tab" aria-controls="sudah-dibayar" aria-selected="true">Sudah Dibayar ({{ $jmlDibayar }})</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="diproses-tab" data-bs-toggle="tab" href="#diproses" role="tab" aria-controls="diproses" aria-selected="true">Diproses ({{ $jmlDiproses }})</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="sudah-dikirim-tab" data-bs-toggle="tab" href="#sudah-dikirim" role="tab" aria-controls="sudah-dikirim" aria-selected="true">Sudah Dikirim ({{ $jmlDikirim }})</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="selesai-tab" data-bs-toggle="tab" href="#selesai" role="tab" aria-controls="selesai" aria-selected="true">Selesai ({{ $jmlSelesai }})</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="orderStatusTabContent">
                                @foreach ($pesanan as $pesananId => $items)
                                    @php
                                        $first = $items->first(); // Ambil data utama pesanan
                                    @endphp

                                    {{-- Tab: Sudah Dibayar --}}
                                    <div class="tab-pane fade show active" id="sudah-dibayar" role="tabpanel"
                                        aria-labelledby="sudah-dibayar-tab">
                                        <div class="accordion" id="accordionDibayar">
                                        @if ($first->status_pesanan === 'Sudah Dibayar')
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{ $pesananId }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#orderDibayar{{ $pesananId }}"
                                                        aria-expanded="false" aria-controls="orderDibayar{{ $pesananId }}"
                                                        style="background-color: whitesmoke;">
                                                        Pesanan #{{ $first->kode_pesanan }} - Total: Rp. {{ number_format($first->total_harga) }}
                                                    </button>
                                                </h2>
                                                <div id="orderDibayar{{ $pesananId }}" class="accordion-collapse collapse"
                                                    aria-labelledby="headingDibayar{{ $pesananId }}">
                                                    <div class="accordion-body">
                                                        @foreach ($items as $item)
                                                        <div class="row mb-3 product-item align-items-center">
                                                            <div class="col-md-4">
                                                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                                                    alt="{{ $item->nama_produk }}" class="img-fluid"
                                                                    style="width: 100%; max-width: 170px; height: 150px; object-fit: cover;">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p class="mb-1"><strong>Nama Produk :</strong> {{ $item->nama_produk }}</p>
                                                                <p class="mb-1"><strong>Harga :</strong> Rp. {{ number_format($item->harga) }}</p>
                                                                <p class="mb-1"><strong>Jumlah :</strong> {{ $item->jumlah_produk }}</p>
                                                                <p class="mb-0"><strong>Status Pesanan {{ $first->kode_pesanan }} :</strong> {{ $item->status_pesanan }}</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        </div>
                                    </div>

                                    {{-- Tab: Diproses --}}
                                    <div class="tab-pane fade" id="diproses" role="tabpanel"
                                        aria-labelledby="diproses-tab">
                                        <div class="accordion" id="accordionDiproses">
                                        @if ($first->status_pesanan === 'Diproses')
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{ $pesananId }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#orderDiproses{{ $pesananId }}"
                                                        aria-expanded="false" aria-controls="orderDiproses{{ $pesananId }}"
                                                        style="background-color: whitesmoke;">
                                                        Pesanan #{{ $first->kode_pesanan }} - Total: Rp. {{ number_format($first->total_harga) }}
                                                    </button>
                                                </h2>
                                                <div id="orderDiproses{{ $pesananId }}" class="accordion-collapse collapse"
                                                    aria-labelledby="headingDiproses{{ $pesananId }}">
                                                    <div class="accordion-body">
                                                        @foreach ($items as $item)
                                                        <div class="row mb-3 product-item align-items-center">
                                                            <div class="col-md-4">
                                                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                                                    alt="{{ $item->nama_produk }}" class="img-fluid"
                                                                    style="width: 100%; max-width: 170px; height: 150px; object-fit: cover;">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p class="mb-1"><strong>Nama Produk :</strong> {{ $item->nama_produk }}</p>
                                                                <p class="mb-1"><strong>Harga :</strong> Rp. {{ number_format($item->harga) }}</p>
                                                                <p class="mb-1"><strong>Jumlah :</strong> {{ $item->jumlah_produk }}</p>
                                                                <p class="mb-0"><strong>Status Pesanan {{ $first->kode_pesanan }} :</strong> {{ $item->status_pesanan }}</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        </div>
                                    </div>

                                    {{-- Tab: Sudah Dikirim --}}
                                    <div class="tab-pane fade" id="sudah-dikirim" role="tabpanel"
                                        aria-labelledby="sudah-dikirim-tab">
                                        <div class="accordion" id="accordionDikirim">
                                        @if ($first->status_pesanan === 'Sudah Dikirim')
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{ $pesananId }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#orderDikirim{{ $pesananId }}"
                                                        aria-expanded="false" aria-controls="orderDikirim{{ $pesananId }}"
                                                        style="background-color: whitesmoke;">
                                                        Pesanan #{{ $first->kode_pesanan }} - Total: Rp. {{ number_format($first->total_harga) }}
                                                    </button>
                                                </h2>
                                                <div id="orderDikirim{{ $pesananId }}" class="accordion-collapse collapse"
                                                    aria-labelledby="headingDikirim{{ $pesananId }}">
                                                    <div class="accordion-body">
                                                        @foreach ($items as $item)
                                                        <div class="row mb-3 product-item align-items-center">
                                                            <div class="col-md-4">
                                                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                                                    alt="{{ $item->nama_produk }}" class="img-fluid"
                                                                    style="width: 100%; max-width: 170px; height: 150px; object-fit: cover;">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p class="mb-1"><strong>Nama Produk :</strong> {{ $item->nama_produk }}</p>
                                                                <p class="mb-1"><strong>Harga :</strong> Rp. {{ number_format($item->harga) }}</p>
                                                                <p class="mb-1"><strong>Jumlah :</strong> {{ $item->jumlah_produk }}</p>
                                                                <p class="mb-0"><strong>Status :</strong> {{ $item->status_pesanan }}</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        @endforeach
                                                        <div class="d-flex justify-content-end">
                                                            <form action="{{ route('pesanan.selesai', $first->id) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-success">
                                                                    Selesaikan Pesanan
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        </div>
                                    </div>

                                    {{-- Tab: Selesai --}}
                                    <div class="tab-pane fade" id="selesai" role="tabpanel"
                                        aria-labelledby="selesai-tab">
                                        <div class="accordion" id="accordionSelesai">
                                        @if ($first->status_pesanan === 'Selesai')
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{ $pesananId }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#orderSelesai{{ $pesananId }}"
                                                        aria-expanded="false" aria-controls="orderSelesai{{ $pesananId }}"
                                                        style="background-color: whitesmoke;">
                                                        Pesanan #{{ $first->kode_pesanan }} - Total: Rp. {{ number_format($first->total_harga) }}
                                                    </button>
                                                </h2>
                                                <div id="orderSelesai{{ $pesananId }}" class="accordion-collapse collapse"
                                                    aria-labelledby="headingSelesai{{ $pesananId }}">
                                                    <div class="accordion-body">
                                                        @foreach ($items as $item)
                                                        <div class="row mb-3 product-item align-items-center">
                                                            <div class="col-md-3">
                                                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                                                    alt="{{ $item->nama_produk }}" class="img-fluid"
                                                                    style="width: 100%; max-width: 170px; height: 150px; object-fit: cover;">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p class="mb-1"><strong>Nama Produk :</strong> {{ $item->nama_produk }}</p>
                                                                <p class="mb-1"><strong>Harga :</strong> Rp. {{ number_format($item->harga) }}</p>
                                                                <p class="mb-0"><strong>Jumlah :</strong> {{ $item->jumlah_produk }}</p>
                                                            </div>
                                                            <div class="col-md-3 text-end">
                                                            @php
                                                                $review = \App\Models\Review::where('produk_id', $item->produk_id)
                                                                    ->where('pesanan_id', $first->id)
                                                                    ->first();
                                                            @endphp

                                                            @if ($review)
                                                                <div class="mb-2">
                                                                    <strong>Penilaian:</strong>
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        <i class="fas fa-star {{ $i <= $review->bintang ? 'text-warning' : 'text-secondary' }}"></i>
                                                                    @endfor
                                                                    @if ($review->review_text)
                                                                        <p class="mt-1">{{ $review->review_text }}</p>
                                                                    @endif
                                                                </div>
                                                            @else
                                                                <button class="btn btn-secondary btn-sm review-button"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#reviewModal"
                                                                    data-product-id="{{ $item->produk_id }}"
                                                                    data-order-id="{{ $first->id }}"
                                                                    data-product-name="{{ $item->nama_produk }}"
                                                                    data-product-image="{{ asset('storage/' . $item->gambar) }}">
                                                                    Berikan Penilaian
                                                                </button>
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        @endforeach
                                                        <p class="mt-3"><strong>Status Pesanan {{ $first->kode_pesanan }} :</strong> {{ $item->status_pesanan }}</p>
                                                        <p><strong>Tanggal Selesai:</strong> {{ $item->updated_at }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<!-- Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="reviewForm" action="{{ route('review.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header justify-content-center">
          <h5 class="modal-title text-center" id="reviewModalLabel">Beri Penilaian</h5>
        </div>
        <div class="modal-body">
          <div class="text-center mb-3">
            <img id="reviewProductImage" src="" class="img-fluid rounded" style="max-height: 150px;">
            <h5 id="reviewProductName" class="mt-2"></h5>
          </div>

          <input type="hidden" id="produkId" name="produk_id">
          <input type="hidden" id="pesananId" name="pesanan_id">

          <div class="mb-3 text-center">
            <label class="form-label d-block">Rating:</label>
            <div id="starRating">
              @for ($i = 1; $i <= 5; $i++)
                <i class="fas fa-star fa-2x star-icon text-secondary" data-value="{{ $i }}" style="cursor: pointer;"></i>
              @endfor
            </div>
            <input type="hidden" name="bintang" id="bintangInput" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Ulasan:</label>
            <textarea name="review_text" class="form-control" placeholder="Tulis ulasan Anda..."></textarea>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-primary w-100">Kirim</button>
        </div>
      </div>
    </form>
  </div>
</div>

    <style>
    .star-icon.text-warning {
        color: #ffc107 !important;
    }
    </style>


<script>
    document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('#starRating .star-icon');
    const bintangInput = document.getElementById('bintangInput');

    stars.forEach(function (star, index) {
        star.addEventListener('click', function () {
        const rating = index + 1;
        bintangInput.value = rating;

        stars.forEach((s, i) => {
            s.classList.toggle('text-warning', i < rating);
            s.classList.toggle('text-secondary', i >= rating);
        });
        });
    });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const reviewButtons = document.querySelectorAll('.review-button');
        reviewButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                const productId = button.getAttribute('data-product-id');
                const orderId = button.getAttribute('data-order-id');
                const productName = button.getAttribute('data-product-name');
                const productImage = button.getAttribute('data-product-image');
                // Isi nilai ke modal
            document.getElementById('produkId').value = productId;
                        document.getElementById('pesananId').value = orderId;
                                    document.getElementById('modalProductName').textContent = productName;
                        document.getElementById('modalProductImage').src = productImage;
                    });
                });
    document.querySelector('#reviewForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);
        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            });

            const data = await response.json();

            if (data.success) {
                    const modalEl = document.getElementById('reviewModal');
                    const modal = bootstrap.Modal.getInstance(modalEl);
                    modal.hide();

                    alert('Review berhasil dikirim!');

                    setTimeout(() => {
                        location.reload();
                    }, 500);
                } else {
                    alert('Gagal mengirim review!');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengirim review.');
            }
        });});
</script>


@endsection

