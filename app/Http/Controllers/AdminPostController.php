<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(){

        return view('admin.posts.index',[
            'posts' => Post::paginate(50)
        ]);
    }



    public function create(){

        return view('admin.posts.create');
    }

    public function store(){

        $attributes = request()->validate([
            'title'=> 'required',
            'slug' => ['required', Rule::unique('posts','slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories','id')]
        ]);
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $attributes['user_id'] =auth()->id();

        Post::create($attributes);

        return redirect('/');

    }

    public function edit(Post $post){

        return view('admin.posts.edit',['post' => $post]);
    }

    public function update(Post $post){

        $attributes = request()->validate([
            'title'=> 'required',
            'slug' => ['required', Rule::unique('posts','slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories','id')]
        ]);

        $post->update($attributes);


        return back()->with('success','Post Updated');

    }

        public function destroy(Post $post){


        $post->delete();
            return back()->with('success','Post Deleted');

        }

}
