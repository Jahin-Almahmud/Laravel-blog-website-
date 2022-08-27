<div class="topbar">

<nav class="navbar-custom">

    <ul class="list-unstyled topbar-right-menu float-right mb-0">


          @if (Auth::user()->role == 1)
          <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <i class="fi-speech-bubble noti-icon"></i>
                <span class="badge badge-custom badge-pill noti-icon-badge">{{latest_messages()->count()}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                <!-- item-->


                <div class="slimscroll" style="max-height: 230px;">
                    <!-- item-->
                    @foreach (latest_messages() as $message)
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon"><img src="{{asset('dashboard/assets')}}/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                        <p class="notify-details">{{$message->name}}</p>
                        <p class="text-muted font-13 mb-0 user-msg"><strong>{{$message->message}}</strong></p>
                    </a>
                    @endforeach




                <!-- All-->
                <a href="{{route('adminmessage')}}" class="dropdown-item text-center text-primary notify-item notify-all">
                    View all <i class="fi-arrow-right"></i>
                </a>

            </div>
        </li>
          @endif

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">

               {{-- <img src="{{" class="rounded-circle " alt=""> --}}
                <img src="{{Auth::user()->profile_photo == 'default.png' ? asset('dashboard/assets/images/users/avatar-1.jpg '): Storage::disk('public')->url('profile_photos/'. Auth::user()->profile_photo)}}" alt="" class="rounded-circle "> <span class="ml-1">{{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                <!-- item-->

                <!-- item-->
                @if(Auth::user()->role == 1)
                    <a  class="dropdown-item" href="{{route('adminsetting')}}">
                        <i class="fi-command"></i> <span>setting </span>
                    </a>

                @endif
                @if(Auth::user()->role == 2)
                    <a  class="dropdown-item" href="{{route('authorsetting')}}">
                        <i class="fi-command"></i> <span>setting </span>
                    </a>

                @endif
                <!-- item-->
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class=" mdi mdi-logout"></i> {{ __('Logout') }}
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </div>
        </li>

    </ul>

    <ul class="list-inline menu-left mb-0">
        <li class="float-left">
            <button class="button-menu-mobile open-left disable-btn">
                <i class="dripicons-menu"></i>
            </button>
        </li>
        <li>
            @yield('breadcrumb')

        </li>

    </ul>

</nav>

</div>
