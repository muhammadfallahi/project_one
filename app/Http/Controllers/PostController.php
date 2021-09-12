<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'tags_id'=> 'required|array',
            "tags_id.*" => "required|exists:App\Models\Tag,id"
        ]);

        $post = Post::create([
            'user_id' =>Auth::user()->id,
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'author' => Auth::user()->name
        ]);

        $post->tags()->sync($validator['tags_id']);


        return redirect()
        ->route('post.index')
        ->with('message', "post $request->title create successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::findorfail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::findorfail($id);
        return view('posts.edit',compact('post'));
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
        $validator = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // DB::table('posts')
        // ->where('id', $id)
        // ->update([
        //     'title' => $request->title, 
        //     'content' => $request->content,
        // ]);

        $update = post::find($id);
        $update->title = "$request->title";
        $update->content = "$request->content";
        $update->save(); /* using save() method update the updated-at automatically */

        
        return redirect()
        ->route('post.index')
        ->with('message', "post $request->title update successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $title = post::find($id)->title;
        // DB::table('posts')->where('id', $id)->delete();
        post::find($id)->delete();

        return redirect()
        ->route('post.index')
        ->with('message',"post $title delete successfully!");
    }

    public function forceDelete($id)
    {
        $title = post::find($id)->title;
        
        post::find($id)->forcedelete();

        return redirect()
        ->route('post.index')
        ->with('message',"post $title forceDelete successfully!");

    }
}
