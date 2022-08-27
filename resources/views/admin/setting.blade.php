@extends('layouts.dashboard.app')

@section('title','Settngs')

@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Tag </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{route('admindashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><strong>Settings</strong></li>
    </ol>
</div>
@endsection


@section('content')

<div class="container-fluid">
    <div class="col-md-12 mt-5 mt-100px">
        <div class="card-box">
           <ul class="nav nav-tabs tabs-bordered">
                <li class="nav-item">
                    <a href="#messages-b1" data-toggle="tab" aria-expanded="false" class="nav-link active ">
                        <i class="fi-mail mr-2"></i> Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile-b2" data-toggle="tab" aria-expanded="true" class="nav-link ">
                        <i class="fi-head mr-2"></i>Password
                    </a>
                </li>



            </ul>
            <div class="tab-content">
                <div class="tab-pane active " id="messages-b1">
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <div class="card-box border  border-info">
                                <h4 class="m-t-0 m-b-30 header-title text-center">Change profile photo</h4>

                                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('adminchange.profle.photo')}}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-3 col-form-label">Name</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" placeholder="{{Auth::user()->name}}" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-3 col-form-label">Profile Photos</label>
                                        <div class="col-9">
                                            <input type="file" class="form-control" name="profile_photo">
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 justify-content-end row">
                                        <div class="col-9">
                                            <button type="submit" class="btn btn-info waves-effect waves-light">update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                     </div>
                </div>
                <div class="tab-pane  " id="profile-b2">
                     <div class="row">
                        <div class="col-md-8 m-auto">
                            <div class="card-box border  border-info">
                                <h4 class="m-t-0 m-b-30 header-title text-center">Change password</h4>

                                <form class="form-horizontal" method="POST" action="{{route('adminchange.password')}}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-3 col-form-label">Old Password</label>
                                        <div class="col-9">
                                            <input type="password" class="form-control" name="old_password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-3 col-form-label">New Password</label>
                                        <div class="col-9">
                                            <input type="password" class="form-control" name="new_password" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-3 col-form-label">Confirm Password</label>
                                        <div class="col-9">
                                            <input type="password" class="form-control" name="confirm_password" >
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 justify-content-end row">
                                        <div class="col-9">
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Change</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                     </div>
                </div>



            </div>
        </div>
    </div>

</div>
@endsection


