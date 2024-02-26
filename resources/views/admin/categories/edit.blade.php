@extends('admin.layout')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/categories/{{ $category->id }}" method="post">
                @csrf
                @method('put')
                <div class="form-group mb-3">
                    <label for="title">Judul</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $category->title }}" required>
                </div>

                <button type="submit" class="btn btn-primary d-block mx-auto">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
