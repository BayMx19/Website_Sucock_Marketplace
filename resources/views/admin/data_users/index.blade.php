@extends('layout.template2')
@section('contentadmin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-status-wrap" style="margin-top: 75px;">
            <div class="row">
                <div class="col-sm-12 table_inside">
                    <h4 style="margin-left: 15px;">Data Users</h4>
                    <div class="breadcomb-report">
                        <a href="/admin/data_users/create">
                            <button data-toggle="tooltip" title="Tambah User" class="btn btn-add">
                                <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Tambah User</button></a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th colspan="3">Aksi</th>
                            <tr>
                        </thead>

                        @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->jenis_kelamin }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <span
                                    style="color: {{ $user->status == 'ACTIVE' ? 'green' : ($user->status == 'INACTIVE' ? 'red' : 'black') }}; font-weight: bold;">
                                    {{ $user->status }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('admin.data_users.detail', $user->id) }}"
                                    class="btn btn-primary btn-sm me-2">Detail</a>
                                <a href="{{ route('admin.data_users.edit', $user->id) }}"
                                    class="btn btn-warning btn-sm me-2">Edit</a>

                                <form action="{{ route('admin.data_users.destroy', $user->id) }}" method="POST"
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
