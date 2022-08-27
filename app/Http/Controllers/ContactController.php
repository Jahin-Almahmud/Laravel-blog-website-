<?php

namespace App\Http\Controllers;

use App\Models\User_message;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }
    public function store(Request $request)
    {
        $request->validate([
            "*" => 'required',
        ]);
        User_message::insert([
            'name'=> $request->name,
            'email'=> $request->email,
            'message'=> $request->message,
            'created_at'=> Carbon::now(),
        ]);
        Toastr::success('Successfull');
        return back();

    }
}
