@extends('layouts.dashboard.app')

@section('title','Category')

@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Category </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="{{route('admindashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><strong>Category</strong></li>
    </ol>
</div>
@endsection


@section('content')


<div class="container-fluid">
    <div class="col-lg-12 mt-5 mt-100px">

            <a href="{{route('admincategory.create')}}" class="btn btn-danger mb-2"> <span class="p-2">+</span> Add New Category</a>
        <div class="card-box">
            <h4 class="m-t-0 header-title">All category <span class="badge bg-success">{{categories()->count()}}</span></h4>

            <table class="table table-bordered">
                <thead>
                <tr class="bg-dark text-white">
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Category Image</th>
                    <th>post count</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach (categories() as $key=>$Category)
                   <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$Category->Category_Name}}</td>
                    <td>
                        <img width="100" src="{{asset('storage/category')}}/{{$Category->image}}" alt="Not found">
                    </td>
                    <td>{{$Category->posts->count()}}</td>
                    <td class="text-center">
                        <a href="{{route('admincategory.edit',$Category->id)}}" class="btn btn-primary">Edit</a>
                        <button class="Delete_post btn btn-danger" onclick="deletecategory({{$Category->id}})">Delete</button>
                        <form id="delete-form-{{$Category->id}}" style="display: none" action="{{route('admincategory.destroy',$Category->id)}}" method="POST" >
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
     function deletecategory(id) {
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

