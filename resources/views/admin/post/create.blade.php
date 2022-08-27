@extends('layouts.dashboard.app')

@section('title','post')
@push('css')
<link href="{{asset('dashboard/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
<link href="{{asset('dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endpush

@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">post </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{route('admindashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">post</li>
    </ol>
</div>
@endsection


@section('content')
<form action="{{route('adminpost.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mt-5 mt-100px " >
        <div class="col-md-7">
            <div class="card-box">

                    <div class="form-group">
                        <label for="exampleInputEmail1">post Title</label>
                        <input type="text" class="form-control"  placeholder="Enter post" name="post_title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">post Image</label>
                        <input type="file" class="form-control"name="post_image">
                    </div>
                    <div class="form-group">
                        <input id="check" type="checkbox" name="status" value="1">
                        <label for="check">publish</label>
                    </div>

            </div>
        </div>
        <div class="col-md-5">
            <div class="card-box">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <select class="select2 form-control select2-multiple" name="category[]" multiple="multiple" multiple data-placeholder="Choose ...">
                            @foreach (categories() as $category)
                            <option value="{{$category->id}}">{{$category->Category_Name}}</option>
                            @endforeach
                         </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tag</label>
                        <select class="select2 form-control select2-multiple" name="tag[]" multiple="multiple" multiple data-placeholder="Choose ...">
                            @foreach (Tags() as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                         </select>
                    </div>
                    <a href="{{route('admincategory.index')}}"  class="btn btn-danger">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    <div class="row mt-5 " >
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="m-t-0 m-b-30 header-title">Body</h4>
                <div class="form-group">
                    <textarea id="summernote" style="width: 100%;"  rows="10" cols="500" name="body"></textarea>
                </div>
            </div>
        </div>
    </div>

</form>
  @endsection
  @push('js')
  <script src="{{asset('dashboard/plugins/summernote/summernote-bs4.min.js')}}"></script>


  <script src="{{asset('dashboard/plugins/select2/js/select2.min.js')}}" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
    $('#summernote').summernote();

    });
    $(document).ready(function() {
        $('.select2').select2();

    });
  </script>

  @endpush
