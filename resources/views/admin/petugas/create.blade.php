@extends('admin.layout')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="/users/store" method="post">
            @csrf
        <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email">
        </div>

        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password">
        </div>

        <button class="btn btn-purple" type="submit">Simpan</button>
        </form>
    </div>
</div>
@endsection
