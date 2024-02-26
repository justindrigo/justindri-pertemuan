<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomepageController::class, 'index']);

//Route utk menampilkan halaman login
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login')->middleware('guest');

//Route utk memproses login
Route::post('/login', [AuthController::class, 'Login'])->middleware('guest');


//Route utk pengunjung yang sudah login
Route::middleware('auth')->group(function(){
    //Route utk menampilkan dashboard admin
});
Route::get('/admin', function(){
    return view('admin.dashboard.index', [
        'title' => 'Dashboard'
    ]);
});


    //utk halaman manajemen admin
    Route::get('/users', [UserController::class, 'index']);

    //utk menampolkan form tambah admin
    Route::get('/users/create', [UserController::class, 'create']);

    //u8tk menampilkan data admin baru
    Route::post('/users/store', [UserController::class, 'store']);

    //utk menampilkan form
    Route::get('/users/{id}/edit', [UserController::class, 'edit']);

    //utk menyimpan data perubahan data admin
    Route::put('/users/{id}/update', [UserController::class, 'update']);

    // Route utk menghapus data admin
    Route::get('users/{id}/destroy', [UserController::class, 'destroy']);

    //Route utk logout
    Route::get('/logout', [AuthController::class, 'logout']);

    //Route utk CRUD category
    Route::resource('categories', CategoryController::class);

    // Route utk CRUD post
    Route::resource('posts', PostController::class);

    //Route utk CRUD gallery
    Route::resource('galleries', GalleryController::class);

    Route::post('/images/store/{id}', [ImageController::class, 'store']);

    Route::delete('/images/{id}', [ImageController::class, 'destroy']);
