<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Laravel\Prompts\password;

class AuthController extends Controller
{
    //method utk menampilkan from login
    public function showFormLogin()
    {
        return view('auth.login');
    }

    //method utk memproses login
    public function login(Request $request){
        //validasi data
        $validatedData = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        //cek login
        if(auth()->attempt($validatedData)){
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    //Method utk logout
    public function logout(){
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
