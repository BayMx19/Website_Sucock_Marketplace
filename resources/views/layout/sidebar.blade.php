@if(Auth::user()->role === 'Admin')
<div class="sidebar-header">
    <a href="/admin/home"><img class="main-logo" src="{{ asset('assets') }}/img/logo_WEB.png" alt=""
            style="width: 60px;" /></a>
</div>
<div class="nalika-profile">
    <div class="profile-dtl">
        <a href="#"><img
                src="{{ Auth::user()->foto_profil ? asset('storage/' . Auth::user()->foto_profil) : asset('/assets/img/default-user.png') }}"
                alt="Foto {{Auth::user()->name}}" /></a>
        <h2>{{ Auth::user()->name }}</h2>
    </div>
</div>
<div class="left-custom-menu-adp-wrap comment-scrollbar">
    <nav class="sidebar-nav left-sidebar-menu-pro">
        <ul class="metismenu" id="menu1">
            <li>
                <a href="/admin/home">
                    <i class="fa-solid fa-house" style="color: #ffffff;"></i>
                    <span class="mini-click-non">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="#" aria-expanded="false"><i class="fa-solid fa-folder-open"
                        style="color: #ffffff;"></i> <span class="mini-click-non">Data</span></a>
                <ul class="submenu-angle" aria-expanded="false">
                    <li><a title="Data Users" href="{{ route('admin.data_users.index') }}"><span
                                class="mini-sub-pro">Data Users</span></a></li>
                    <li><a title="Data Toko" href="{{ route('admin.data_toko.index') }}"><span class="mini-sub-pro">Data
                                Toko</span></a></li>
                    <li><a title="Data Produk" href="{{ route('admin.data_produk.index') }}"><span
                                class="mini-sub-pro">Data Produk</span></a></li>
                    <li><a title="Data Pesanan" href="{{ route('admin.data_pesanan.index') }}"><span
                                class="mini-sub-pro">Data Pesanan</span></a></li>
                    <li><a title="Data Review" href="{{ route('admin.data_review.index') }}"><span
                                class="mini-sub-pro">Data Review</span></a></li>
                </ul>
            </li>
            <li>
                <a href="/admin/profile">
                    <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                    <span class="mini-click-non">Profile</span>
                </a>
            </li>
            <!-- <li style="color: #ffffff;">
                <a class="has-arrow" href="#" aria-expanded="false"><i class="fa-solid fa-envelope"
                        style="color: #fefefe;"></i> <span class="mini-click-non" style=" color: #fff;">Pesan</span></a>
                <ul class="submenu-angle" aria-expanded="false">
                    <li><a title="Semua Pesan" href="/admin/datapesan"><span class="mini-sub-pro"
                                style=" color: #fff;">Semua Pesan
                            </span></a></li>
                </ul>
            </li> -->
            <li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="nav-link" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-power-off" style="color: #ffffff;"></i> Log Out
                </a>
            </li>
        </ul>
    </nav>
</div>
@elseif(Auth::user()->role === 'Penjual')
<div class="sidebar-header">
    <a href="/penjual/home"><img class="main-logo" src="{{ asset('assets') }}/img/logo_WEB.png" alt=""
            style="width: 60px;" /></a>
</div>
<div class="nalika-profile">
    <div class="profile-dtl">
        <a href="#"><img
                src="{{ Auth::user()->foto_profil ? asset('storage/' . Auth::user()->foto_profil) : asset('/assets/img/default-user.png') }}"
                alt="Foto {{Auth::user()->name}}" /></a>
        <h2>{{ Auth::user()->name }}</h2>
    </div>
</div>
<div class="left-custom-menu-adp-wrap comment-scrollbar">
    <nav class="sidebar-nav left-sidebar-menu-pro">
        <ul class="metismenu" id="menu1">
            <li>
                <a href="/penjual/home">
                    <i class="fa-solid fa-house" style="color: #ffffff;"></i>
                    <span class="mini-click-non">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="#" aria-expanded="false"><i class="fa-solid fa-folder-open"
                        style="color: #ffffff;"></i> <span class="mini-click-non">Data</span></a>
                <ul class="submenu-angle" aria-expanded="false">


                    <li><a title="Data Produk" href="{{ route('penjual.data_produk.index') }}"><span
                                class="mini-sub-pro">Data Produk</span></a></li>
                    <li><a title="Data Pesanan" href="{{ route('penjual.data_pesanan.index') }}"><span
                                class="mini-sub-pro">Data Pesanan</span></a></li>
                    <li><a title="Data Review" href="{{route('penjual.data_review.index') }}"><span
                                class="mini-sub-pro">Data Review</span></a></li>
                </ul>
            </li>
            <li style="color: #ffffff;">
                <a class="has-arrow" href="#" aria-expanded="false"><i class="fa-solid fa-envelope"
                        style="color: #fefefe;"></i> <span class="mini-click-non" style=" color: #fff;">Chat</span></a>
                <ul class="submenu-angle" aria-expanded="false">
                    <li><a title="Semua Pesan" href="/penjual/chat"><span class="mini-sub-pro"
                                style=" color: #fff;">Semua Chat
                            </span></a></li>
                </ul>
            </li>
            <li>
                <a href="/penjual/profile">
                    <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                    <span class="mini-click-non">Profile</span>
                </a>
            </li>
            <li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="nav-link" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-power-off" style="color: #ffffff;"></i> Log Out
                </a>
            </li>
        </ul>
    </nav>
</div>
@endif
