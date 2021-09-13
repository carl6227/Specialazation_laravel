<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\Post;
use App\Models\Comments;
class CommentController extends Controller
{
       

    public function store(Request $request, $post)
    {
        $this->validate($request, ['comment'=>'required']);
        $comment= new Comments();
        $comment->post_id=$post;
        $comment->user_id=Auth::user()->id;
        $comment->comment=$request->comment;
        $comment->save();

        return redirect("/p/$post");
    }
}