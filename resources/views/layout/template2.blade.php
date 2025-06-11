<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sucock</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicons -->
    <link href="{{ asset('/assets/img/logo_WEB.png') }}" rel="icon">
    <!-- <link href="{{ asset('/assets/img/logo_WEB.png') }}" rel="apple-touch-icon"> -->
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- nalika Icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/assets/css/nalika-icon.css') }}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owl.transitions.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/assets/css/animate.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/assets/css/normalize.css') }}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/assets/css/meanmenu.min.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/assets/css/main2.css') }}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/assets/css/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/assets/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/assets/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/assets/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/calendar/fullcalendar.print.min.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/assets/css/responsive.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('/assets/css/form/all-type-forms.css') }}">

    <!-- Chart.JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            @include('layout.sidebar')
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.php"><img class="main-logo" src="img/logo/logo.png" alt=""
                                style="width: 100px;" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                @include('layout.header')
            </div>
            <!-- Mobile Menu start -->
            {{-- <div class="mobile-menu-area">
                    @include('layout.mobilemenu')
                </div> --}}
            <!-- Mobile Menu end -->
        </div>
        <div class="breadcome-area" style="margin-top: 50px;">
            <div class="container-fluid pt-15">
                @yield('contentadmin')
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright ©2025 Sucock (SumengkoShuttlecock), All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="{{ asset('/assets/js/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{ asset('/assets/js/wow.min.js') }}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{ asset('/assets/js/jquery-price-slider.js') }}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('/assets/js/jquery.meanmenu.js') }}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{ asset('/assets/js/owl.carousel.min.js') }}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{ asset('/assets/js/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('/assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('/assets/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{ asset('/assets/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('/assets/js/metisMenu/metisMenu-active.js') }}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{ asset('/assets/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('/assets/js/sparkline/jquery.charts-sparkline.js') }}"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{{ asset('/assets/js/calendar/moment.min.js') }}"></script>
    <script src="{{ asset('/assets/js/calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/calendar/fullcalendar-active.js') }}"></script>
    <!-- float JS
		============================================ -->
    <script src="{{ asset('/assets/js/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('/assets/js/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('/assets/js/flot/curvedLines.js') }}"></script>
    <script src="{{ asset('/assets/js/flot/flot-active.js') }}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('/assets/js/plugins.js') }}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
@livewireScripts
</body>

</html>
