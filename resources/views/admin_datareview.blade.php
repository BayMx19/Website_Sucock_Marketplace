@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-status-wrap" style="margin-top: 75px;">
            <div class="row">
                <h4 style="margin-left: 15px;">Data Review</h4>
                <div class="breadcomb-report">
                    <a href="laporan/laporandatareview.php"><button data-toggle="tooltip" title="Download Report" class="btn" style="color: white;">
                        <i class="fa-solid fa-download" style="color: #ffffff;"></i> Unduh Pdf</button></a>
                </div>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>Nama Toko</th>
                        <th>Produk</th>
                        <th>Review</th>
                        <th>Rating</th>
                        <th colspan="2">Pengaturan</th>
                    </tr>
                    <tr><td>1</td><td>Kurnia Sari</td><td>Lasmijan.sport</td><td>JP Gold</td>
                    <td>Shuttlecock JP Gold sangat berkualitas,Bulu yang digunakan sangat stabil dan tahan lama, Cocok untuk latihan maupun pertandingan.</td>
                    <td><i class='fa fa-star' style='color: #24CAA1;'>4</td></i><td><a href='#' onclick="javascript: if(confirm('Apakah review dariKurniasari untuk produk JP Gold mau dihapus?')==true)
                           {window.location.href=''; } "><button data-toggle='tooltip' title='Hapus' class='ds-setting'><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button></a></td></td>

                </table>
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
