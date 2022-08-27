@extends('layouts.dashboard.app')

@section('title','subscriber')

@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">subscriber </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="{{route('admindashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><strong>subscribers</strong></li>
    </ol>
</div>
@endsection


@section('content')


<div class="container-fluid">
    <div class="col-lg-12 mt-5 mt-100px">


        <div class="card-box">
            <h4 class="m-t-0 header-title">All Subscribers</h4>

            <table class="table table-bordered">
                <thead>
                <tr class="bg-dark text-white">
                    <th>#</th>
                    <th>Subscriber Email</th>
                    <th>Created at</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach (subscribers() as $key=>$subscriber)
                   <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$subscriber->email}}</td>
                    <td>{{$subscriber->created_at->toFormattedDateString()}}</td>
                    <td class="text-center">
                        <button class="Delete_subscriber btn btn-danger" onclick="deletesubscriber({{$subscriber->id}})">Delete</button>
                        <form id="delete-form-{{$subscriber->id}}" style="display: none" action="{{route('adminsubscriber.destroy',$subscriber->id)}}" method="post" >
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
     function deletesubscriber(id) {
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
