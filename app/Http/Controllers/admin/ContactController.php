<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User_message;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function message()
    {
        return view('admin.message');
    }
    public function delete($id)
    {
        User_message::find($id)->delete();
        Toastr::success('Successfull');
        return back();
    }
}
