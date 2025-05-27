@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-status-wrap" style="margin-top: 75px;">
            <div class="row">
                <h4 style="margin-left: 15px;">Data Produk</h4>
                <div class="breadcomb-report">
                                    <a href="/admin/dataproduk/tambah">
                        <button data-toggle="tooltip" title="Tambah Produk" class="btn btn-add">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Tambah Produk</button></a>

                    <a href="laporan/laporandataproduk.php">
                        <button data-toggle="tooltip" title="Download Report" class="btn" style="color: white;">
                            <i class="fa-solid fa-download" style="color: #ffffff;"></i> Unduh Pdf</button></a>
                </div>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th>Status</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Pengaturan</th>
                    <tr>
                        <tr><td>1</td><td><img src="{{ asset('assets') }}/img/JP Gold.jpg" style='width: 170px; height: 150px;'></td><td>JP Gold</td><td>
                            <button class='pd-setting'>Ada</button></td><td>21</td><td>Rp. 100000</td><td>
                                <button data-toggle='modal' data-target="#exampleModalLong" class='pd-setting-ed'>
                                <i class='fa fa-light fa-eye'style="color: #ffffff;"></i></button>
                                            <a href='/admin/dataproduk/edit'><button data-toggle='tooltip' title='Edit' class='pt-setting'>
                                                <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button></a>
                                            <a href='#' onclick="javascript: if(confirm('Apakah produk dengan nama JP Gold mau dihapus?')==true)
                                            {window.location.href=''; } "><button data-toggle='tooltip' title='Hapus' class='ds-setting'>
                                                <i class="fa-solid fa-trash" style="color: #ffffff;"></i></button></a>
                                        </td></tr>                                   </tr>
                </table>
                <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Detail Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="product-tab-list tab-pane fade active in" style="max-width: 100%; width: 370px; height: 350px; display: flex; align-items: center; justify-content: center;">
                <img src="{{ asset('assets') }}/img/cock.jpg" alt="Foto Users" style="width: 370px; height: 350px; border-radius:100%;" />
            </div>
            <div class="single-product-details res-pro-tb">
                <h2 style="margin-top: 50px;">Lasmijan.sport</h2>
                <div class="single-pro-cn">
                    <h4 style="margin-top: 15px;">JP Gold</h4>
                    <button class='pd-setting'>Ada</button>
                    <h4 style="margin-top: 15px;">100000</h4>
                    <h4 style="margin-top: 15px;">- Kualitas tinggi, desain elegan, dan cocok untuk pertandingan.<br />
- Bahan : bulu entok berkualitas<br />
- Berat : 250 Gram </h5></h4>
                    <h4 style="margin-top: 15px;">Stok 21</h4>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            </div>
        </div>
    </div>
</div>
@endsection
