@extends('layouts.dashboard.app')

@section('title','Edit--Tag')

@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Tag </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{route('admindashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('admintag.index')}}">Tag</a></li>
        <li class="breadcrumb-item active"><strong>{{$tag->name}}</strong></li>
    </ol>
</div>
@endsection


@section('content')
  <div class="row mt-5 mt-100px" >
    <div class="col-md-12  m-auto">
        <div class="card-box">
            <h4 class="m-t-0 m-b-30 header-title">Update Tag</h4>

            <form action="{{route('admintag.update',$tag->slug)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputEmail1">Tag Name</label>
                    <input type="text" value="{{$tag->name}}" class="form-control"  placeholder="Enter tag" name="tag_name">
                </div>
                <a href="{{route('admintag.index')}}"  class="btn btn-danger">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
  </div>
@endsection
