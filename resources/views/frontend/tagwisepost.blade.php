@extends('layouts.frontend.app')
@section('title', 'all blogs')
@section('content')
 @include('layouts.frontend.partial.header')


     <!-- breadcrumb-area start -->
     <div style="background-color: #FCF56C;" class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">{{$tag->name}}</h2>
                    <!-- breadcrumb-list start -->
                    {{-- <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ul> --}}
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- Blog Area Start -->
    <div class="blog-grid pb-100px pt-100px main-blog-page single-blog-page">
        <div class="container">
            <div class="row">
                @forelse ($tag->posts as $post)
                  @if ($post->status == 1)
                  <div class="col-lg-6 col-md-6 col-xl-4 mb-50px">
                    <div class="single-blog">
                        <div class="blog-image" style="border: 1px solid gainsboro;">
                            <a href="{{route('post.details',$post->slug)}}"><img src="{{Storage::disk('public')->url('post/'.$post->image)}}"
                                    class="img-responsive w-100" alt=""></a>
                        </div>
                        <div class="blog-text">
                            <div class="blog-athor-date">


                                @guest
                                <a class="blog-mosion" href="{{route('login')}}" onclick="loginfirst()"><i class="fa fa-heart-o" aria-hidden="true"></i> 0</a>
                                @else
                                <a class="blog-mosion" href="{{route('post.favorite',$post->id)}}"><i class="fa {{Auth::user()->favorite_posts()->where('post_id', $post->id)->count() == 0 ? 'fa-heart-o': 'fa-heart'}}" aria-hidden="true"></i> {{$post->favorite_to_user->count()}}</a>
                                @endguest
                                <a class="blog-mosion" href="{{route('post.details',$post->slug)}}"><i class="fa fa-commenting" aria-hidden="true"></i> {{$post->comments->count()}}</a>
                                    <a class="blog-date height-shape" href="#"><i class="fa fa-eye"
                                        aria-hidden="true"></i> {{$post->view_count}}</a>
                            </div>
                            <h5 class="blog-heading"><a class="blog-heading-link"
                                    href="{{route('post.details',$post->slug)}}">{{$post->title}}</a></h5>

                            {{-- <p>dfgsdfdfgdfgdf</p> --}}

                            <a href="{{route('post.details',$post->slug)}}" class="btn btn-primary blog-btn"> Read More<i class="fa fa-arrow-right ml-5px"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                  @endif
                @empty
                <div class="alert alert-danger">No found post! </div>
                @endforelse

            </div>

            {{-- <!--  Pagination Area Start -->
                <div class="pro-pagination-style text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="pages">
                    <ul>
                        <li class="li"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="li"><a class="page-link active" href="#">1</a></li>
                        <li class="li"><a class="page-link" href="#">2</a></li>
                        <li class="li"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--  Pagination Area End --> --}}
        </div>
    </div>
    <!-- Blag Area End -->
@endsection
