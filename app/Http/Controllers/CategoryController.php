<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: aparte request validation class maken voor validation rules voor hergebruik
        $attributes = $request->validate([
            'name' => 'required'
        ]);
        $attributes['slug']= fake()->unique()->slug();
        
        Category::create($attributes);   
        
        // TODO: onderstaande route bestaat niet?
        return redirect()->route('sessions.overview'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = $category->posts->sortByDesc('created_at');

        if (!Auth::check() || !Auth::user()->is_premium) {
            $posts = $category->posts->where('is_premium', 0)->sortByDesc('created_at');
        };
        
        return view('posts.category', ['posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $category = Category::with('posts')->where('slug', $request->category_slug)->first();
        $posts = $category->posts->sortByDesc('created_at');

        if (!Auth::check() || !Auth::user()->is_premium) {
            $posts = $category->posts->where('is_premium', 0)->sortByDesc('created_at');
        };

        return view('posts.category', ['posts' => $posts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
