@extends('layouts.dashboard.app')

@section('title','post')
@push('css')

@endpush

@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">post </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="{{route('admindashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('authorpost.index')}}">post</a></li>
        <li class="breadcrumb-item active"><a href=""><strong>{{Str::limit($post->title,10)}}</strong></a></li>
    </ol>
</div>
@endsection


@section('content')


<div class="container-fluid">
   <div class="row">
        <div class="col-xl-12 clearfix mt-100px">
            <a href="{{route('adminpost.index')}}" class="btn btn-danger">Back</a>

        </div>
  </div>
    <br>
    <br>
    <div class="row">
        <div class="col-lg-7 ">
            <div class="card   m-b-30">
                <div class=" bg-white card-header">
                    <h4>
                        {{$post->title}} <br>

                        <small>Posted By <strong><a href="">{{$post->user->name}}</a></strong> on {{$post->created_at->toFormattedDateString()}}</small>
                    </h4>
                </div>
                <div class="card-body">
                    {!! $post->body !!}
                </div>
            </div>

        </div>
        <div class="col-lg-5 ">
            <div class="card  m-b-30">
                <div class="card-header bg-success">
                    <h3 class="text-white">Category</h3>
                </div>
                <div class="card-body">
                    @foreach ($post->categories as $category)
                    <span class="p-2 f-s  text-white  badge bg-success">{{$category->Category_Name}}</span>
                    @endforeach
                </div>
            </div>
            <div class="card  m-b-30">
                <div class="card-header bg-success">
                    <h3 class="text-white">Tag</h3>
                </div>
                <div class="card-body">
                    @foreach ($post->tags as $tag)
                    <span class="p-2 f-s  text-white  badge bg-primary">{{$tag->name}}</span>
                    @endforeach
                </div>
            </div>
            <div class="card  m-b-30">
                <div class="card-header bg-success">
                    <h3 class="text-white">Image</h3>
                </div>
                <div class="card-body">
                    <img width="100%" src="{{Storage::disk('public')->url('post/'. $post->image)}}" alt="">
                </div>
            </div>

        </div>
   </div>
   {{-- <div class="row"></div> --}}
</div>
@endsection
