
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />

        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('dashboard/assets')}}/images/favicon.ico">

        <!-- App css -->
        <link href="{{asset('dashboard/assets')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard/assets')}}/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard/assets')}}/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/toastr.css">
        <link href="{{asset('dashboard/plugins/sweet-alert/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('dashboard/assets')}}/css/style.css" rel="stylesheet" type="text/css" />

        @stack('css')
        <script src="{{asset('dashboard/assets')}}/js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">

                <div class="slimscroll-menu" id="remove-scroll">



                    <!-- User box -->
                    <div class="user-box">
                        <div class="user-img border rounded-circle ">
                            <img src="{{Auth::user()->profile_photo == 'default.png' ? asset('dashboard/assets/images/users/avatar-1.jpg '): Storage::disk('public')->url('profile_photos/'. Auth::user()->profile_photo)}}" alt="no found "  class="rounded-circle img-fluid">
                        </div>
                        <h5><a href="#">{{Auth::user()->name}}</a> </h5>
                        <p class="text-muted">{{Auth::user()->role == 1 ? 'Admin': "Author"}}</p>
                    </div>

                    <!--- Sidemenu -->
                       @include('layouts.dashboard.partial.sidemenu')
                    <!-- Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Top Bar Start -->
                  @include('layouts.dashboard.partial.topbar')
                <!-- Top Bar End -->



                <!-- Start Page content -->
                @yield('content')
               <!-- content -->

                {{-- <footer class="footer text-right">
                    2018 © Highdmin. - Coderthemes.com
                </footer> --}}


            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="{{asset('dashboard/assets')}}/js/jquery.min.js"></script>
        <script src="{{asset('dashboard/assets')}}/js/popper.min.js"></script>
        <script src="{{asset('dashboard/assets')}}/js/bootstrap.min.js"></script>
        <script src="{{asset('dashboard/assets')}}/js/metisMenu.min.js"></script>
        <script src="{{asset('dashboard/assets')}}/js/waves.js"></script>
        <script src="{{asset('dashboard/assets')}}/js/jquery.slimscroll.js"></script>

        <!-- Flot chart -->
        <script src="{{asset('dashboard/plugins')}}/flot-chart/jquery.flot.min.js"></script>
        <script src="{{asset('dashboard/plugins')}}/flot-chart/jquery.flot.time.js"></script>
        <script src="{{asset('dashboard/plugins')}}/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="{{asset('dashboard/plugins')}}/flot-chart/jquery.flot.resize.js"></script>
        <script src="{{asset('dashboard/plugins')}}/flot-chart/jquery.flot.pie.js"></script>
        <script src="{{asset('dashboard/plugins')}}/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="{{asset('dashboard/plugins')}}/flot-chart/curvedLines.js"></script>
        <script src="{{asset('dashboard/plugins')}}/flot-chart/jquery.flot.axislabels.js"></script>
        <script src="{{asset('dashboard/plugins/sweet-alert/sweetalert2.min.js')}}"></script>

        <!-- KNOB JS -->

        <script type="text/javascript" src="{{asset('dashboard/plugins')}}/jquery-knob/excanvas.js"></script>
        <script src="{{asset('dashboard/plugins')}}/jquery-knob/jquery.knob.js"></script>

        <!-- Dashboard Init -->
        <script src="{{asset('dashboard/assets')}}/pages/jquery.dashboard.init.js"> </script>


        <script src="{{asset('dashboard/assets')}}/js/jquery.core.js"></script>
        <script src="{{asset('dashboard/assets')}}/js/jquery.app.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        <script src="{{asset('frontend/assets')}}/js/toastr.js"></script>

        {!! Toastr::message() !!}


            @if ($errors->any())
                @foreach ($errors->all() as $error )
                <script>
                toastr.error('{{$error}}','error',{
                    CloseButton: true,
                });
               </script>
                @endforeach

            @endif






         @stack('js')

    </body>
</html>
