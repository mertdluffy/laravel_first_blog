<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use http\Env\Response;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{

    public function index(){
      return view("posts.index",[
            'posts' => Post::latest()
                ->filter(request(['search','category','author']))
                ->with('category','author')->paginate(6),

        ]);

    }

    public function show(Post $post){
        return view("posts.show",[
            'post' => $post
        ]);


    }
}
