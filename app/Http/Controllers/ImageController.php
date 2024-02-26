<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request, $id){
        $request->validate([
            'gallery_id' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,heic|max:2048',
            'title' => 'required',
        ]);

        $file = $request->file('file');

        $fileName = time() . '-' . $file->extension();

        $file->move(public_path('images'), $fileName);

        $gallery = Gallery::find($id);

        Image::create([
            'gallery_id' => $gallery->id,
            'file' => $fileName,
            'title' => $request->title,
        ]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $image = Image::find($id);

        unlink(public_path('images/' . $image->file));

        $image->delete();

        return back()->with('success', 'Foto berhasil dihapus');
    }
}
