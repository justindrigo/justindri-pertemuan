<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ambil semua data post
        $posts = Post::all();

        //ambil semua data category
        $categories = Category::all();

        //tampilkan halaman index dan kirim data post
        return view('admin.posts.index', [
            'posts' => $posts,
            'title' => 'post',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ambil semua data category
        $categories = Category::all();

        //tampilkan halaman create dan kirim data category
        return view('admin.posts.create', [
            'categories' => $categories,
            'title' => 'Buat Post',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //simpan data post baru
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'status' => $request->status,
        ]);

        return redirect('/posts')->with('success', 'Post berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        //ambil semua data category
        $categories = Category::all();

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'title' => 'Edit Post',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        //update data post
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);

        return redirect('/posts')->with('success', 'Post berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //hapus data post
        $post->delete();

        return redirect('/posts')->with('success', 'Post berhasil dihapus');
    }
}
