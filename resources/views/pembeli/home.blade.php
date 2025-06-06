@extends('layout.template')
@section('content')
<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section ">
      <img src="{{ asset('assets') }}/img/hero-bg-2.jpg" alt="" class="hero-bg">

      <div class="container">
        <div class="row gy-4 justify-content-between">


          <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
            <h1 class="redressed-regular"> Sucock </h1>
            <p class="font-white">Dukung produk lokal dan temukan shuttlecock terbaik dari Sumengko di sini!</p>
            <div class="d-flex">
              <a href="{{ route('register') }}" class="btn-get-started">Daftar Sekarang!</a>
            </div>
          </div>

        </div>
      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>

    </section><!-- /Hero Section -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5 mt-5">
            <div class="col-xl-12 content">
                <h1 class="judul-produk"><span>Mitra Kami</span></h1>
            </div>

            <section class="popular-items w-100">
                <div class="container-fluid px-5">

                    <div class="swiper swiperMitra" style="height: 150px;">
                        <div class="swiper-wrapper align-items-center">
                            @foreach($list_toko as $toko)
                            <div class="swiper-slide d-flex justify-content-center">
                                <img src="{{ asset('storage/' . $toko->foto_profil) }}"
                                    alt="Foto Mitra"
                                    class="rounded-circle"
                                    style="width: 100px; height: 100px; object-fit: cover; border: 2px solid #ddd;">
                            </div>
                            @endforeach
                        </div>

                        <!-- Navigasi -->
                        <div class="swiper-button-next swiperMitraNext"></div>
                        <div class="swiper-button-prev swiperMitraPrev"></div>
                    </div>

                </div>
            </section>
        </div>

        <div class="row gy-5">

            <div class="col-xl-12 content">
                <h1 class="judul-produk"><span>Produk Populer</span></h1>
            </div>

            <section class="popular-items w-100">
                <div class="container-fluid px-5"> <!-- pakai fluid biar lebih lebar -->

                    <!-- Swiper -->
                    <div class="swiper mySwiper" style="height: 400px;">
                        <div class="swiper-wrapper">
                            @foreach($list_produk as $produk)
                            <div class="swiper-slide">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="gambar produk"
                                            class="img-fluid" style="height: 300px; object-fit: cover; width: 100%;">
                                        <div class="img-cap" data-bs-toggle="modal" data-bs-target="#modalProduk{{ $produk->id }}">
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

                            @endforeach
                            <div class="swiper-slide d-flex justify-content-center align-items-center" style="height: 100%;">
                                <div class="text-center w-100">
                                    <a href="/produk" class="btn btn-outline-primary px-4 py-2" style="border-radius: 8px;">
                                        Lihat Produk Lainnya →
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Navigasi -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <!-- Modal -->
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
                    <p class="mt-2">{{ $produk->deskripsi }}</p>
                    {{-- Tambahkan info lain jika ada --}}
                </div>
            </div>
        </div>
    </div>
</div>


                </div>
            </section>

        </div>
    </div>

     <!-- About Section -->
     <section id="about" class="about section">

      <div class="container">


        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
            <img src="{{ asset('assets') }}/img/logo WEB.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            <h1 class="fw-bold">Sucock</h1>
            <h2 >
                "Sucock merupakan Sebuah platform berbasis website yang dikembangkan untuk mendukung proses jual beli produk shuttlecock secara daring di Desa Sumengko."
            </h2>

          </div>
        </div><!-- Features Item -->

      </div>

    </section><!-- /Features Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <div><span>Check Our</span> <span class="description-title">Contact</span></div>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade" data-aos-delay="100">

        <div class="row gy-4">

        <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
                <h3>Sumengko, Sukomoro</h3>
                <p>Nganjuk, Jawa Timur, 64481</p>
            </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
                <h3>081 2345 67890</h3>
                <p>Senin - Jumat 08:00 - 16:00</p>
            </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
                <h3>Email Us</h3>
                <p>admin.sucock@gmailcom</p>
            </div>
            </div><!-- End Info Item -->

        </div>

        <div class="col-lg-8">
            <form action="" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">

                <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Lengkap" required="">
                </div>

                <div class="col-md-6 ">
                <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required="">
                </div>

                <div class="col-md-12">
                <input type="text" class="form-control" name="subject" placeholder="Masukkan Subyek" required="">
                </div>

                <div class="col-md-12">
                <textarea class="form-control" name="message" rows="6" placeholder="Masukkan Pesan" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>

                <button type="submit">Send Message</button>
                </div>

            </div>
            </form>
        </div><!-- End Contact Form -->

        </div>

    </div>

    </section><!-- /Contact Section -->

</main>

@endsection
