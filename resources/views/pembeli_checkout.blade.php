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
              <h2 class="judul-produk"> <span>Checkout</span></h2>
            </div>
          </div>
        </div>
        <div class="tab-content" id="nav-tabContent" style="margin: -20px;">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="whole-wrap">
              <div class="container ml-20">
                <form method="POST">
                                    <div class="col-md-12">
                    <div class="section-top-border">
                      <div class="row mb-30">
                        <div class="col-md-12">
                          <h6 class="mb-30" style="font-weight: 800;">Metode Pengiriman</h6>
                        </div>
                        <div class="col-md-4">
                          <div class="d-flex">
                                                          <div class="col-md-2">
                                <input type="radio" name="ongkir_id" value="1" required="required">
                              </div>
                              <div class="col-md-2">
                                <i class="fa-solid fa-truck-fast fa-2xl"></i>
                              </div>
                              <div class="col-md-6">
                                <h6 class="ml-10">reguler</h6>
                                <h6 class="ml-10">- Rp. 10.000</h6>
                              </div>
                                                          <div class="col-md-2">
                                <input type="radio" name="ongkir_id" value="2" required="required">
                              </div>
                              <div class="col-md-2">
                                <i class="fa-solid fa-truck fa-2xl"></i>
                                </div>
                              <div class="col-md-6">
                                <h6 class="ml-10">hemat</h6>
                                <h6 class="ml-10">- Rp. 5.000</h6>
                              </div>
                                                      </div>
                        </div>
                      </div>

                      <div class="row mb-30">
                        <div class="col-md-12">
                          <h6 class="mb-30" style="font-weight: 800;">Metode Pembayaran</h6>
                        </div>
                                                  <div class="col-md-3">
                            <div class="d-flex">
                              <div class="col-md-2">
                                <input type="radio" name="pembayaran_id" value="1" required="required">
                              </div>
                              <div class="col-md-2">
                                <i class="fa-solid fa-hand-holding-dollar fa-2xl"></i>
                                </div>
                              <div class="col-md-6">
                                <h6 class="ml-10">COD</h6>
                              </div>
                            </div>
                          </div>
                                                  <div class="col-md-4">
                            <div class="d-flex">
                              <div class="col-md-2">
                                <input type="radio" name="pembayaran_id" value="2" required="required">
                              </div>
                              <div class="col-md-2">
                                <i class="fa-solid fa-wallet fa-2xl"></i>
                                </div>
                              <div class="col-md-6">
                                <h6 class="ml-10">E-Wallet / Cockpay</h6>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="row">
                                                  <div class="col-md-12">
                            <h6 class="mb-30" style="font-weight: 800;">Alamat Pengiriman</h6>
                          </div>
                          <div class="col-md-12">
                            <h6>
                              Kurnia sari | 0815331120722</h6>
                          </div>
                          <div class="col-md-12 mb-30">
                            <h6>Kab. Kediri</h6>
                          </div>
                                              </div>

                      <div class="row mb-2" style="background-color: #f0f0f0;">
                                                                                                    <div class="col-md-2">
                            <img src="../penjual/foto/64345a11d90fa6422be698f9703.jpg" alt="" class="img-fluid" style='width: 170px; height: 150px;'>
                          </div>
                          <div class="col-md-4">
                            <h6 class="mt-3 text-center" style="font-weight: 600;">JP Gold</h6>
                            <h6 class="mt-3 text-center" style="font-weight: 800; color: #548c9a;">Rp. 100.000</h6>
                            <h6 class="mt-3 text-center" style="color: darkgray;">Jumlah : 1</h6>
                          </div>
                                                                      </div>
                    </div>
                    <div class="section-top-border text-right">
                      <h6 class="mb-20" style="font-weight: 800;">Sub-Total Produk : Rp. 100.000</h6>
                      <h6 class="mb-20" style="font-weight: 800;">Total Produk : Rp. 100.000</h6>
                      <button class="btn_1 mb-50" name="checkout">Checkout</button>
                    </div>
                  </div>
                </form>
                              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </main>
@endsection
