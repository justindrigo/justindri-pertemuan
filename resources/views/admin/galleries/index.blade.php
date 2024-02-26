@extends('admin.layout')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <a href="/galleries/create" class="btn btn-primary">+ Galeri</a>
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Judul Post</th>
                    <th>Posisi</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>

                @foreach ($galleries as $gallery )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $gallery->post->title }}</td>
                    <td>{{ $gallery->position }}</td>
                    <td>
                        @if ($gallery->status == 'aktif')
                        <span class="badge bg-success text-light">{{ Str::ucfirst($gallery->status) }}</span>
                        @else
                        <span class="badge bg-WARNING text-light">{{ Str::ucfirst($gallery->status) }}</span>
                        @endif
                    </td>
                    <td class="d-flex justify-content-center">
                        <a href="/galleries/{{ $gallery->id }}" class="btn btn-success me-2 btn-sm">
                            <i data-feather="info"></i> Detail
                        </a>
                        <a href="/galleries/{{ $gallery->id }}/edit" class="btn btn-warning me-2 btn-sm">
                            <i data-feather="edit"></i> Edit
                        </a>
                        <form action="/galleries/{{ $gallery->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">
                                <i data-feather="trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
