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
                                <th>Kode Pesanan</th>
                                <th>Total Harga Pesanan</th>
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
                            <td>{{ $p->total_harga }}</td>
                            <td>{{ $p->tanggal_pesanan }}</td>
                            <td>{{ $p->status_pesanan }}</td>
                            <td>
                                <a href="{{ route('penjual.data_pesanan.detail', $p->id) }}"
                                    class="btn btn-primary btn-sm me-2">Detail</a>
                                    @if($p->status_pesanan === 'Diproses')
                                            <form action="{{ route('penjual.data_pesanan.update_status', $p->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success btn-sm"
                                                    onclick="return confirm('Anda yakin ingin mengirim pesanan?')">Kirim Pesanan</button>
                                            </form>
                                        @endif
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
