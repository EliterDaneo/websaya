<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = PostModel::latest()->paginate(5);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'judul' => 'required|min:5',
            'konten' => 'required|min:10',
        ]);

        // uploud gamabar
        $image = $request->file('image');
        $image->storeAs('public/post', $image->hashName());

        //simpan
        PostModel::create([
            'image' => $image->hashName(),
            'judul' => $request->judul,
            'konten' => $request->konten
        ]);

        Alert::success('Data Berhasil ditambahkan', 'Selamat data yang anda tambahkan berhasil ditambahkan');

        //redirect to
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = PostModel::findOrFail($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = PostModel::findOrFail($id);

        Storage::delete('public/post/', $post->image);

        $post->delete();

        Alert::warning('Data Ini Sudag Terhapus', 'Data yang terhapus tidak bisa di kembalikan lagi');

        return redirect()->route('posts.index')
            ->with(['success' => 'Data Berhasil dihapus']);
    }
}
