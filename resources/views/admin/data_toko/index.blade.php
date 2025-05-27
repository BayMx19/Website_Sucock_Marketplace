@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-status-wrap" style="margin-top: 75px;">
            <div class="row">
                <h4 style="margin-left: 15px;">Data Toko</h4>
                <div class="breadcomb-report">
                    <a href="/admin/datatoko/tambah">
                        <button data-toggle="tooltip" title="Tambah Toko" class="btn btn-add">
                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Tambah Toko</button></a>
                    <a href=""><button data-toggle="tooltip" title="Download Report" class="btn" style="color: white;">
                        <i class="fa-solid fa-download" style="color: #ffffff;"></i> Unduh Pdf</button></a>
                </div>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemilik</th>
                        <th>Nama Toko</th>
                        <th>Email</th>
                        <th>No.Hp</th>
                        <th colspan="3">Pengaturan</th>
                    </tr>
                    <tr>
                        <tr><td>1</td><td>Lasmijan</td><td>Lasmijan.sport</td><td>lasmijansport@gmail.com</td><td>081234567890</td><td>
                            <button data-toggle='modal' data-target="#exampleModalLong" class='pd-setting-ed'>
                                <i class='fa fa-light fa-eye'style="color: #ffffff;"></i></button>
                                            <a href='/admin/datatoko/edit'><button data-toggle='tooltip' title='Edit' class='pt-setting'><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button></a>
                                            <a href='#' onclick="javascript: if(confirm('Apakah toko dengan nama Lasmijan.sport mau dihapus?')==true)
                                            {window.location.href=''; } ">
                                            <button data-toggle='tooltip' title='Hapus' class='ds-setting'>
                                            <i class="fa-solid fa-trash" style="color: #ffffff;"></i></button></a>
                                        </td></tr>
                                    </tr>
                </table>
                <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Detail Toko</h5>
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
                    <h4 style="margin-top: 15px;">Nama Pemilik: Lamijan</h4>
                    <h4 style="margin-top: 15px;">Alamat Pemilik : Sumengko sukomoro</h4>
                    <h4 style="margin-top: 15px;">Username : lasmijan.sport</h4>
                    <h4 style="margin-top: 15px;">Email : lasmijansport@gmail.com</h4>
                    <h4 style="margin-top: 15px;">Jenis Kelamin : L</h4>
                    <h4 style="margin-top: 15px;">No.Hp : 081234567890</h4>
                    <h4 style="margin-top: 15px;">Alamat Toko : jl.kawi no.10 Ds.Sumengko SUkomoro</h4>

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
