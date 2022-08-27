@extends('layouts.dashboard.app')

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 ">
                <div class="card-box">
                    <h4 class="header-title mb-4 text-center"> Overview</h4>

                    <div class="row">
                        <div class="col-sm-6 col-lg-6 col-xl-3 border">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                           data-fgColor="#0acf97" value="{{$posts->count()}}" data-skin="tron" data-angleOffset="180"
                                           data-readOnly=true data-thickness=".1"/>
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Total Posts</p>
                                    <h3 class="">{{$posts->count()}}</h3>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6 col-xl-3 border" >
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                           data-fgColor="#f9bc0b" value="{{$popular_posts->count()}}" data-skin="tron" data-angleOffset="180"
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
                                           data-fgColor="#f1556c" value="{{$pending_posts->count()}}" data-skin="tron" data-angleOffset="180"
                                           data-readOnly=true data-thickness=".1"/>
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Pending posts</p>
                                    <h3 class="">{{$pending_posts->count()}}</h3>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6 col-xl-3 border">
                            <div class="card-box mb-0 widget-chart-two">
                                <div class="float-right">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-linecap=round
                                           data-fgColor="#2d7bf4" value="{{$total_view}}" data-skin="tron" data-angleOffset="180"
                                           data-readOnly=true data-thickness=".1"/>
                                </div>
                                <div class="widget-chart-two-content">
                                    <p class="text-muted mb-0 mt-2">Total view</p>
                                    <h3 class="">{{$total_view}}</h3>
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
            <div class="col-xl-12">
                <div class="card-box">
                    <h4 class="header-title">Top 5 favorite posts</h4>

                    <table class="table ">
                        <thead class="table-dark">
                        <tr>
                            <th>Rank lisk</th>
                            <th>Post tittle</th>
                            <th>comment</th>
                            <th>favorite</th>
                            <th>status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($pending_posts as $key=>$post)
                            <tr>
                                <th scope="row">{{$key +1}}</th>
                                <td>{{Str::limit($post->title, 20)}}</td>
                                <td>{{$post->comments->count()}}</td>
                                <td>{{$post->favorite_to_user->count()}}</td>
                                <td>
                                    @if ($post->status == 1)
                                        <span class="badge badge-success">Approved</span>
                                        @else
                                        <span class="badge badge-danger">Pending</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- end row -->







    </div> <!-- container -->

</div>
@endsection
