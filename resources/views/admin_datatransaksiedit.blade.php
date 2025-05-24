@extends('layout.template2')
@section('contentadmin')

<div class="row" style="margin-top: 30px;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
<div class="product-status-wrap" style="margin-top: 30px;">
<div class="row">
<form action="" method="POST" enctype="multipart/form-data">
<input type="hidden" name="aksi" id="aksi" value="edit" />
<input type="hidden" name="hid" id="hid" value="" />
<h4 style="margin-left: 15px;">Data Transaksi</h4>
<table>
    <tr>
        <th>Nama Pembeli</th>
        <th>Kode Transaksi</th>
        <th>Waktu Transaksi</th>
        <th>Produk</th>
        <th>Status Pembayaran</th>
        <th>Status Pesanan</th>
    </tr>
    <tr>
        <td>Kurnia Sari</td>
        <td>TR20230524182407646E3A2786EC0</td>
        <td>2023-05-24 23:24:07</td>
        <td>JP Gold</td>
        <td>
            <select class="form-control custom-select-value" id="statuspembayaran" name="statuspembayaran">
                <option value="Belum dikonfirmasi" >Belum dikonfirmasi</option>
                <option value="Belum diBayar" selected>Belum diBayar</option>
                <option value="Telah diBayar" >Telah diBayar</option>
            </select>
        </td>
        <td><select class="form-control custom-select-value" id="statuspesanan" name="statuspesanan">
                <option value="Sedang Diproses" >Proses</option>
                <option value="Sedang Dikemas" selected>Kemas Produk</option>
                <option value="Dalam Pengiriman" >Kirim Produk</option>
                <option value="Telah Diterima" >Telah Diterima</option>
            </select>
        </td>
    </tr>
</table>
<div class="form-group-inner">
    <div class="login-btn-inner">
        <div class="row">
            <div class="col-12 text-center">
                <div class="login-horizental cancel-wp">
                    <button
                        class="btn_1"

                        type="submit">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="custom-pagination">
<ul class="pagination">
<li class="page-item"><a class="page-link" href="#">Previous</a></li>
<li class="page-item"><a class="page-link" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul>
</div> -->
</form>
</div>
</div>
</div>
</div>
@endsection
