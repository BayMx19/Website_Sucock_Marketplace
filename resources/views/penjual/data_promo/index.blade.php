@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-status-wrap" style="margin-top: 75px;">
            <div class="row">
                <div class="col-sm-12 table_inside">
                    <h4 style="margin-left: 15px;">Data Promo</h4>
                    <div class="breadcomb-report">
                        <a href="/penjual/data_promo/create">
                            <button data-toggle="tooltip" title="Tambah Promo" class="btn btn-add">
                                <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Tambah Promo</button></a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Promo</th>
                                <th>Nilai Diskon</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Status</th>
                                <th colspan="3">Aksi</th>
                            <tr>
                        </thead>

                        @forelse($promos as $promo)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $promo->nama }}</td>
                            <td>{{ $promo->diskon_persen }}%</td>
                            <td>{{ $promo->mulai }}</td>
                            <td>{{ $promo->selesai }}</td>
                            <td>
                                <span
                                    style="color: {{ $promo->status == 'ACTIVE' ? 'green' : ($promo->status == 'INACTIVE' ? 'red' : 'black') }}; font-weight: bold;">
                                    {{ $promo->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('penjual.data_promo.detail', $promo->id) }}"
                                    class="btn btn-primary btn-sm me-2">Detail</a>
                                <a href="{{ route('penjual.data_promo.edit', $promo->id) }}"
                                    class="btn btn-warning btn-sm me-2">Edit</a>

                                <form action="{{ route('penjual.data_promo.destroy', $promo->id) }}" method="POST"
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
                            <td colspan="8">Data tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
