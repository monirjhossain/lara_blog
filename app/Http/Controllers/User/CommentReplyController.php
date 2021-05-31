<?php

namespace App\Http\Controllers\User;

use App\CommentReply;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentReplyController extends Controller
{
    public function index()
    {
        $reply_comments = CommentReply::where('user_id', Auth::id())->get();
        return view('admin.reply-comments.index', compact('reply_comments'));
    }
    public function destroy($id)
    {
        $reply_comment = CommentReply::findOrFail($id);
        if ($reply_comment->user_id == Auth::id()) {
            //delete replies with main Comment
            $replies = CommentReply::where('comment_id', $id)->delete();
            $reply_comment->delete();
            Toastr::success('Comment deleted successfully!');
            return redirect()->back();
        } else {
            Toastr::error('You can not delete this comment');
            return redirect()->back();
        }
    }
}
