@extends('layouts.dashboard.app')

@section('title','post')

@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">post </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="{{route('admindashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><strong>comments</strong></li>
    </ol>
</div>
@endsection


@section('content')


<div class="container-fluid">
    <div class="col-lg-12 mt-5 mt-100px">
        <div class="card-box">
            <h4 class="m-t-0 header-title">All Post Comments</h4>

            <table class="table table-bordered">
                <thead>
                <tr class="bg-dark text-white">
                    <th>Comments Info</th>
                    <th>Post Info</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                   @foreach ($comments as $comment)
                      <tr>
                        <td>
                           <div class="row">
                            <div class="col-xl-4"><img width="100" src="{{Auth::user()->profile_photo == 'default.png' ? asset('dashboard/assets/images/users/avatar-1.jpg '): Storage::disk('public')->url('profile_photos/'. Auth::user()->profile_photo)}}" alt=""></div>
                            <div class="col-xl-7">
                                <h3>{{$comment->name}}  <small>{{$comment->created_at->diffForHumans()}}</small></h3>
                                <p>{{$comment->message}}</p>
                                {{-- <a href="">Reply</a> --}}
                            </div>
                           </div>

                        </td>
                        <td>
                           <div class="row">
                            <div class="col-xl-4"><img width="200" src="{{Storage::disk('public')->url('post/'. $comment->post->image)}}" alt=""></div>
                            <div class="col-xl-7">
                                <h3>{{Str::limit($comment->post->title, 20)}}</h3>
                                 <p>by <Strong>{{$comment->post->user->name}}</Strong></p>
                            </div>
                           </div>
                        </td>
                        <td class="text-center">
                            <button class="Delete_post btn btn-danger" onclick="commentDelete({{$comment->id}})">Delete</button>

                            <form id="delete-form-{{$comment->id}}" style="display: none" action="{{route('adminpost.comment.delete',$comment->id)}}" method="POST" >
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
     function commentDelete(id) {
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
