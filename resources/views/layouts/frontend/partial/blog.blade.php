
<div id="" class=" blog-grid pb-100px mt-5  main-blog-page single-blog-page">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="section-title text-center mb-30px0px">
                <h2 class="title">#blog</h2>
                <p class="sub-title">Lorem ipsum dolor sit amet consectetur adipisicing eiusmod.
                </p>
            </div>
        </div>

        @forelse (Approveposts() as $post)
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
                            <a class="blog-mosion" href="{{route('post.favorite',$post->id)}}"><i class="fa fa-heart-o" aria-hidden="true"></i> {{$post->favorite_to_user->count()}}</a>
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
         <div class="col-xl-5 m-auto">
            <div class="card">
                <div class="card-body text-center text-danger">No found post :)</div>
             </div>
         </div>

        @endforelse

            <!-- End single blog -->
        </div>

        <!--  Pagination Area Start -->
        <div class="load-more-items text-center mb-md-60px mb-lm-60px mt-30px0px" data-aos="fade-up">
            <a href="{{route('post.index')}}" class="btn btn-lg btn-primary btn-hover-dark m-auto"> Load More <i class="fa fa-refresh ml-15px" aria-hidden="true"></i></a>
        </div>
        <!--  Pagination Area End -->
    </div>
</div>


