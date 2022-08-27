@extends('layouts.dashboard.app')
@section('title','Dashboard')
@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Dashboard </h4>
</div>
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 ">
                <div class="card-box">
                    <h4 class="header-title text-center mb-4">Overview</h4>

                    <div class="row">
                        <div class="col-sm-6 col-lg-6 col-xl-3 border">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                           data-fgColor="#0acf97" value="{{categories()->count()}}" data-skin="tron" data-angleOffset="180"
                                           data-readOnly=true data-thickness=".1"/>
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Total catagories</p>
                                    <h3 class="">{{categories()->count()}}</h3>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6 col-xl-3 border">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                           data-fgColor="#f1556c" value="{{Tags()->count()}}" data-skin="tron" data-angleOffset="180"
                                           data-readOnly=true data-thickness=".1"/>
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Total Tags</p>
                                    <h3 class="">{{Tags()->count()}}</h3>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-3 border">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                           data-fgColor="#f9bc0b" value="{{$pending_posts}}%" data-skin="tron" data-angleOffset="180"
                                           data-readOnly=true data-thickness=".1"/>
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Pending Posts</p>
                                    <h3 class="">{{$pending_posts}}</h3>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-3 border">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                           data-fgColor="#f9bc0b" value="{{posts()->count()}}%" data-skin="tron" data-angleOffset="180"
                                           data-readOnly=true data-thickness=".1"/>
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Total Posts</p>
                                    <h3 class="">{{posts()->count()}}</h3>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-3 border">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                           data-fgColor="#f9bc0b" value="{{$popular_posts->count()}}%" data-skin="tron" data-angleOffset="180"
                                           data-readOnly=true data-thickness=".1"/>
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Popular posts</p>
                                    <h3 class="">{{$popular_posts->count()}}</h3>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-3 border">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                           data-fgColor="#2d7bf4" value="{{author()->count()}}" data-skin="tron" data-angleOffset="180"
                                           data-readOnly=true data-thickness=".1"/>
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Total Author</p>
                                    <h3 class="">{{author()->count()}}</h3>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
        <!-- end row -->



        <div class="row">
            <div class="col-lg-6">
                <div class="card-box">
                    <h4 class="header-title text-center">Top 5 popular posts</h4>

                    <div style="padding: 0" class="card-body">
                        <div class="col-xl-12">
                                <table class="table ">
                                    <thead class="table-dark">
                                    <tr>
                                        <th>Rank lisk</th>
                                        <th>Post title</th>
                                        <th>Author</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($popular_posts as $key=>$post)
                                        <tr>
                                            <th scope="row">{{$key +1}}</th>
                                            <td>{{Str::limit($post->title, 15)}}</td>
                                            <td>by <strong>{{$post->user->name}}</strong></td>
                                            <td><a class="btn btn-danger" href="{{route('post.details',$post->slug)}}"><i class="fa fa-eye"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-6">
                <div class="card-box">

                    <h4 class="header-title text-center">Top 5 active author</h4>

                    <div style="padding: 0" class="card-body">
                        <div class="col-xl-12">
                                <table class="table ">
                                    <thead class="table-dark">
                                    <tr>
                                        <th>Rank lisk</th>
                                        <th>User name</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($active_users as $key=>$user)
                                        <tr>
                                            <th scope="row">{{$key +1}}</th>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end row -->






    </div> <!-- container -->

</div>
@endsection
