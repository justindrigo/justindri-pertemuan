<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        //ambil data gallery dengan judul post 'slider' yang statusnya aktif
        $gallery = post::where('title', 'Slider')->first()->galleries->where('status', 'aktif')->first();

        //dapatkan data images dari hasil slider gallery
        $sliders = $gallery->images;

        //ambil data post dengan kategori galeri sekolah, kecuali post dengan judul Slider
        $posts = Post::whereHas('category', function ($query) {
            $query->where('title', 'Galeri Sekolah');
        })->where('title', '!=', 'Slider')->get();

        //ambil data post dengan kategori agenda sekolah
        $agendas = Post::whereHas('category', function ($query){
            $query->where('title', 'Agenda Sekolah');
        })->get();

        //ambil fata post dengan kategori informasi terkini
        $information = Post::whereHas('category', function ($query){
            $query->where('title', 'Informasi Terkini');
        })->first();

        //ambil data post dengan kategori peta
        $map = Post::whereHas('category', function ($query){
            $query->where('title', 'Peta');
        })->first();


        return view('welcome', [
            'sliders' => $sliders,
            'posts' => $posts,
            'agendas' => $agendas,
            'information' => $information,
            'map' => $map,
        ]);
    }
}
