@extends('layouts.dashboard.app')

@section('title','post')

@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">post </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="{{route('admindashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">post</li>
    </ol>
</div>
@endsection


@section('content')


<div class="container-fluid">
    <div class="col-lg-12 mt-5 mt-100px">

            <a href="{{route('authorpost.create')}}" class="btn btn-danger mb-2"> <span class="p-2">+</span> Add New post</a>
        <div class="card-box">
            <h4 class="m-t-0 header-title">All Post</h4>

            <table class="table table-bordered">
                <thead>
                <tr class="bg-dark text-white">
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>view</th>
                    <th><i class="mdi mdi-eye-outline"></i></th>
                    <th>status</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach (AuthorPosts() as $key=>$post)
                   <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$post->title}}</td>
                    <td>
                        <img width="100" src="{{asset('storage/post')}}/{{$post->image}}" alt="Not found">
                    </td>
                    <td>{{$post->view_count}}</td>
                    <td>
                        @if ($post->is_approved == true)
                        <span class="badge bg-success p-2">Approved</span>
                        @else
                        <span class="badge bg-danger p-2">pending</span>
                        @endif
                    </td>
                    <td>
                        @if ($post->status == true)
                        <a href="{{route('authorpost.status.hide',$post->id)}}"><span style="font-size: 20px;" class="badge text-white bg-success p-2"><i class="mdi mdi-eye-outline"></i></span></a>
                        @else
                        <a href="{{route('authorpost.status.show',$post->id)}}"> <span style="font-size: 20px;" class="badge bg-danger p-2"><i class="text-white mdi mdi-eye-off-outline"></i></span></a>

                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{route('authorpost.show',$post->id)}}" class="btn btn-primary">show</a>
                        <a href="{{route('authorpost.edit',$post->id)}}" class="btn btn-primary">Edit</a>

                        <button class="Delete_post btn btn-danger" onclick="deletepost({{$post->id}})">Delete</button>

                        <form id="delete-form-{{$post->id}}" style="display: none" action="{{route('authorpost.destroy',$post->id)}}" method="POST" >
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                   </tr>

                   @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection

@push('js')
<script>
     function deletepost(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ml-2 mt-2',
                buttonsStyling: false
            }).then(function () {

        $('#delete-form-'+id).submit();
                swal({
                    title: 'Deleted !',
                    text: "Your file has been deleted",
                    type: 'success',
                    confirmButtonClass: 'btn btn-confirm mt-2'
                }
                )
            });

      }

</script>

@endpush
