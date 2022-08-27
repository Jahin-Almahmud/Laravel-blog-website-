<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <!--<li class="menu-title">Navigation</li>-->
        @if (Request::is('admin*'))
            <li>
                <a href="{{route('admindashboard')}}">
                    <i class="fi-air-play"></i> <span> Dashboard </span>
                </a>
            </li>

            <li>
                <a href="{{route('adminsubscriber')}}">
                    <i class="fi-head"></i>  <span> Subscribers </span>
                </a>
            </li>

            <li>
                <a href="{{route('admintag.index')}}">
                    <i class="fi-command"></i> <span> Tags </span>
                </a>
            </li>
            <li>
                <a href="{{route('admincategory.index')}}">
                    <i class="fa fa-list"></i> <span> Categories </span>
                </a>
            </li>
            <li>
                <a href="{{route('adminpost.index')}}">
                    <i class="fa fa-envelope"></i> <span> posts </span>
                </a>
            </li>
            <li>
                <a href="{{route('adminpost.pending')}}">
                    <i class="fa fa-eye-slash"></i> <span>pending posts </span>
                </a>
            </li>
            <li>
                <a href="{{route('adminpost.comment')}}">
                    <i class="fa fa-comments"></i> <span>Comments</span>
                </a>
            </li>
            <li>
                <a href="{{route('adminmessage')}}">
                    <i class="fi-mail"></i> <span>Messages</span>
                </a>
            </li>
            <hr>
            <li>
                <a href="{{route('home')}}">
                    <i class="fa fa-home"></i> <span>Frontend </span>
                </a>
            </li>
            <li>
                <a href="{{route('adminsetting')}}">
                    <i class="fi-cog"></i> <span>Settings </span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class=" mdi mdi-logout"></i> <span>Log out</span>
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>




        @endif

        @if (Request::is('author*'))
            <li>
                <a href="{{route('authordashboard')}}">
                    <i class="fi-air-play"></i> <span> Dashboard </span>
                </a>
            </li>
            <li>
                <a href="{{route('authorpost.index')}}">
                    <i class="fa fa-envelope"></i> <span> post </span>
                </a>
            </li>
            <li>
                <a href="{{route('authorpost.comment')}}">
                    <i class="fa fa-comments"></i> <span>Comment</span>
                </a>
            </li>
            <hr>
            <li>
                <a href="{{route('home')}}">
                    <i class="fa fa-home"></i> <span>Frontend </span>
                </a>
            </li>
            <li>
                <a href="{{route('authorsetting')}}">
                    <i class="fi-cog"></i> <span>Settings </span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class=" mdi mdi-logout"></i> <span>Log out</span>
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>



        @endif

    </ul>

</div>
