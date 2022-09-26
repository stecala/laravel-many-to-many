<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class postsController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::where('user_id', Auth::id())->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $post= new Post();
        $tags= Tag::all();
        return view('admin.posts.create', compact('post','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->all();
        $data['user_id']=Auth::user()->id;
        $newPost= new Post();
        $newPost->fill($data);
        $newPost->img_post=Storage::put('uploads/user', $data['img_post']);
        $newPost->save();
        if(isset($data['tags'])){
            $newPost->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.posts.index', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);
	    return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post=Post::findOrFail($id);
        $tags= Tag::all();
        return view('admin.posts.edit', compact('post','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=$request->all();
        $newPost= Post::findOrFail($id);
        $newPost->fill($data);
        if(isset($data['tags'])){
            $newPost->tags()->sync($data['tags']);
        }
        else{
            $newPost->tags()->detach();
        }
        $newPost->save();
        return redirect()->route('admin.posts.index', $newPost->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post=Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('delete', $post->id);
    }
}
