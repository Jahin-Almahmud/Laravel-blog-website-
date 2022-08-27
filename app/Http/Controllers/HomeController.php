<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

         $logo = DB::select('select * from logo');

        return view('frontend.home', compact('logo'));
    }
}
