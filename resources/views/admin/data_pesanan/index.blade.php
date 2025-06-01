@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-status-wrap" style="margin-top: 75px;">
            <div class="row">
                <div class="col-sm-12 table_inside">
                    <h4 style="margin-left: 15px;">Data Pesanan</h4>
                    <div class="breadcomb-report">
                        <a href=""><button data-toggle="tooltip" title="Download Report" class="btn btn-add"
                                style="color: white;">
                                <i class="fa-solid fa-download" style="color: #ffffff;"></i> Unduh Pdf</button></a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pembeli</th>
                                <th>Kode Pesanan</th>
                                <th>Waktu Pesanan</th>
                                <th>Status Pesanan</th>
                                <th>Pengaturan</th>
                            </tr>
                        </thead>
                        @forelse($pesanan as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama_pembeli }}</td>
                            <td>{{ $p->kode_pesanan }}</td>
                            <td>{{ $p->tanggal_pesanan }}</td>
                            <td>{{ $p->nama_produk }}</td>
                            <td>{{ $p->nama_penjual }}</td>
                            <td>{{ $p->status_pesanan }}</td>
                            <td>
                                <a href="{{ route('admin.data_pesanan.detail', $p->id) }}"
                                    class="btn btn-primary btn-sm me-2">Detail</a>
                                <!-- <a href="{{ route('admin.data_users.edit', $p->id) }}"
                                    class="btn btn-warning btn-sm me-2">Edit</a>

                                <form action="{{ route('admin.data_users.destroy', $p->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus?');">Hapus</button>
                                </form> -->
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2">Data tidak ditemukan.</td>
                        </tr>
                        @endforelse
                        <!-- <tr>
                            <td>1</td>
                            <td>Kurnia Sari</td>
                            <td>TR20230524182407</td>
                            <td>2023-05-24 23:24:07</td>
                            <td>JP Gold</td>
                            <td><button class='dt-setting'>Belum diBayar</button></td>
                            <td><button class='pt-setting'>Sedang Dikemas</button></td>
                            <td>
                                <button data-toggle='modal' data-target="#exampleModalLong" class='pd-setting-ed'>
                                    <i class='fa fa-light fa-eye'style="color: #ffffff;"></i>
                                </button>
                                <a href='/admin/datatransaksi/edit'><button data-toggle='tooltip' title='Edit Status' class='pt-setting'><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button>
                                </a>
                                <a href='#' onclick="javascript: if(confirm('Apakah produk dengan nama JP Gold mau dihapus?')==true){window.location.href=''; } ">
                                    <button data-toggle='tooltip' title='Hapus' class='ds-setting'>
                                        <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                    </button>
                                </a>
                            </td>
                        </tr> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="product-tab-list tab-pane fade active in"
                    style="max-width: 100%; width: 370px; height: 350px; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ asset('assets') }}/img/cock.jpg" alt="Foto Users"
                        style="width: 370px; height: 350px; border-radius:100%;" />
                </div>
                <div class="single-product-details res-pro-tb">
                    <h2 style="margin-top: 50px;">Lasmijan.sport</h2>
                    <div class="single-pro-cn">
                        <h4 style="margin-top: 15px;">Nama Toko: Lasmijan.sport</h4>
                        <h4 style="margin-top: 15px;">Alamat Pembeli: Kurnia Sari</h4>
                        <h4 style="margin-top: 15px;">No.Hp : 081234567890</h4>
                        <h4 style="margin-top: 15px;">Alamat Pengiriman : Kediri</h4>
                        <h4 style="margin-top: 15px;">Metode Pengiriman : Hemat</h4>
                        <h4 style="margin-top: 15px;">Metode Pembayaran : COD</h4>
                        <h4 style="margin-top: 15px;">Waktu Pemesanan : 2023-05-24 23:24:07</h4>
                        <h4 style="margin-top: 15px;">Pembayaran : Belum diBayar</h4>
                        <h4 style="margin-top: 15px;">Status Pesanan : Sedang Dikemas</h4>

                        <h4 style="margin-top: 15px;">Ongkir : Rp5.000</h4>
                        <h4 style="margin-top: 15px;">Total Pesanan : Rp105.000</h4>
                        <h4 style="margin-top: 15px;">No.Transaksi : TR20230524182407</h4>
                        <h4 style="margin-top: 15px;">No.Transaksi Detail : TR20230524182407646E3A2786EC0</h4>
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
