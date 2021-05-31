<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Toastr;

class CommentController extends Controller
{
    public function store(Request $request, $post){
        // dd($request);
        $this->validate($request,['comment'=> 'required|max:1000']);

        $comment = new Comment();
        $comment->post_id = $post;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();

        // Toastr::success('success','Comment created successfully!');
        return redirect()->back(); 
    }
}
