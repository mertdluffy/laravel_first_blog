<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
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
            'voters' => ''
        ]);

        return back();
    }

    public function update(Comment $comment,User $user,int $mode){
        if(Str::contains($comment->voters,','.$user->id.'-0') and $mode ==0){
            $comment->update(['voters' => Str::replace(','.$user->id.'-0','',$comment->voters)]);
            $comment->update(['positive_votes' => $comment->positive_votes -= 1]);
        }
        elseif(Str::contains($comment->voters,','.$user->id.'-0') and $mode ==1){
            $comment->update(['voters' => Str::replace(','.$user->id.'-0','',$comment->voters)]);
            $comment->update(['positive_votes' => $comment->positive_votes -= 1]);
            $comment->update(['negative_votes' => $comment->negative_votes += 1]);
            $comment->update(['voters' => $comment->voters.','.$user->id.'-1']);
        }
        elseif(Str::contains($comment->voters,','.$user->id.'-1') and $mode ==1){
            $comment->update(['voters' => Str::replace(','.$user->id.'-1','',$comment->voters)]);
            $comment->update(['negative_votes' => $comment->negative_votes -= 1]);
        }
        elseif(Str::contains($comment->voters,','.$user->id.'-1') and $mode ==0){
            $comment->update(['voters' => Str::replace(','.$user->id.'-1','',$comment->voters)]);
            $comment->update(['positive_votes' => $comment->positive_votes += 1]);
            $comment->update(['negative_votes' => $comment->negative_votes -= 1]);
            $comment->update(['voters' => $comment->voters.','.$user->id.'-0']);
        }
        elseif($mode ==0){
            $comment->update(['positive_votes' => $comment->positive_votes += 1]);
            $comment->update(['voters' => $comment->voters.','.$user->id.'-0']);
        }
        elseif($mode ==1){
            $comment->update(['negative_votes' => $comment->negative_votes += 1]);
            $comment->update(['voters' => $comment->voters.','.$user->id.'-1']);
        }



        return back();
    }
}
