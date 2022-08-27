<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index ()
    {
       return view('admin.subscribe');
    }
    public function destroy ($id)
    {
        Subscriber::find($id)->delete();
        Toastr::success('Deleted Successfully');
        return back();
    }
}
