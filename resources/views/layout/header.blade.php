<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="header-top-wraper">
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                        <div class="header-top-menu tabl-d-n hd-search-rp">
                            <div class="breadcome-heading">
                                <form role="search" method="GET" action="" style="display: flex; align-items: center; gap: 8px;">
                                    <input type="text" placeholder="Cari..." class="form-control" name="search" value="{{ request('search') }}" style="max-width: 180px;">
                                    <button type="submit" class="btn btn-md" style="background-color: transparent; border: none;">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <!-- <a href=""><i class="fa fa-search"></i></a> -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="header-right-info">
                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                <li class="nav-item">
                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                        class="nav-link dropdown-toggle">
                                        <i class="fa-solid fa-user"></i>
                                        <i class="fa-solid fa-caret-down"></i>
                                    </a>
                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn"
                                        style="margin-left: -120px ; background-color:#000000;">
                                        <li>
                                            @if(Auth::user()->role === 'Admin')
                                            <a href="/admin/profile"><i class="fa-solid fa-user" style="color: #f6f6f6;"></i> Profil</a>
                                            @elseif(Auth::user()->role === 'Penjual')
                                            <a href="/penjual/profile"><i class="fa-solid fa-user" style="color: #f6f6f6;"></i> Profil</a>
                                            @endif
                                        </li>
                                        <li>
                                            <a href="#" id="logout-link"
                                                style="display: flex; align-items: center; gap: 8px; color: #ffffff;">
                                                <i class="fa-solid fa-power-off"></i>
                                                <span>Keluar</span>
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('logout-link').addEventListener('click', function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'Konfirmasi Keluar',
        text: 'Apakah Anda yakin ingin keluar dari akun?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#24CAA1',
        confirmButtonText: 'Ya, Keluar',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout-form').submit();
        }
    });
});
</script>
