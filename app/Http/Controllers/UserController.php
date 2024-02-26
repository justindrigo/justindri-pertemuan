<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.petugas.index', [
            'title' => 'Petugas',
            'users' => $users,
        ]);
    }
    public function create()
    {
        return view('admin.petugas.create', [
            'title' =>'Tambah Admin'
        ]);
    }

    public function store(Request $request){

        // simpan data ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt( $request->password),
        ]);

        // kembalikan ke halaman manajemen admin
        return redirect('/users')->with('success', 'Data admin baru berhasil disimpan!');
    }
    // method untuk menampilkan form edit admin
    public function edit($id){
        $user = User::find($id);

        return view('admin.petugas.edit', [
            'title' => 'Edit Admin',
            'user' => $user,
        ]);
    }

    //method untuk menyimpan perubahan data admin
    public function update(Request $request, $id){

        //cari data admin berdasarkan id
        $user = User::find($id);

        //update data admin
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt( $request->password),
        ]);

          // kembalikan ke halaman manajemen admin
          return redirect('/users')->with('success', 'Data admin berhasil di edit!');
    }

    //method utk menghapus data admin
    public function destroy($id)
    {
        // cari data admin berdasarkan id
        $user = User::find($id);

        //hapus data admin
        $user->delete();

        // kembalikan halaman menejemen admin
        return redirect('/users')->with('success', 'Data admin berhasil dihapus!');

    }

}
