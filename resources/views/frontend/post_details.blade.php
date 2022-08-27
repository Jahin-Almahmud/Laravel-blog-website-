@extends('layouts.frontend.app')
@section('title', '- post-details')
@push('css')

@endpush
@section('content')

    <!-- Header Area Start -->
    @include('layouts.frontend.partial.header')
    <!-- Header Area End -->
        <!-- Blog Area Start -->
        <div class="blog-grid pb-100px pt-100px main-blog-page single-blog-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 offset-lg-2">
                        <div class="blog-posts">
                            <div class="single-blog-post blog-grid-post">
                                <div class="blog-image single-blog" data-aos="fade-up" data-aos-delay="200">
                                    <img class="img-fluid h-auto" src="{{Storage::disk('public')->url('post/single_post/'. $post->image)}}" alt="blog" />
                                </div>
                                <div class="blog-post-content-inner mt-30px" data-aos="fade-up" data-aos-delay="400">
                                    <div class="blog-athor-date">
                                        <a class="blog-date height-shape" href="javascript:void(0)"><i class="fa fa-calendar"
                                                aria-hidden="true"></i> {{$post->created_at->toFormattedDateString()}}</a>
                                                <a class="blog-date height-shape" href="javascript:void(0)"><i class="fa fa-eye"
                                                    aria-hidden="true"></i> {{$post->view_count}}</a>
                                                @guest

                                                <a class="blog-mosion" href="{{route('post.favorite',$post->id)}}"><i class="fa fa-heart-o" aria-hidden="true"></i> {{$post->favorite_to_user->count()}}</a>
                                                @else
                                                <a class="blog-mosion" href="{{route('post.favorite',$post->id)}}"><i class="fa {{Auth::user()->favorite_posts()->where('post_id', $post->id)->count() == 0 ? 'fa-heart-o': 'fa-heart'}}" aria-hidden="true"></i> {{$post->favorite_to_user->count()}}</a>
                                                @endguest
                                    </div>
                                    <h4 class="blog-title">{{$post->title}}</h4>
                                    <p data-aos="fade-up">
                                        {!!$post->body!!}
                                    </p>
                                </div>

                            </div>
                            <!-- single blog post -->
                        </div>
                        <div class="blog-single-tags-share d-sm-flex justify-content-between">
                            <div class="blog-single-share mb-xs-15px d-flex" data-aos="fade-up" data-aos-delay="200">
                                <ul class="social">
                                    <li class="m-0">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google"></i></a>
                                    </li>
                                </ul>
                                <span class="title"><a class="ml-10px" href="#"> {{$post->comments->count()}} <i class="fa fa-comments m-0"></i></a></span>
                            </div>
                            <div class="blog-single-tags d-flex" data-aos="fade-up" data-aos-delay="200">
                                <span class="title">Tags: </span>
                                <ul class="tag-list">
                                    @foreach ($post->tags as $tag)
                                    <li><a href="{{route('post.tag', $tag->slug)}}">{{$tag->name}}</a></li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>


                        <div class="comment-area">
                            <h2 class="comment-heading" data-aos="fade-up" data-aos-delay="200">Comments ({{$post->comments->count()}})</h2>
                            <div class="review-wrapper">
                            @foreach ($post->comments as $comment)
                                <div class="single-review" data-aos="fade-up" data-aos-delay="200">
                                    <div class="review-img">
                                        <img class="rounded" src="{{Auth::user()->profile_photo == 'default.png' ? asset('dashboard/assets/images/users/avatar-1.jpg '): Storage::disk('public')->url('profile_photos/'. Auth::user()->profile_photo)}}" alt="" />
                                    </div>
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-left">
                                                    <div class="review-name">
                                                        <h4 class="title"> {{$comment->name}}</h4>
                                                        <span class="date">{{$comment->created_at}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-bottom">
                                                <p>
                                                    {{$comment->message}}
                                                </p>
                                                {{-- <div class="review-left">
                                                    <a href="#">Reply <i class="fa fa-arrow-right"></i></a>
                                                </div> --}}
                                            </div>
                                        </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div id="comment" class="blog-comment-form">
                            <h2 class="comment-heading" data-aos="fade-up" data-aos-delay="200">Leave a Comment</h2>
                            <div class="row">
                                <form action="{{route('post.comment.store', $post->id)}}" method="POST">
                                    @csrf
                                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                        <div class="single-form mb-lm-15px">
                                            <input type="text" placeholder="Name *" name="name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                        <div class="single-form mb-lm-15px">
                                            <input type="email" placeholder="Email *" name="email" />
                                        </div>
                                    </div>

                                    <div class="col-md-12" data-aos="fade-up" data-aos-delay="200">
                                        <div class="single-form">
                                            <textarea placeholder="Message" name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12" data-aos="fade-up" data-aos-delay="200">
                                        <button class="btn btn-primary btn-hover-dark border-0 mt-30px" type="submit">Post Comment
                                            <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Blag Area End -->



@endsection

