<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('sessions.overview',  ['posts' => $user->posts->sortByDesc('created_at')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register.create'); 
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
                'name' => ['required', 'min:2', 'max:255' ],
                'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')], 
                'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
                'password' => ['required', 'min:7', 'max:255'],
                'is_premium' => ['required', 'boolean']
        ]);
        
        auth()->login(User::create($attributes));
        return redirect('/')->with('success', 'Your account has been created and you are now logged in');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (!Auth::check()) {
            $posts = $user->posts->where('premium', 0)->sortByDesc('created_at'); // regel 62 & 64 kunnen samen
        } elseif (!Auth::user()->is_premium) {
            $posts = $user->posts->where('premium', 0)->sortByDesc('created_at');
        } else {
            $posts = $user->posts->sortByDesc('created_at');
        };

        return view('posts.author', ['posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('sessions.edit', ['user' => $user]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $updatedUser = User::findOrFail($user->id);
        
        $attributes = $request->validate([
            'name' => ['required', 'min:2', 'max:255' ],
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')->ignore($user->id)], 
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
        ]);
        
        $updatedUser->fill($attributes);
        $updatedUser->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
