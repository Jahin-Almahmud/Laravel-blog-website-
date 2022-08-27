<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from template.hasthemes.com/jesco/jesco/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Sep 2021 07:18:43 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="robots" content="index, follow" />
    <title>Blog @yield('title')</title>
    <meta name="description" content="Jesco - Fashoin eCommerce HTML Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Add site Favicon -->
    <link rel="shortcut icon" href="{{asset('frontend/assets')}}/images/favicon/favicon.ico" type="image/png">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/vendor/vendor.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/plugins/plugins.min.css" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <link href="{{asset('dashboard/plugins/sweet-alert/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/toastr.css">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/style.min.css">
    <style>



    </style>

    <!-- Main Style -->
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/style.css"/>

    @stack('css')

</head>

<body>

@yield('content')

    <!-- Footer Area Start -->
    <div class="footer-area m-lrb-30px">
        <div class="footer-container">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <!-- Start single blog -->
                        {{-- <div class="col-md-3 col-lg-3 mb-md-30px mb-lm-30px">
                            <div class="single-wedge">
                                <div class="footer-logo">
                                    <a class="text-danger text-uppercase" href="{{route('home')}}">{{config('app.name')}}</a>
                                </div>
                                <p class="about-text">Lorem ipsum dolor sit amet consectet adipisicing elit, sed do
                                    eiusmod templ incididunt ut labore et dolore magnaol aliqua Ut enim ad minim.
                                </p>
                                <ul class="link-follow">
                                    <li>
                                        <a class="m-0" title="Twitter" href="#"><i class="fa fa-twitter"
                                                aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a title="Tumblr" href="#"><i class="fa fa-tumblr" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Instagram" href="#"><i class="fa fa-instagram" aria-hidden="true"></i>
                                            </i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                        <!-- End single blog -->
                        <!-- Start single blog -->
                        <div class="col-md-4 col-sm-4 col-lg-4 mb-md-30px mb-lm-30px pl-lg-50px">
                            <div class="single-wedge">
                                <h4 class="footer-herading">Categories</h4>
                                <div class="footer-links">
                                    <div class="footer-row">
                                        <ul class="align-items-center">
                                            @foreach (categories() as $category)
                                            <li class="li"><a class="single-link" href="{{route('post.category', $category->slug)}}">{{$category->Category_Name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Start single blog -->
                        <!-- Start single blog -->
                        <div class="col-md-4 col-sm-4 col-lg-4 mb-md-30px mb-lm-30px pl-lg-50px">
                            <div class="single-wedge">
                                <h4 class="footer-herading">Tags</h4>
                                <div class="footer-links">
                                    <div class="footer-row">
                                        <ul class="align-items-center">
                                            @foreach (Tags() as $tag)
                                            <li class="li"><a class="single-link" href="{{route('post.tag',$tag->slug)}}">{{$tag->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Start single blog -->
                        <div class="col-md-4 col-sm-4 col-lg-4 mb-md-30px mb-lm-30px pl-lg-50px">
                            <div class="single-wedge">
                                <h4 class="footer-herading">Subscribe</h4>
                                <div class="footer-links">
                                    <div class="footer-row" style="position: relative">
                                        <form action="{{route('subscriber.store')}}" method="POST">
                                            @csrf
                                            <ul class="align-items-center">
                                                <input name="email" placeholder="Enter your Email" class="form-control">
                                                <button style="padding: 17px;border-radius: 0; position: absolute;top: 0;right: 0;" type="submit" class="btn btn-danger"><i class="fa fa-send"></i></button>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <p class="copy-text"> © {{date('Y')}} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Area End -->

    <!-- Search Modal Start -->
    <div class="modal popup-search-style" id="searchActive">
        <button type="button" class="close-btn" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <div class="modal-overlay">
            <div class="modal-dialog p-0" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2>Search Your Product</h2>
                        <form class="navbar-form position-relative" method="GET" action="{{route('search')}}" role="search">
                            <div class="form-group">
                                <input type="text" name="query" class="form-control" placeholder="Search here...">
                            </div>
                            <button type="submit" class="submit-btn"><i class="pe-7s-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Modal End -->




    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="{{asset('frontend/assets')}}/js/vendor/vendor.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{asset('frontend/assets')}}/js/plugins/plugins.min.js"></script>
    <script src="{{asset('dashboard/plugins/sweet-alert/sweetalert2.min.js')}}"></script>
    <script src="{{asset('frontend/assets')}}/js/toastr.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error )
            toastr.error('{{$error}}','Error',{
                CloseButton: true,
            });
            @endforeach

        @endif
    </script>


    <script src="{{asset('frontend/assets')}}/js/main.js"></script>

    <!-- Main Js -->



    @stack('js')
</body>


<!-- Mirrored from template.hasthemes.com/jesco/jesco/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Sep 2021 07:19:21 GMT -->
</html>
