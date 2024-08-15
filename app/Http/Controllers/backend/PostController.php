<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.post.index')->with('posts',Post::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:100',
            'sub_title'=>'required|max:100',
            'description'=>'required'
        ]);

        Post::create(['title'=>$request->title,'sub_title'=>$request->sub_title,'description'=>$request->description,'profile_id'=>Auth::user()->profile->id,'slug'=>Str::slug($request->title)]);
        
        session()->flash('success','Your post is successfully created!');

        

        return redirect()->route('index.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $index)
    {
       
        return view('backend.post.edit')->with('post',$index);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $index)
    {
        $request->validate([
            'title'=>'required|max:100',
            'sub_title'=>'required|max:100',
            'description'=>'required'
        ]);

        $index->title = $request->title;
        $index->sub_title = $request->sub_title;
        $index->description= $request->description;
        $index->slug = Str::slug($request->title);

        $index->save();

        session()->flash('success','Your post is successfully updated!');
        
        return redirect()->route('index.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($index)
    {
        $post = Post::findOrFail($index);

        $post->delete();

        return redirect()->back();
    }

    public function trash(){
        return view('backend.post.trash')->with('posts',Post::onlyTrashed()->paginate(10));
    }

    public function deleteFromTrash($index){
        $post = Post::withTrashed()->where('id',$index)->first();
        $post->forceDelete();

        session()->flash('success','Your post is successfully deleted From database!');

        return redirect()->back();
        
    }

    public function restore($index){
        $post = Post::withTrashed()->where('id',$index)->first();
        $post->restore();

        session()->flash('success','Your post is successfully Restored!');

        return redirect()->route('index.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Search for posts by title
        $posts = Post::where('title', 'LIKE', "%{$query}%")->get();

        return view('backend.post.searchResult')->with('posts',$posts);
    }
}
