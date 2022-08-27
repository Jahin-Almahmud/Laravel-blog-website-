<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tag.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
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
            'tag_name'=> 'required|regex:/^[\pL\s\-]+$/u|',
        ]);

        $tag = new Tag();
        $tag->name = $request->tag_name;
        $tag->slug = str::lower($request->tag_name);
        $tag->created_at = Carbon::now();
        $tag->save();
        Toastr::success('Tag created successfully', 'wor');
        return redirect()->route('admintag.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $tag = Tag::where('slug',$slug)->first();
        return view('admin.tag.edit' , compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'tag_name'=> 'required',
        ]);
        $tag = Tag::where('slug',$slug)->first();
        $tag->name = $request->tag_name;
        $tag->slug = str::lower($request->tag_name) ;
        $tag->save();
        Toastr::success('Tag updated successfully', 'success');
        return redirect()->route('admintag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();
        return back();

    }
}
