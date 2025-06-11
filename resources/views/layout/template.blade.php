<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sucock</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- Favicons -->
    <link href="{{ asset('/assets/img/logo-WEB1.jpg') }}" rel="icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Vendor CSS Files -->
    <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="{{ asset('/assets/css/main.css') }}" rel="stylesheet">
    <!-- =======================================================
  * Template Name: Bootslander
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
<style>
    /* Custom styles for specific elements not fully covered by Tailwind or for finer control */
    .chat-container {
        min-height: calc(100vh - 80px); /* Sesuaikan tinggi sesuai kebutuhan, mempertimbangkan header/footer */
        border-radius: 1rem; /* Sudut lebih membulat */
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* Shadow lebih besar */
        font-family: 'Inter', sans-serif;
    }

    .chat-sidebar {
        background-color: #e3f2fd; /* Latar belakang biru muda untuk sidebar */
        border-radius: 1rem 0 0 1rem; /* Sudut membulat hanya di kiri */
    }

    .chat-main {
        background-color: #ffffff; /* Latar belakang putih untuk area chat utama */
        border-radius: 0 1rem 1rem 0; /* Sudut membulat hanya di kanan */
    }

    .user-list-item.active {
        background-color: #d1e7dd; /* Hijau muda untuk pengguna aktif, seperti di gambar */
        font-weight: 600;
        color: #1a202c;
    }

    .message-bubble {
        padding: 0.75rem 1rem;
        border-radius: 1rem; /* Bubble pesan membulat */
        line-height: 1.4;
        max-width: 75%; /* Batasi lebar bubble */
        word-break: break-word;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); /* Shadow lembut untuk bubble */
    }

    .message-bubble.sent {
        background-color: #007bff; /* Biru untuk pesan terkirim */
        color: #ffffff;
        border-bottom-right-radius: 0.25rem; /* 'Ekor' sudut sedikit */
        margin-left: auto; /* Dorong ke kanan */
    }

    .message-bubble.received {
        background-color: #f0f2f5; /* Abu-abu muda untuk pesan diterima */
        color: #333;
        border-bottom-left-radius: 0.25rem; /* 'Ekor' sudut sedikit */
        margin-right: auto; /* Dorong ke kiri */
    }

    .chat-input-container {
        border-top: 1px solid #e0e0e0;
    }

    .chat-input-field {
        padding: 0.75rem 1rem;
        border-radius: 1.5rem; /* Field input sangat membulat */
        border: 1px solid #cbd5e0;
        outline: none;
        transition: border-color 0.2s ease-in-out;
    }

    .chat-input-field:focus {
        border-color: #4299e1; /* Border biru saat fokus */
    }

    .send-button {
        background-color: #4299e1; /* Tombol kirim biru */
        color: white;
        padding: 0.75rem 1.25rem;
        border-radius: 1.5rem;
        transition: background-color 0.2s ease-in-out;
    }

    .send-button:hover {
        background-color: #3182ce; /* Biru lebih gelap saat hover */
    }

    .action-button {
        color: #a0aec0; /* Ikon abu-abu */
        font-size: 1.25rem;
        transition: color 0.2s ease-in-out;
    }

    .action-button:hover {
        color: #4a5568; /* Abu-abu lebih gelap saat hover */
    }

    /* Scrollbar styling (opsional, untuk estetika) */
    .chat-messages-scrollable::-webkit-scrollbar {
        width: 8px;
    }

    .chat-messages-scrollable::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .chat-messages-scrollable::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    .chat-messages-scrollable::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>
    @livewireStyles
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top bg-white shadow-sm">
        <div class="container-fluid container-xl d-flex justify-content-between align-items-center">
            <!-- Logo (Kiri) -->
            <a href="{{''}}" class="logo d-flex align-items-center me-3">
                <img src="{{ asset('assets') }}/img/logo_WEB.png" alt="Logo" style="height: 40px;">
            </a> @include('layout.navbar') <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </div>
    </header> @yield('content') <footer id="footer" class="footer dark-background">
        <div class="container copyright text-center mt-4">
            <p><span>Copyright ©2025 Sucock (SumengkoShuttlecock), All rights reserved.</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            </div>
        </div>
    </footer>
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Preloader -->
    <div id="preloader"></div>
    <!-- Vendor JS Files -->
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <!-- Main JS File -->
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    <!-- Inisialisasi Swiper -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                992: {
                    slidesPerView: 3
                },
                768: {
                    slidesPerView: 2
                },
                576: {
                    slidesPerView: 1
                }
            }
        });
    });
    </script>
    <script>
    var swiperMitra = new Swiper(".swiperMitra", {
        slidesPerView: 5,
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: ".swiperMitraNext",
            prevEl: ".swiperMitraPrev",
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            320: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 5,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 6,
                spaceBetween: 30,
            }
        }
    });
    </script>
    @livewireScripts


<script>
    // Fungsi untuk melakukan scroll ke bagian bawah chat
    function scrollToBottom() {
        const element = document.getElementById('scroll-to-bottom');
        if (element) {
            // Gunakan scrollIntoView dengan behavior smooth untuk animasi
            element.scrollIntoView({ behavior: 'smooth', block: 'end' });
        }
    }

    document.addEventListener('livewire:load', function () {
        // Panggil scrollToBottom saat komponen Livewire pertama kali dimuat
        scrollToBottom();

        // Livewire hook untuk auto-scroll setelah setiap pesan diproses
        Livewire.hook('message.processed', (message, component) => {
            // Pastikan hanya komponen chat-box yang di-scroll
            if (component.name === 'chat.chat-box') {
                scrollToBottom();
            }
        });
    });
</script>
</body>

</html>
