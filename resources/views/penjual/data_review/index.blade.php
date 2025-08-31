@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-status-wrap" style="margin-top: 75px;">
            <div class="row">
                <div class="col-sm-12 table_inside">
                    <h4 style="margin-left: 15px;">Data Review</h4>
                    

                    <table>
                        <tr>
                            <th>No</th>
                            <th>Nama Pembeli</th>
                            <th>Produk</th>
                            <th>Ulasan</th>
                            <th>Bintang</th>
                            <th colspan="2">Pengaturan</th>
                        </tr>

                        @forelse($review as $r)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $r->nama_pembeli }}</td>
                            <td>{{ $r->nama_produk }}</td>
                            <td>{{ $r->review_text }}</td>
                            <td><i class="fa fa-star" style="color: #24CAA1;"> {{ $r->bintang }}</i></td>
                            <td><a href="{{ route('penjual.data_review.detail', $r->id) }}" class="btn btn-primary btn-sm me-2">Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2">Data tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </table>
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