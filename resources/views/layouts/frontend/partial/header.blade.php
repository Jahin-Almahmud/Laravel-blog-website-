    <!-- Top Bar -->
    <!-- Header Area Start -->
    <header>
        <div style="box-shadow: 2px 4px 8px rgb(51 51 51 / 25%);background-color: #fff;" class="header-main sticky-nav ">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-auto align-self-center">
                        <div class="header-logo">
                            <a class="text-danger text-uppercase" href="{{route('home')}}">{{config('app.name')}}</a>
                        </div>
                    </div>
                    <div class="col align-self-center d-none d-lg-block">
                        <div class="main-menu">
                            <ul>
                                <li class=""><a href="{{route('home')}}">Home</a></li>
                                <li class="{{Request::is('post/blog') ? 'active' : ''}}"><a href="{{route('post.index')}}">Posts </a></li>
                                <li class="{{Request::is('contact/index') ? 'active' : ''}}"><a href="{{route('contact.index')}}">Contact us</a></li>
                                <li>
                                     @auth
                                     @if (Auth::user()->role == 1)
                                     <a href="{{route('admindashboard')}}">Dashboard</a>
                                     @else
                                     <a href="{{route('authordashboard')}}">Dashboard</a>
                                    @endif
                                     @endauth

                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Header Action Start -->
                    <div class="col col-lg-auto align-self-center pl-0">
                        <div class="header-actions">
                            @guest
                            <a href="{{route('login')}}" class="header-action-btn login-btn" >Sign In</a>
                                @else
                                @if (Auth::user()->role == 1)
                                <a href="{{route('admindashboard')}}" class="header-action-btn login-btn">{{Auth::user()->name}}</a>
                                @else
                                <a href="{{route('authordashboard')}}" class="header-action-btn login-btn">{{Auth::user()->name}}</a>
                                @endif
                            @endguest
                            <!-- Single Wedge Start -->
                            <a href="#" class="header-action-btn" data-bs-toggle="modal" data-bs-target="#searchActive">
                                <i class="pe-7s-search"></i>
                            </a>
                            <!-- Single Wedge End -->
                            <!-- Single Wedge Start -->
                            <a href="#offcanvas-wishlist" class="header-action-btn offcanvas-toggle">
                                <i class="pe-7s-like"></i>
                            </a>

                            <a href="#offcanvas-mobile-menu"
                                class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                <i class="pe-7s-menu"></i>
                            </a>
                        </div>
                        <!-- Header Action End -->
                    </div>
                </div>
            </div>
    </header>

    <!-- Header Area End -->
        <!-- OffCanvas Menu Start -->
        <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
            <button class="offcanvas-close"></button>

            <div class="inner customScroll">

                <div class="offcanvas-menu mb-4">
                    <ul>
                        <li class="dropdown "><a href="{{route('home')}}">Home</a></li>
                        <li class="dropdown "><a href="{{route('post.index')}}">Posts </a></li>
                        <li class=""><a href="{{route('contact.index')}}">Contact us</a></li>
                        <li>
                             @auth
                             @if (Auth::user()->role == 1)
                             <a href="{{route('admindashboard')}}">Dashboard</a>
                             @else
                             <a href="{{route('authordashboard')}}">Dashboard</a>
                            @endif
                             @endauth

                        </li>
                    </ul>
                </div>
                <!-- OffCanvas Menu End -->
            </div>
        </div>


            <!-- OffCanvas Wishlist Start -->
    <div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
        <div class="inner">
            <div class="head">
                <span class="title">Wishlist</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    @auth
                    @foreach (Auth::user()->favorite_posts as $post)
                        <li>
                            <a href="{{route('post.details',$post->slug)}}" class="image"><img src="{{Storage::disk('public')->url('post/'. $post->image)}}"
                                    alt="Cart product Image"></a>
                            <div class="content">
                                <a href="{{route('post.details',$post->slug)}}" class="title">{{Str::limit($post->title,20)}}</a>
                                {{-- <span class="quantity-price">1 x <span class="amount">,$2-1.86</span></span> --}}
                                {{-- {{route('post.details',$post->slug)}} --}}
                                <a href="{{route('post.details',$post->slug)}}" class="btn btn-primary mt-2 blog-btn"> Read More<i class="fa fa-arrow-right ml-5px"
                            aria-hidden="true"></i></a>
                                <a href="{{route('post.favorite',$post->id)}}" class="remove">×</a>
                            </div>
                        </li>

                    @endforeach
                    @else
                    <h4 class="alert alert-danger">Empty wishlist!</h4>
                    @endauth

                </ul>
            </div>

        </div>
    </div>
    <!-- OffCanvas Wishlist End -->
