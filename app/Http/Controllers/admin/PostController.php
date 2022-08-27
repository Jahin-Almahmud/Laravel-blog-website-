<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('admin.post.index');
    }

    public function pendingPost()
    {
        return  view('admin.post.pendingpost');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required',
            'category' => 'required',
            'tag' => 'required',
        ]);
        if (isset($request->post_image)) {
            $image = $request->post_image;
            $slug = Str::slug($request->post_title);
            if (isset($image)) {
                $imageName = $slug."-".uniqid().".".$image->getClientOriginalExtension();

                // check category dir exists
                if (!Storage::disk('public')->exists(path:'post')) {
                    Storage::disk('public')->makeDirectory(path:'post');
                }

                $link = base_path('storage/app/public/post/'.$imageName);
                Image::make($image)->resize(600,328)->save($link);
                // Storage::disk('storage')->put('category/'.$imageName,$category);
                // check post/singlepost dir exists
                if (!Storage::disk('public')->exists('post/single_post')) {
                    Storage::disk('public')->makeDirectory('post/single_post');
                }

                $link = base_path('public/storage/post/single_post/'.$imageName);
                 Image::make($image)->resize(770,520)->save($link);
                // Storage::disk('storage')->put('category/'.$imageName,$category);
            }
        }else {
            $imageName = 'default.png';
        }

        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $request->post_title;
        $post->slug = Str::slug($request->post_title , uniqid(5));
        $post->image = $imageName;
        $post->body = $request->body;
        if (isset($request->status)) {
            $post->status = 1;
        }else {
            $post->status = 0;
        }
        $post->is_approved =1;
        $post->created_at =Carbon::now();
        $post->save();
        $post->categories()->attach($request->category);
        $post->tags()->attach($request->tag);

        Toastr::success('post cteated successfully','success');
        return redirect()->route('adminpost.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
       return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        if (isset($request->post_image)) {
            $image = $request->post_image;
            $slug = Str::slug($request->post_title);
            if (isset($image)) {
                if (Storage::disk('public')->exists('post/',$post->image)) {
                    Storage::disk('public')->delete('post/',$post->image);
                }

                $imageName = $slug."-".uniqid().".".$image->getClientOriginalExtension();
                // check post dir exists
                if (!Storage::disk('public')->exists(path:'post')) {
                    Storage::disk('public')->makeDirectory(path:'post');
                }

                $link = base_path('storage/app/public/post/'.$imageName);
                $category = Image::make($image)->resize(600,328)->save($link);
                // Storage::disk('storage')->put('category/'.$imageName,$category);

                // check post/singlepost dir exists
                if (!Storage::disk('public')->exists('post/single_post')) {
                    Storage::disk('public')->makeDirectory('post/single_post');
                }

                $link = base_path('storage/app/public/post/single_post/'.$imageName);
                $category = Image::make($image)->resize(770,520)->save($link);
                // Storage::disk('storage')->put('category/'.$imageName,$category);

            }
        }else {
            $imageName = $post->image;
        }

        $post->title = $request->post_title;
        $post->slug = Str::slug($request->post_title);
        $post->image = $imageName;
        $post->body = $request->body;
        if (isset($request->status)) {
            $post->status = 1;
        }else {
            $post->status = 0;
        }
        $post->is_approved =1;
        $post->created_at =Carbon::now();
        $post->save();
        $post->categories()->attach($request->category);
        $post->tags()->attach($request->tag);

        Toastr::success('post updated successfully','success');
        return redirect()->route('adminpost.index');
    }
    public function approve($id){
         $post = Post::find($id);

        if ($post->is_approved == 0) {

            $post->update([
                'is_approved' => 1,
            ]);

            Toastr::success('post successfully approved :)', 'success');
        }
        else{
            Toastr::success('This post is already approved :)', 'info');

        }
        return  redirect()->back();
   }
   public function status($id){
    $post = Post::find($id);

    if ($post->status == 0) {

        $post->update([
            'status' => 1,
        ]);

        Toastr::success('published');
    }

    return  redirect()->back();

   }
   public function postHide($id){
    $post = Post::find($id);

    if ($post->status == 1) {

        $post->update([
            'status' => 0,
        ]);

        Toastr::success('unpublished:)');
    }

    return  redirect()->back();


   }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

           // delete post/singlepost dir exists
           if (Storage::disk('public')->exists('post/'.$post->image)) {
            Storage::disk('public')->delete('post/'.$post->image);
            }
            if (Storage::disk('public')->exists('post/single_post/'.$post->image)) {
                Storage::disk('public')->delete('post/single_post/'.$post->image);
            }

        $post->delete();
        return back();
    }
}
