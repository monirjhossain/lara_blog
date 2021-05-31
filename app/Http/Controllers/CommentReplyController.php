<?php

namespace App\Http\Controllers;

use App\CommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentReplyController extends Controller
{
    public function store(Request $request, $comment)
    {
        // dd($request);
        $this->validate($request, ['message' => 'required|max:1000']);

        $commentReply = new CommentReply();
        $commentReply->comment_id = $comment;
        $commentReply->user_id = Auth::id();
        $commentReply->message = $request->message;
        $commentReply->save();

        // Toastr::success('success','Comment created successfully!');
        return redirect()->back();
    }
}
