@extends('layouts.dashboard.app')

@section('title','messages')

@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">messages </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{route('admindashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><strong>messages</strong></li>
    </ol>
</div>
@endsection


@section('content')


<div class="container-fluid">
    <div class="col-lg-12 mt-5 mt-100px">
        <div class="card-box">
            <h4 class="m-t-0 header-title">All messages</h4>

            <table class="table table-bordered">
                <thead>
                <tr class="bg-dark text-white">
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                   @foreach (messages() as $key=>$message)
                   <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$message->name}}</td>
                    <td>by{{$message->email}}</td>
                    <td><strong>{{$message->message}}</strong></td>
                    <td>
                        <button class="Delete_post btn btn-danger" onclick="deletemessages({{$message->id}})">Delete</button>

                        <form id="delete-form-{{$message->id}}" style="display: none" action="{{route('adminmessage.delete', $message->id)}}" method="POST" >
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
     function deletemessages(id) {
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

