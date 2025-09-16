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
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Promo</th>
                                <th>Harga Setelah Promo</th>
                                <th>Stok</th>
                                <th>Status</th>
                                <th colspan="3">Aksi</th>
                            <tr>
                        </thead>

                        @forelse($produk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_produk }}</td>
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>
                                @if($item->nama_promo)
                                {{ $item->diskon_persen.'%' }} - 
                                    {{ $item->nama_promo }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="harga-promo-cell"
                                data-harga="{{ $item->harga }}"
                                data-diskon="{{ $item->diskon_persen ?? 0 }}">
                                -
                            </td>
                            <td>{{ $item->stok }}</td>
                            <td>
                                <span style="color: {{ $item->status == 'ACTIVE' ? 'green' : ($item->status == 'INACTIVE' ? 'red' : 'black') }}; font-weight: bold;">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('penjual.data_produk.detail', $item->id) }}" class="btn btn-primary btn-sm me-2">Detail</a>
                                <a href="{{ route('penjual.data_produk.edit', $item->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>

                                <form action="{{ route('penjual.data_produk.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.harga-promo-cell').forEach(function (cell) {
        const harga = parseFloat(cell.dataset.harga);
        const diskon = parseFloat(cell.dataset.diskon);

        if (diskon > 0) {
            const hargaDiskon = harga - (harga * (diskon / 100));
            cell.textContent = `Rp ${hargaDiskon.toLocaleString('id-ID')}`;
        } else {
            cell.textContent = `Rp ${harga.toLocaleString('id-ID')}`;
        }
    });
});
</script>
@endpush
