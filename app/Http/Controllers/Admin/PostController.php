<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Cathegory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('cathegory')->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $cathegories = Cathegory::all();
        return view('admin.posts.create', compact('post', 'cathegories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:posts|min:3',
            'content' => 'required|string|',
            'image' => 'nullable|string',
        ]);

        $data = $request->all();

        $post = new Post();
        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');

        $post->save();
        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $cathegories = Cathegory::all();
        return view('admin.posts.edit', compact('post', 'cathegories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|unique:posts|min:3',
            'content' => 'required|string|',
            'image' => 'nullable|string',
        ]);

        $data = $request->all();
        /* $post->fill($data); */
        $data['slug'] = Str::slug($post->title, '-');
        $data['cathegory_id'] = $request->cathegory_id;

        $post->save();

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('alert-message', 'Post successfully deleted')->with('alert-type', 'success');
    }
}
