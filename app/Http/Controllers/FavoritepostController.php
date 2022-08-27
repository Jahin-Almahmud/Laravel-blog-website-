<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritepostController extends Controller
{
    public function add($id)
    {
        $user = Auth::user();
        $isfavorite = $user->favorite_posts()->where('post_id',$id)->count();
        if ($isfavorite == 0 ) {
            $user->favorite_posts()->attach($id);
            Toastr::success('successfully Added in your wishlist');
            return redirect()->back();
        } else {
            $user->favorite_posts()->detach($id);
            Toastr::info('successfully remove in your wishlist');
            return redirect()->back();
        }

    }
}
