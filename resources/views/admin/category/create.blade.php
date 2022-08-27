@extends('layouts.dashboard.app')

@section('title','Category')

@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Category </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{route('admindashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Category</li>
    </ol>
</div>
@endsection


@section('content')
  <div class="row mt-5 mt-100px " >
    <div class="col-md-8  m-auto">
        <div class="card-box">
            <h4 class="m-t-0 m-b-30 header-title">Add New Category</h4>

            <form action="{{route('admincategory.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control"  placeholder="Enter Category" name="category_name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Image</label>
                    <input type="file" class="form-control"name="Category_image">
                </div>
                <a href=""  class="btn btn-danger">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
  </div>
@endsection
