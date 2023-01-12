<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validationexception;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'username' => ['required'], 
            'password' => ['required' ]
        ]);
        
        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'username' => 'Your provided credentials could not be verified.'
            ]);
        }
        
        $user = Auth::user();
        return redirect('/')->with(['user' => $user])->with('success', "Welcome back!");

    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
