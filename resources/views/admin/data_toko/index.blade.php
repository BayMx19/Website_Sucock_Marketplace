@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-status-wrap" style="margin-top: 75px;">
            <div class="row">
                <div class="col-sm-12 table_inside">
                    <h4 style="margin-left: 15px;">Data Toko</h4>

                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Toko</th>
                                <th>Email</th>
                                <th>Nomor HP</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th colspan="3">Aksi</th>
                            <tr>
                        </thead>

                        @foreach($toko as $toko)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $toko->name }}</td>
                            <td>{{ $toko->email }}</td>
                            <td>{{ $toko->nohp }}</td>
                            <td>{{ $toko->alamat }}</td>
                            <td>{{ $toko->status }}</td>
                            <td>
                                <span
                                    style="color: {{ $toko->status == 'ACTIVE' ? 'green' : ($toko->status == 'INACTIVE' ? 'red' : 'black') }}; font-weight: bold;">
                                    {{ $toko->status }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('admin.data_toko.detail', $toko->id) }}"
                                    class="btn btn-primary btn-sm me-2">Detail</a>


                                <form action="{{ route('admin.data_toko.destroy', $toko->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection