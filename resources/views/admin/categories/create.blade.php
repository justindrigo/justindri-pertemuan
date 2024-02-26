@extends('admin.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="/categories" method="post">
            @csrf
        <div class="form-group mb-3">
            <label for="title">Judul</label>
            <input type="text" name="title" class="form-control" name="title" required>
        </div>

        <button type="submit" class="btn btn-primary d-block mx-auto">Simpan</button>
        </form>
    </div>
</div>
@endsection
