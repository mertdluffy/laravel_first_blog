<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{

    public function store(Post $post)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body'),
            'negative_votes' => 0,
            'positive_votes' => 0,
        ]);

        return back();
    }

    public function update(Comment $comment,User $user,int $mode){

        if($mode==0) {
            $comment->update(['positive_votes' => $comment->positive_votes += 1]);
        }
        else
        {
            $comment->update(['negative_votes' => $comment->negative_votes += 1]);
        }


        return back();
    }
}
