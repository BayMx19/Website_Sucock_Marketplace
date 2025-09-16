@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-status-wrap" style="margin-top: 75px;">
            <div class="row">
                <div class="col-sm-12 table_inside">
                    <h4 style="margin-left: 15px;">Data Produk</h4>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Toko</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Promo</th>
                                <th>Harga Setelah Diskon</th>
                                <th>Stok</th>
                                <th>Status</th>
                                <th colspan="3">Aksi</th>
                            <tr>
                        </thead>

                        @forelse($produk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->penjual->name }}</td>
                            <td>{{ $item->nama_produk }}</td>
                            <td data-harga="{{ $item->harga }}">Rp {{ number_format($item->harga,0,',','.') }}</td>
                            
                            {{-- Promo --}}
                            <td data-diskon="{{ $item->promo ? $item->promo->diskon_persen : 0 }}">
                                {{ $item->promo ? $item->promo->nama . ' - ' . $item->promo->diskon_persen . '%' : '-' }}
                            </td>

                            {{-- Harga Setelah Diskon --}}
                            <td class="harga-diskon"></td>

                            <td>{{ $item->stok }}</td>
                            <td>
                                <span
                                    style="color: {{ $item->status == 'ACTIVE' ? 'green' : ($item->status == 'INACTIVE' ? 'red' : 'black') }}; font-weight: bold;">
                                    {{ $item->status == 'ACTIVE' ? 'Aktif' : ($item->status == 'INACTIVE' ? 'Tidak Aktif' : $item->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.data_produk.detail', $item->id) }}"
                                    class="btn btn-primary btn-sm me-2">Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">Data tidak ditemukan.</td>
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
document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('table tr');
    rows.forEach(row => {
        const hargaTd = row.querySelector('[data-harga]');
        const diskonTd = row.querySelector('[data-diskon]');
        const hargaDiskonTd = row.querySelector('.harga-diskon');

        if (hargaTd && diskonTd && hargaDiskonTd) {
            const harga = parseFloat(hargaTd.dataset.harga) || 0;
            const diskon = parseFloat(diskonTd.dataset.diskon) || 0;
            let total = harga;
            if(diskon > 0){
                total = harga - (harga * (diskon/100));
            }
            hargaDiskonTd.textContent = 'Rp ' + total.toLocaleString('id-ID');
        }
    });
});
</script>
@endpush
