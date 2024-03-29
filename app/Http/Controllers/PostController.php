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

        $posts = Post::latest()->with('user', 'category');
        $categories = Category::all();
        
        if (!Auth::check() || !Auth::user()->is_premium) {
            $posts = Post::latest()->with('user', 'category')->where('is_premium', 0);
        };

        return view('posts.index', ['posts' => $posts->paginate(7), 'categories' => $categories]);

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
            'thumbnail' => 'image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')], 
            'is_premium' => 'required'
        ]);
        $attributes['slug']= Str::slug(request('name'));
        
        if($request['thumbnail']) 
        {
            $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        };
        
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
        // TODO: schrijf aparte middleware / policy om te voorkomen dat een niet premium user een premium bericht kan lezen
        if (!Auth::check() || !Auth::user()->is_premium) {
            if ($post->is_premium) {
                return redirect('/');
            } 
            return view('posts.post', ['post' => $post]);
        };

        return view('posts.post', ['post' => $post]);
        
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
            'thumbnail' => 'image',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'is_premium' => 'required'
        ]);
        $attributes['slug'] = Str::slug(request('name'));

        if($request['thumbnail']) 
        {
            $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        };

        $post->fill($attributes);
        $post->save();
        return redirect()->route('users.index'); 

    }

    public function search()
    {
        // TODO: in het slechtste geval worden er 2 queries uitgevoerd terwijl er maar 1 nodig is. Pas de code aan zodat er nooit
        // meer dan 1 query wordt uitgevoerd voor het ophalen van posts
        $posts = Post::latest()->with('user', 'category')->filter(request(['search']));
        $categories = Category::all();
        
        if (!Auth::check() || !Auth::user()->is_premium) {
            $posts = Post::latest()->with('user', 'category')->filter(request(['search']))->where('is_premium', 0);
        };

        return view('posts.index', ['posts' => $posts->paginate(), 'categories' => $categories]);

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
