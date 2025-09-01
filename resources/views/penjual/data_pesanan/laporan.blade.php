@extends('layout.print')

@section('title', 'Laporan Pesanan Penjual')

@section('content')
<div class="container mt-4 text-center">
    <h4><b>Laporan Data Pesanan</b></h4>
    <p><b>{{ Auth::user()->name }}</p></b>
    <p>Periode: {{ $dari }} s/d {{ $ke }}</p>
    <hr style="border: 2px solid #000;"><br/><br/>

    <table class="table table-bordered" id="laporan-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Kode Pesanan</th>
                <th>Tanggal Pesanan</th>
                <th>Status</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanan as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama_pembeli }}</td>
                <td>{{ $p->kode_pesanan }}</td>
                <td>{{ $p->tanggal_pesanan }}</td>
                <td>{{ $p->status_pesanan }}</td>
                <td class="harga">Rp {{ number_format($p->total_harga,0,',','.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3 class="mt-4">
        <b>Total Pemasukan:</b> 
        <span id="totalPemasukan" style="color: green; font-weight: bold;">Rp 0</span>
    </h3>

    <hr style="border: 2px solid #000;">
    <button class="btn btn-primary no-print" onclick="window.print()">Print / Save as PDF</button>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let total = 0;
    document.querySelectorAll("#laporan-table .harga").forEach(td => {
        let num = td.textContent.replace(/[^\d]/g, "");
        total += parseInt(num || 0);
    });
    let formatted = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(total);
    document.getElementById("totalPemasukan").textContent = formatted;
});
</script>
@endsection
