@extends('layout.template')
@section('content')
<main style="background-color: white;">

    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                                <div class="col-lg-8 mb-5 mb-lg-0">
                    <form class="form-contact contact_form" method="POST" action="" enctype="multipart/form-data">
                        <input type="hidden" name="aksi" id="aksi" value="edit" />
                        <input type="hidden" name="hid" id="hid" value="" />
                        <div class="blog_left_sidebar">
                            <article class="blog_item">
                                <div class="blog_item_img mb-10">
                                    <img class="card-img rounded-0" src="{{ asset('assets') }}/img/hero-bg-2.jpg" alt="">
                                    <div class="blog_item_date">
                                        <img src="{{ asset('assets') }}/img/pembeli.jpeg" id="fotoprofil" alt="Foto Profil" class="img-fluid" style="border-radius: 100%; width: 150px; height: 150px;">
                                    </div>
                                </div>
                                <div class="blog_details">

                                    <input type="checkbox" name="cbcek" id="cbcek" value="GANTI" onclick="javascript: if(this.checked==true){
                              document.getElementById('fotoprofil').style.display='none';
                            }else{
                              document.getElementById('fotoprofil').style.display='block'; }" />Centang jika foto mau diganti
                                    <input type="file" id="fotoprofil" name="fotoprofil" />
                                </div>
                                <div class="blog_details">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-sm-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>Nama Lengkap</h2>
                                                    </label>
                                                    <input type="text" required class="single-input" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" value="Kurnia Sari">
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>Username</h2>
                                                    </label>
                                                    <input type="text" required class="single-input" id="user" name="user" placeholder="Masukkan Username" value="Kurnia01">
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>Email</h2>
                                                    </label>
                                                    <input type="text" required class="single-input" id="email" name="email" placeholder="Masukkan Email" value="kurniasari@gmail.com">
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>No.Hp</h2>
                                                    </label>
                                                    <input type="text" required class="single-input" id="nohp" name="nohp" placeholder="Masukkan No.Hp" value="0815331120722">
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>Jenis Kelamin</h2>
                                                    </label>
                                                    <div class="default-select">
                                                        <select id="gender" name="gender">
                                                            <option value="L" >Laki-Laki</option>
                                                            <option value="P" selected>Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>Alamat</h2>
                                                    </label>
                                                    <textarea class="single-textarea" id="alamat" name="alamat" placeholder="Masukkan Alamat">Kab.Kediri</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <button type="submit" value="submit" class="btn_1">
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </article>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">

                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Logout</h4>
                            <a href=""><button class="w-100 btn_1"> <i class="fa fa-power-off"></i> Logout</button></a>

                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
