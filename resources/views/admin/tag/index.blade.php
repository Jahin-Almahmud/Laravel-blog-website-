@extends('layouts.dashboard.app')

@section('title','Tag')

@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Tag </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{route('admindashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><strong>Tag</strong></li>
    </ol>
</div>
@endsection


@section('content')


<div class="container-fluid">
    <div class="col-lg-12 mt-5 mt-100px">

            <a href="{{route('admintag.create')}}" class="btn btn-danger mb-2"> <span class="p-2">+</span> Add New tag</a>
        <div class="card-box">
            <h4 class="m-t-0 header-title">All Tag</h4>

            <table class="table table-bordered">
                <thead>
                <tr class="bg-dark text-white">
                    <th>#</th>
                    <th>Tag Name</th>
                    <th>crated_at</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach (Tags() as $key=>$tag)
                   <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{!!$tag->name!!}</td>
                    <td>{{$tag->created_at}}</td>
                    <td class="text-center">
                        <a href="{{route('admintag.edit',$tag->slug)}}" class="btn btn-primary">Edit</a>
                        <button class="Delete_post btn btn-danger" onclick="deletetag({{$tag->id}})">Delete</button>
                        <form id="delete-form-{{$tag->id}}" style="display: none" action="{{route('admintag.destroy',$tag->id)}}" method="POST" >
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
     function deletetag(id) {
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

