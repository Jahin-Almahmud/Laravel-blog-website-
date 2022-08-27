<?php

namespace App\Http\Controllers\author;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(){
         $posts = Auth::user()->posts;
        return view('author.post.comment',compact('posts'));
    }

}
