@extends('layout.template')
@section('content')
<main style="background-color: white;">

    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ asset('assets') }}/img/hero-bg-2.jpg" alt="">
                                <div class="blog_item_date">
                                    <img src="{{ asset('assets') }}/img/pembeli.jpeg" alt="Foto Profil" class="img-fluid" style="border-radius: 50%; width: 150px; height: 150px; max-width:100%; vertical-align:middle;">
                                </div>
                            </div>
                            <div class="blog_details">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="row">
                                                <div class="col-sm-12 mt-50 mb-10">
                                                    <label>
                                                        <h2>Nama Lengkap</h2>
                                                    </label>
                                                    <input type="text" required class="single-input" value="Kurnia sari" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>Username</h2>
                                                    </label>
                                                    <input type="text" required class="single-input" value="kurnia01" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>Jenis Kelamin</h2>
                                                    </label>
                                                    <input type="text" required class="single-input" value="P" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>Email</h2>
                                                    </label>
                                                    <input type="text" required class="single-input" value="kurniasari@gmail.com" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>No.Hp</h2>
                                                    </label>
                                                    <input type="text" required class="single-input" value="0815331120722" disabled>
                                                </div>
                                                <div class="col-12 mt-10 mb-10">
                                                    <label>
                                                        <h2>Alamat</h2>
                                                    </label>
                                                    <textarea class="single-textarea" disabled>Kab.Kediri</textarea>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </article>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget newsletter_widget" style="background-color: whitesmoke;">
                            <h4 class="widget_title">Edit Data</h4>
                            <a href="/profil/edit">
                                <button class="w-100 btn_1 "> <i class="fa fa-edit"></i> Edit Data</button>
                            </a>

                        </aside>
                        <aside class="single_sidebar_widget newsletter_widget" style="background-color: whitesmoke;">
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
