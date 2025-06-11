@extends('layout.template')

@section('head-extra')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
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
                                                                <p class="mb-0"><strong>Status :</strong> {{ $item->status_pesanan }}</p>
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
                                                                <p class="mb-0"><strong>Status :</strong> {{ $item->status_pesanan }}</p>
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
                                                                <button class="btn btn-secondary btn-sm review-button"
                                                                    data-bs-toggle="modal" data-bs-target="#reviewModal"
                                                                    data-product-id="1" data-product-name="{{ $item->nama_produk }}"
                                                                    data-product-image="{{ asset('storage/' . $item->gambar) }}">Berikan
                                                                    Penilaian</button>
                                                            </div>
                                                        </div>
                                                        <p class="mt-3"><strong>Status:</strong> {{ $item->status_pesanan }}</p>
                                                        <p><strong>Tanggal Selesai:</strong> {{ $item->updated_at }}</p>
                                                        <hr>
                                                        @endforeach
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

    {{-- Single Modal for Product Review --}}
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewModalLabel"></h5>
                    {{-- Judul akan diisi JS --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center mb-3">
                        <div class="col-auto text-center">
                            Custom Watch
                        </div>
                        <div class="col">
                            <p class="mb-0 fw-bold" id="productNameModal"></p>
                            <small class="text-muted" id="productVariantModal"></small>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mb-3">
                        <div class="rating-stars" id="ratingStars">
                            <i class="fas fa-star star-icon" data-rating="1"></i>
                            <i class="fas fa-star star-icon" data-rating="2"></i>
                            <i class="fas fa-star star-icon" data-rating="3"></i>
                            <i class="fas fa-star star-icon" data-rating="4"></i>
                            <i class="fas fa-star star-icon" data-rating="5"></i>
                        </div>
                        <input type="hidden" id="selectedRating" name="rating" value="0">
                        {{-- Default value 0 --}}
                    </div>




                    <p class="fw-bold">Apa yang bikin kamu puas?</p>
                    <form id="reviewForm">
                        <input type="hidden" id="modalProductId" name="product_id">
                        <div class="mb-3">
                            <textarea class="form-control" id="reviewText" name="review_text" rows="4"
                                placeholder="Ceritain kepuasanmu tentang kualitas barang dan pelayanan penjual."
                                required></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-secondary me-2"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Kirim Penilaian</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        /* Tambahkan CSS ini untuk styling bintang */
        .rating-stars .star-icon {
            color: #e4e5e9;
            /* Warna abu-abu default */
            font-size: 2em;
            /* Ukuran bintang */
            cursor: pointer;
            transition: color 0.2s ease-in-out;
        }

        /* Warna kuning saat bintang di-hover atau diberi kelas 'hovered' (untuk transisi) */
        .rating-stars .star-icon.hovered,
        .rating-stars .star-icon:hover {
            color: #ffc107;
            /* Kuning */
        }

        /* Warna kuning saat bintang 'selected' (diklik) */
        .rating-stars .star-icon.selected {
            color: #ffc107 !important;
            /* Gunakan !important untuk memastikan override */
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var reviewButtons = document.querySelectorAll('.review-button');
            var reviewModalElement = document.getElementById('reviewModal');
            var reviewModal = new bootstrap.Modal(reviewModalElement);

            var productNameModal = document.getElementById('productNameModal');
            var productVariantModal = document.getElementById('productVariantModal');
            var productImage = document.getElementById('productImage');
            var modalProductId = document.getElementById('modalProductId');
            var selectedRatingInput = document.getElementById('selectedRating');
            var reviewTextarea = document.getElementById('reviewText');
            var ratingStarsContainer = document.getElementById('ratingStars');
            var starIcons = ratingStarsContainer.querySelectorAll('.star-icon');

            // Fungsi untuk mengupdate tampilan bintang berdasarkan rating
            function updateStarDisplay(ratingValue) {
                starIcons.forEach(star => {
                    if (parseInt(star.dataset.rating) <= ratingValue) {
                        star.classList.add('selected');
                    } else {
                        star.classList.remove('selected');
                    }
                });
            }

            // Reset modal saat ditutup
            reviewModalElement.addEventListener('hidden.bs.modal', function() {
                document.getElementById('reviewModalLabel').textContent = '';
                productNameModal.textContent = '';
                productVariantModal.textContent = '';
                productImage.src = '';
                productImage.alt = '';
                modalProductId.value = '';
                selectedRatingInput.value = '0'; // Reset rating ke 0
                reviewTextarea.value = ''; // Clear textarea
                updateStarDisplay(0); // Reset tampilan bintang
            });

            // Event listener untuk tombol review (membuka modal)
            reviewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    var productId = this.dataset.productId;
                    var productName = this.dataset.productName;
                    var productVariant = this.dataset.productVariant;
                    var productImageUrl = this.dataset.productImage;

                    document.getElementById('reviewModalLabel').textContent = 'Berikan Penilaian untuk ' +
                        productName;
                    productNameModal.textContent = productName;
                    productVariantModal.textContent = 'Varian: ' + productVariant;
                    productImage.src = productImageUrl;
                    productImage.alt = productName;
                    modalProductId.value = productId; // Set product_id ke hidden input

                    // Reset rating saat modal dibuka
                    selectedRatingInput.value = '0';
                    updateStarDisplay(0); // Set semua bintang ke abu-abu
                });
            });

            // Event listener untuk klik bintang
            ratingStarsContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('star-icon')) {
                    let rating = parseInt(e.target.dataset.rating);
                    selectedRatingInput.value = rating; // Set nilai rating ke hidden input
                    updateStarDisplay(rating); // Update tampilan bintang
                }
            });

            // Event listener untuk hover bintang (memvisualisasikan rating)
            ratingStarsContainer.addEventListener('mouseover', function(e) {
                if (e.target.classList.contains('star-icon')) {
                    let hoverRating = parseInt(e.target.dataset.rating);
                    starIcons.forEach(star => {
                        if (parseInt(star.dataset.rating) <= hoverRating) {
                            star.classList.add('hovered');
                        } else {
                            star.classList.remove('hovered');
                        }
                    });
                }
            });

            // Event listener untuk mouseleave dari area bintang
            ratingStarsContainer.addEventListener('mouseleave', function() {
                let currentRating = parseInt(selectedRatingInput.value);
                starIcons.forEach(star => {
                    star.classList.remove('hovered'); // Hapus kelas hovered
                });
                updateStarDisplay(currentRating); // Kembalikan ke rating yang dipilih
            });

            // Handle form submission (contoh sederhana, Anda perlu menambahkan AJAX di sini)
            document.getElementById('reviewForm').addEventListener('submit', function(e) {
                e.preventDefault(); // Mencegah form dari submit default

                const productId = document.getElementById('modalProductId').value;
                const rating = document.getElementById('selectedRating').value;
                const reviewText = document.getElementById('reviewText').value;

                if (rating === '0' || !rating) {
                    alert('Silakan berikan rating bintang!');
                    return;
                }
                if (!reviewText.trim()) {
                    alert('Ulasan tidak boleh kosong!');
                    return;
                }


                console.log('Mengirim review:', {
                    product_id: productId,
                    bintang: rating,
                    review_text: reviewText
                });

                // TODO: Di sini Anda akan menggunakan AJAX (Fetch API atau Axios) untuk mengirim data ke Laravel backend Anda.
                // Contoh Fetch API:

                fetch('/api/reviews', { // Ganti dengan endpoint API Anda
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Pastikan token CSRF dikirim jika Anda menggunakan Laravel
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            bintang: rating,
                            review_text: reviewText
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Review berhasil dikirim:', data);
                        reviewModal.hide(); // Sembunyikan modal
                        alert('Terima kasih atas ulasan Anda!');
                        // Opsional: perbarui UI (misalnya, ubah tombol "Berikan Penilaian" menjadi "Ulasan Terkirim")
                    })
                    .catch(error => {
                        console.error('Error mengirim review:', error);
                        alert('Terjadi kesalahan saat mengirim ulasan.');
                    });


                // Untuk demo, langsung sembunyikan modal
                reviewModal.hide();
                alert('Ulasan berhasil dikirim (simulasi)!');
            });
        });
    </script>
@endpush
