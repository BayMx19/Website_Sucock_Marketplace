@extends('layout.template')
@section('content')
<main>
    <!-- Hero Area Start-->
    <div class="popular-items section-padding">
      <div class="container">
        <!-- Section tittle -->
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-8 col-md-10">
            <div class="section-tittle text-center mt-100">
              <h1 class="judul-produk"><span>Keranjang Saya</span></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================Cart Area =================-->
    <section class="cart_area section_padding">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">
                    <h6>No.</h6>
                  </th>
                  <th scope="col">
                    <h6>Gambar Produk</h6>
                  </th>
                  <th scope="col">
                    <h6>Nama Produk</h6>
                  </th>
                  <th scope="col">
                    <h6>Toko</h6>
                  </th>
                  <th scope="col">
                    <h6>Harga</h6>
                  </th>
                  <th scope="col">
                    <h6>Jumlah</h6>
                  </th>
                  <th scope="col">
                    <h6>Total</h6>
                  </th>
                  <th scope="col">
                    <h6>Tindakan</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                                                                    <tr>
                    <td>1</td>
                    <td><img src="{{ asset('assets') }}/img/JP Gold.jpg" style='width: 170px; height: 150px;'></td>
                    <td>
                      <h4 class="name">JP Gold                    </td>
                    <td>
                      <h4 class="name">Lasmijan.sport                    </td>
                    <td>
                      <h4 class="price">Rp. 100.000</h4>
                    </td>
                    <td><h4>1</h4></td>
                    <td>
                      <h4 class="sub-total"><span> Rp. 100.000</span></h4>
                    </td>
                    <td>
                    <a href=''><button class='btn-danger'><i class='fa fa-solid fa-trash'></i></button></a>
                    </td>
                  </tr>
              </tbody>
                                      </table>


            <div class="checkout_btn_inner" style="text-align: center; margin-bottom: 100px;">
            <a href=""><button type="button" class="btn_3 checkout_btn_1">Lanjut Belanja</button></a>
              <a href=""><button type="button" class="btn_3 checkout_btn_1" style="margin-left: 100px;">Checkout</button></a>
            </div>
          </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
  </main>
@endsection
