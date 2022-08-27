<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'category_name'=> 'required|unique:categories',
            'Category_image'=>'image|mimes:jpeg,bmp,png,jpg'
        ]);

        $image = $request->Category_image;
        $slug = Str::slug($request->category_name);
        if (isset($image)) {
            $imageName = $slug."-".uniqid().".".$image->getClientOriginalExtension();

            // check category dir exists
            if (!Storage::disk('public')->exists(path:'category')) {
                Storage::disk('public')->makeDirectory(path:'category');
            }

            $link = base_path('storage/app/public/category/'.$imageName);
            $category = Image::make($image)->resize(600,328)->save($link);
            // Storage::disk('public')->put('category/'.$imageName,$category);

        }else {
            $imageName = 'default.png';
        }
        Category::insert([
            'Category_Name'=> $request->category_name,
            'slug'=> Str::slug($request->category_name),
            'image'=> $imageName,
            'created_at' => Carbon::now(),
        ]);

        Toastr::success('category created successfuly!','Success');
        return redirect()->route('admincategory.index');
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
    public function edit($id)
    {

        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $categoryimage = Category::find($id)->image;
        $slug= Str::slug($request->category_name);


        if (isset($request->category_image)) {



            if(Storage::disk('public')->exists('category/'.$categoryimage)) {
            Storage::disk('public')->delete('category/'.$categoryimage);
            }
            // check category dir exists
            if (!Storage::disk('public')->exists(path:'category')) {
            Storage::disk('public')->makeDirectory(path:'category');
            }

                $imageName = $slug."-".uniqid().".".$request->category_image->getClientOriginalExtension();
                $link = base_path('storage/app/public/category/'.$imageName);
                $categoryimage = Image::make($request->category_image)->resize(600,328)->save($link);
                Category::find($id)->update([
                    'image' => $imageName,
                    "updated_at" => Carbon::now(),
                ]);

        }

        if((isset($request->category_name))) {
            Category::find($id)->update([
                'Category_Name' => $request->category_name,
                'slug' => Str::slug($request->category_name),
                "updated_at" => Carbon::now(),
            ]);

        }

        Toastr::success('successfull');
        return redirect()->route('admincategory.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
      // check category dir exists
       if (Storage::disk('public')->exists('category/'.$category->image)) {
        Storage::disk('public')->delete('category/'.$category->image);
        }
        $category->delete();

        Toastr::success('Category Deleted Successfully!', 'wow');
        return redirect()->route('admincategory.index');
    }
}
