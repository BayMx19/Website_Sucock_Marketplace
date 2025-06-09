<!-- Menu Tengah -->
<ul class="nav mx-auto">
    <li class="nav-item">
        <a class="nav-link active" href="/home">Beranda</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/produk">Produk</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/#about">Tentang</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/#contact">Kontak</a>
    </li>
</ul>

<!-- Menu Kanan -->
<ul class="nav d-flex align-items-center">
    @guest
    <li class="nav-item">
        <a href="{{ route('register') }}" class="btn-daftar me-2">Daftar</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('login') }}" class="btn_3 me-3">Login</a>
    </li>
    @endguest

    <li class="nav-item">
        @auth
        <a href="/pesan" class="nav-link"><i class="fa-solid fa-message"></i></a>
        @else
        <a href="{{ route('login') }}" class="nav-link"><i class="fa-solid fa-message"></i></a>
        @endauth
    </li>
    <li class="nav-item position-relative">
        @auth
        <a href="/keranjang" class="nav-link position-relative" style="padding : 0px !important;">
            <i class="fa-solid fa-cart-shopping"></i>
            @if (($jumlahKeranjang ?? 0) > 0)
            <span id="cart-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $jumlahKeranjang }}
            </span>
            @endif
        </a>
        @else
        <a href="{{ route('login') }}" class="nav-link"><i class="fa-solid fa-cart-shopping"></i></a>
        @endauth
    </li>
    @auth
    <li class="nav-item">
        <a href="{{ route('pembeli.profile') }}" class="nav-link"><i class="fa-solid fa-user"></i></a>
    </li>
    @endauth
    @auth
    <li class="nav-item">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="#" class="nav-link"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                class="fa-solid fa-power-off"></i></a>
    </li>
    @endauth
</ul>
