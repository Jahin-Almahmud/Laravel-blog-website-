<?php

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Tag;
use App\Models\User;
use App\Models\User_message;

// all subscriber
 function subscribers()
 {
    return Subscriber::latest()->get();
 }
//  total Author
function author(){
    return User::where('role', 2)->get();
}
//  all Tag
 function Tags()
 {
    return Tag::latest()->get();

 }
//  all categories
 function categories(){
    return Category::latest()->get();
 }
//   all post
 function posts(){
    return Post::latest()->get();
 }
//  appreovepost
 function Approveposts(){
    return Post::where('is_approved',1)->latest()->limit(6)->get();
 }

 function Allposts(){
    return Post::where('is_approved',1)->simplePaginate(10);
 }
//  pendingpost
function pendingposts(){
    return Post::where('is_approved', false)->latest()->get();
 }
//  authopost
 function AuthorPosts(){
    return Post::where('user_id', auth()->id())->latest()->get();
 }

//  all messages
function messages()
{
    return User_message::latest()->get();
}
function latest_messages(){
    return User_message::latest()->take(10)->get();
}


?>
