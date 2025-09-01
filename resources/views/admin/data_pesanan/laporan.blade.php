@extends('layout.print')

@section('title', 'Laporan Pesanan')

@section('content')
<div class="container mt-4 text-center">
    <h4><b>Laporan Data Pesanan</b></h4>
    <p>Periode: {{ $dari }} s/d {{ $ke }}</p>
    <hr style="border: 0;
        height: 3px; 
        background: #000;
        margin: 20px 0;">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Nama Toko</th>
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
                <td>{{ $p->nama_penjual }}</td>
                <td>{{ $p->kode_pesanan }}</td>
                <td>{{ $p->tanggal_pesanan }}</td>
                <td>{{ $p->status_pesanan }}</td>
                <td>Rp {{ number_format($p->total_harga,0,',','.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr style="border: 0;
        height: 3px; 
        background: #000;
        margin: 20px 0;">
    <button class="btn btn-primary no-print" onclick="window.print()">Print / Save as PDF</button>
</div>
@endsection
