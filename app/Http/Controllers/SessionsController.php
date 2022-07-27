<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success','Goodbye');
    }

    public function create(){
        return view('sessions.create');
    }

    public function store(){
        $attributes = request()->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                'username'=>'Your provided credentials could not be verified'
            ]);

        }



        session()->regenerate();

        return redirect('/')->with('success','Welcome Back');

    }
}
