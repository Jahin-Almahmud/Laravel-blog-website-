<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request , $id)
    {
        $slug = Post::Find($id)->slug;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        $commentStore = new Comment();
        $commentStore->post_id = $id;
        $commentStore->user_id = Auth::user()->id;
        $commentStore->name = $request->name;
        $commentStore->message = $request->message;
        $commentStore->email = $request->email;
        $commentStore->save();
        Toastr::success('Successfull!','success');
        return back();
    }
}
