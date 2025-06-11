@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-status-wrap" style="margin-top: 75px;">
            <div class="row">
                <div class="col-sm-12 table_inside">
                    <h4 style="margin-left: 15px;">Data Pesanan</h4>

                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pembeli</th>
                                <th>Nama Toko</th>
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
                            <td>{{ $p->nama_penjual }}</td>
                            <td>{{ $p->kode_pesanan }}</td>
                            <td>{{ $p->tanggal_pesanan }}</td>
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
