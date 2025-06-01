@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-status-wrap" style="margin-top: 75px;">
            <div class="row">
                <div class="col-sm-12 table_inside">
                    <h4 style="margin-left: 15px;">Data Produk</h4>
                    <div class="breadcomb-report">
                        <a href="/penjual/data_produk/create">
                            <button data-toggle="tooltip" title="Tambah Produk" class="btn btn-add">
                                <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Tambah Produk</button></a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Toko</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Status</th>
                                <th colspan="3">Aksi</th>
                            <tr>
                        </thead>

                        @forelse($produk as $produk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $produk->user->name }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ $produk->harga }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>
                                <span
                                    style="color: {{ $produk->status == 'ACTIVE' ? 'green' : ($produk->status == 'INACTIVE' ? 'red' : 'black') }}; font-weight: bold;">
                                    {{ $produk->status }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('penjual.data_produk.detail', $produk->id) }}"
                                    class="btn btn-primary btn-sm me-2">Detail</a>
                                <a href="{{ route('penjual.data_produk.edit', $produk->id) }}"
                                    class="btn btn-warning btn-sm me-2">Edit</a>

                                <form action="{{ route('penjual.data_produk.destroy', $produk->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2">Data tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
