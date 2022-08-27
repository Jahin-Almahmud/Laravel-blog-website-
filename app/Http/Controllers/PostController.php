<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function details($slug)
    {
        $post = Post::where('slug',$slug)->firstorfail();
         $blog_key = 'blog_'. $post->id;
         if (!Session::has($blog_key)) {
            $post->increment('view_count');
            Session::put($blog_key,1);
         }
        return view('frontend.post_details',compact('post'));

    }
    public function index()
    {
        return view('frontend.posts');
    }
    public function categorywisepost($slug)
    {
        $category = Category::where('slug',$slug)->firstorfail();
        return view('frontend.categorywiseposts',compact('category'));
    }
    public function tagwisepost($slug)
    {
        $tag = Tag::where('slug',$slug)->firstorfail();
        return view('frontend.tagwisepost',compact('tag'));
    }
}
