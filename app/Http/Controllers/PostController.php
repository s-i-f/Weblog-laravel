<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
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
        if (!Auth::check()) {
            $posts = Post::latest()->with('user', 'category')->where('premium', 0)->get();
        } elseif (!Auth::user()->is_premium) {
            $posts = Post::latest()->with('user', 'category')->where('premium', 0)->get();
        } else {
            $posts = Post::latest()->with('user', 'category')->get();
        };

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id'),
            'is_premium' => 'required']
        ]);
        $attributes['slug']= Str::slug(request('name'));
        Auth::user()->posts()->create($attributes);        
        return redirect()->route('users.index'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (!Auth::check()) {
            return redirect('/');
        } elseif (!Auth::user()->is_premium) {            
            return redirect('/');
        } else {
            return view('posts.post', ['post' => $post]);
        };
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        
        return view('posts.edit', ['post' => $post, 'categories' => $categories]);
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
        $attributes = $request->validate([
            'name' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id'),
            'is_premium' => 'required']
        ]);
        $attributes['slug'] = Str::slug(request('name'));
        $post->fill($attributes);
        $post->save();
        return redirect()->route('users.index'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post){
            $post->delete();
        }
        return redirect()->route('users.index'); 
 
    }
}
