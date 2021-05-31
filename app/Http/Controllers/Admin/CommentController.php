<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\CommentReply;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }
    public function destroy($id){
        $comments = Comment::findOrFail($id);
        //delete all replies with main comment
        $replies = CommentReply::where('comment_id', $id)->delete();
        $comments->delete();
        Toastr::success('Comment deleted successfully!');
        return redirect()->back();
    }
}
