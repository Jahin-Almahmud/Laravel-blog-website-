<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment()
    {
        $comments = Comment::latest()->get();
        return view('admin.post.comment',compact('comments'));
    }
    public function delete($id)
    {
        $comment = Comment::findorfail($id);
        $comment->delete();
        Toastr::success('Comment Deleted successfully!', 'success');
        return back();
    }
}
