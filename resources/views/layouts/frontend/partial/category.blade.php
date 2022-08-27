
    <!-- Banner Area Start -->
    <div class="banner-area pt-100px mt-5 pb-100px plr-15px">
        <div class="row m-0">
            @forelse (categories() as $category)


            <div class="col-12 col-lg-4 mb-md-30px mb-lm-30px">
                <div class="single-banner-2 mb-2"  style="border: 1px solid gainsboro;">
                    <a href="{{route('post.category', $category->slug)}}">
                    <img  src="{{Storage::disk('public')->url('category/'. $category->image)}}" alt="">
                    </a>
                    <div class="item-disc">
                        <a href="{{route('post.category', $category->slug)}}"  class="shop-link btn btn-primary ">{{$category->Category_Name}} </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-xl-5 m-auto">
               <div class="card">
                   <div class="card-body text-center text-danger">No found category :)</div>
                </div>
            </div>

           @endforelse
        </div>
    </div>
    <!-- Banner Area End -->
