@extends('layout.template')

@section('head-extra')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@php
    $statusList = $pesanan->keys();
@endphp

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
                                {{-- Nav Tabs --}}
                                <ul class="nav nav-tabs" id="statusTabs" role="tablist">
                                @php
                                    $statusList = ['Sudah Dibayar', 'Diproses', 'Sudah Dikirim', 'Selesai'];
                                @endphp

                                    @foreach ($statusList as $index => $status)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $index === 0 ? 'active' : '' }}"
                                                id="tab-{{ Str::slug($status) }}-tab"
                                                data-bs-toggle="tab"
                                                href="#tab-{{ Str::slug($status) }}"
                                                role="tab">
                                                {{ $status }}
                                                @if(isset($pesananCounts[$status]))
                                                    <span>
                                                        ({{ $pesananCounts[$status] }})
                                                    </span>
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="orderStatusTabContent">
                                    {{-- Tab Content --}}
                                    <div class="tab-content mt-3" id="statusTabsContent">
                                        @foreach ($pesanan as $status => $itemsGroupedByKodePesanan)
                                            @php
                                                $tabId = 'tab-' . Str::slug($status);
                                            @endphp

                                            <div class="tab-pane fade {{ $status === 'Sudah Dibayar' ? 'show active' : '' }}" id="{{ $tabId }}" role="tabpanel">
                                                <div class="accordion" id="accordion-{{ $tabId }}">
                                                    @foreach ($itemsGroupedByKodePesanan as $kodePesanan => $items)
                                                        @php
                                                            $first = $items->first();
                                                        @endphp

                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="heading{{ $kodePesanan }}">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapse{{ $kodePesanan }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse{{ $kodePesanan }}"
                                                                    style="background-color: whitesmoke;">
                                                                    Pesanan #{{ $first->kode_pesanan }} - Total Harga: Rp. {{ number_format($first->total_harga) }}
                                                                </button>
                                                            </h2>
                                                            <div id="collapse{{ $kodePesanan }}" class="accordion-collapse collapse"
                                                                aria-labelledby="heading{{ $kodePesanan }}"
                                                                data-bs-parent="#accordion-{{ $tabId }}">
                                                                <div class="accordion-body">
                                                                @foreach ($items as $item)
                                                                    <div class="row mb-3 product-item align-items-center">
                                                                        <div class="col-md-4">
                                                                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                                                                alt="{{ $item->nama_produk }}" class="img-fluid"
                                                                                style="width: 100%; max-width: 170px; height: 150px; object-fit: cover;">
                                                                        </div>

                                                                        <div class="col-md-8">
                                                                            <div class="d-flex justify-content-between align-items-start">
                                                                                <div>
                                                                                    <p class="mb-1"><strong>Nama Produk :</strong> {{ $item->nama_produk }}</p>
                                                                                    <p class="mb-1"><strong>Harga Satuan:</strong> Rp. {{ number_format($item->harga) }}</p>
                                                                                    <p class="mb-1"><strong>Jumlah :</strong> {{ $item->jumlah_produk }}</p>
                                                                                    <p class="mb-1"><strong>Sub Total :</strong>  Rp. {{ number_format($item->jumlah_produk * $item->harga, 0, ',', '.') }}</p>
                                                                                    <p class="mb-0"><strong>Status :</strong> {{ $item->status_pesanan }}</p>
                                                                                </div>

                                                                                <div class="text-end">
                                                                                    @if ($item->bintang)
                                                                                        <div>
                                                                                            <strong>Bintang:</strong>
                                                                                            <div>
                                                                                                @for ($i = 1; $i <= 5; $i++)
                                                                                                    @if ($i <= $item->bintang)
                                                                                                        <i class="fas fa-star text-warning"></i>
                                                                                                    @else
                                                                                                        <i class="far fa-star text-warning"></i>
                                                                                                    @endif
                                                                                                @endfor
                                                                                            </div>
                                                                                            <p class="mt-1"><strong>Ulasan:</strong> {{ $item->review_text }}</p>
                                                                                        </div>
                                                                                    @elseif ($item->status_pesanan === 'Selesai')
                                                                                        <button type="button"
                                                                                            class="btn btn-review review-button mt-1"
                                                                                            data-product-id="{{ $item->produk_id }}"
                                                                                            data-order-id="{{ $item->id }}"
                                                                                            data-product-name="{{ $item->nama_produk }}"
                                                                                            data-product-image="{{ asset('storage/' . $item->gambar) }}"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#reviewModal">
                                                                                            Beri Penilaian
                                                                                        </button>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                @endforeach

                                                                    @if ($first->status_pesanan === 'Sudah Dikirim')
                                                                        <form action="{{ route('pesanan.selesai', $first->id) }}" method="POST" class="mt-3 text-center">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-success">
                                                                                Selesaikan Pesanan
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                </div>


                                                            </div>
                                                        </div>

                                                    @endforeach
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
            <label class="form-label d-block">Bintang:</label>
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
          <button type="submit" class="btn btn-review-kirim w-100">Kirim</button>
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

                    alert('Ulasan berhasil dikirim!');

                    setTimeout(() => {
                        location.reload();
                    }, 500);
                } else {
                    alert('Gagal mengirim Ulasan!');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengirim Ulasan.');
            }
        });});
</script>


@endsection

