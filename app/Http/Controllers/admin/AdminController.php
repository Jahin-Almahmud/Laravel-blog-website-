<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {

         $popular_posts = Post::withcount('comments')
                            ->withcount('favorite_to_user')
                            ->orderBy('view_count','desc')
                            ->orderBy('comments_count','desc')
                            ->orderBy('favorite_to_user_count','desc')
                            ->take(5)->get();
        $new_authors_today = User::where('role',2)
                                ->whereDate('created_at',Carbon::today())->count();
        $active_users = User::where('role',2)
                            ->withcount('posts')
                            ->withcount('comments')
                            ->orderBy('posts_count','desc')
                            ->orderBy('comments_count','desc')->take(5)->get() ;

         $pending_posts = Post::where('is_approved',0)->count();
        return view('admin.home',compact('popular_posts','new_authors_today','pending_posts','active_users'));
    }
    public function setting()
    {
        return view('admin.setting');
    }
    public function changepassword (Request $request)
    {
        $request->validate([
            'old_password'=> 'required',
            'new_password'=> 'required|min:6',
            'confirm_password'=> 'required|same:new_password',
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            $user_id = Auth::user()->id;
            User::find($user_id)->update([
                'password' => Hash::make($request->new_password),
            ]);

        }
        else {
            Toastr::error('Old password does not match');
            return back()->with('active1', 'activate');
        }
        Toastr::success('password changed successfully');
        return back()->with('active1', 'activate');
    }
    public function changephoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required',
            'name' => 'required',
        ]);
        $name = $request->name;
        $profile_photo =  $request->profile_photo;

        if(isset($name)){
          User::find(Auth::user()->id)->update([
            'name'=> $request->name,
          ]);
        }
        if(isset($profile_photo)){
            $image_name = Auth::user()->name ."-". uniqid(2) .".". $profile_photo->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('profile_photos')){
                Storage::disk('public')->makeDirectory('profile_photos');
            }

            if(Storage::disk('public')->exists('profile_photos/'. Auth::user()->profile_photo)){
                Storage::disk('public')->delete('profile_photos/'. Auth::user()->profile_photo);
            }
            $link = base_path('storage/app/public/profile_photos/'.$image_name);
            Image::make($profile_photo)->resize(128,128)->save($link);

            User::find(Auth::user()->id)->update([
                'profile_photo'=> $image_name,
                 'updated_at' => Carbon::now(),
              ]);
        }
        Toastr::success('Updated Successfully');
        return back();
    }
}
