@extends('admin.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <a href="/users/create" class="btn btn-purple">+ Admin</a>

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>

                @foreach ($users as $user)
                <tr>
                <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="/users/{{ $user->id }}/edit" class="btn btn-warning">Edit</a>
                        <a href="/users/{{ $user->id }}/destroy" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
