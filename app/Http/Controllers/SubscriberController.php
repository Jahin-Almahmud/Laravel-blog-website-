<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store (Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers'
        ]);
        Subscriber::insert([
            'email' => $request->email,
            'created_at' => Carbon::now(),
        ]);

        Toastr::success('Successfull');
        return back();

    }
}
