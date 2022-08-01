<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(){
        return view("personal.profile",[
            'comments' => Comment::all()->where('user_id',auth()->user()->id),
            'posts' => Post::all()->where('user_id',auth()->user()->id)
        ]);
    }
}
