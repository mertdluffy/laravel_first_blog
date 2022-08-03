<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($mode){
        return view("profile.$mode",[
            'comments' => Comment::all()->where('user_id',auth()->user()->id),
            'posts' => Post::latest()
                ->filter(request(['search','category','author']))
                ->where('user_id',auth()->user()->id)
                ->with('category','author')->paginate(6)

        ]);
    }
}
