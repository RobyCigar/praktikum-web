<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // membuat pagination
        Paginator::useBootstrap();
        $data = Post::latest()->paginate(5);

        return view('posts.index', compact('data'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal mengupload gambar');
        }

        // memproses file upload
        $fileNameToStore = $this->uploadImage($request);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $fileNameToStore ? $fileNameToStore : null,
        ]);

        return redirect()->route('posts.index')->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        // memproses file upload
        $fileNameToStore = $this->uploadImage($request);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $fileNameToStore ? $fileNameToStore : $post->image,
        ]);
        
        return redirect()->route('posts.index')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        
        return redirect()->route('posts.index')->with('success','Post deleted successfully');
    }

    /** 
    *   Untuk memproses upload gambar
    *
    *   @param Request $request
    *   @return string
    */
    public function uploadImage(Request $request) {
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            // Mendapatkan Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Mendapatkan Extension
            $extension = $request->file('image')->getClientOriginalExtension();

            // Nama file yang akan disimpan
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            // Upload Image
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);
        } else {
            $fileNameToStore = false;
        }

        return $fileNameToStore;
    }
}
