<nav class="navbar is-fixed-top has-shadow" >
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item is-paddingless brand-item" href="{{route('home')}}">
                {{--<img src="{{asset('images/devmarketer-logo.png')}}" alt="DevMarketer logo">--}}
                Home
            </a>

            @if (Request::segment(1) == "manage")
                <a class="navbar-item is-hidden-desktop" id="admin-slideout-button">
          <span class="icon">
            <i class="fa fa-arrow-circle-right"></i>
          </span>
                </a>
            @endif

            <button class="button navbar-burger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item is-tab is-hidden-mobile m-l-30" href="{{route('manage.dashboard')}}">Horoskopius</a>
                <a class="navbar-item is-tab is is-hidden-mobile" href="{{route('users')}}">Manage Users</a>
                <a class="navbar-item is-tab is-hidden-mobile" href="{{ route('roles.index') }}">Roles</a>
                <a class="navbar-item is-tab is-hidden-mobile" href="{{ route('permissions.index') }}">Permissions</a>
                <a class="navbar-item is-tab is-hidden-mobile" href="/test">Vue Modals</a>

            </div> <!-- end of .navbar-start -->


            <div class="navbar-end nav-menu" style="overflow: visible">
                @guest
                    <a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
                    <a href="{{route('register')}}" class="navbar-item is-tab">Join The Horoskopius</a>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link"> Hey {{Auth::user()->name}}</a>
                        <div class="navbar-dropdown is-right" >
                            <a href="#" class="navbar-item">
                <span class="icon">
                  <i class="fa fa-fw fa-user-circle-o m-r-5"></i>
                </span>Profile
                            </a>

                            <a href="#" class="navbar-item">
                <span class="icon">
                  <i class="fa fa-fw fa-bell m-r-5"></i>
                </span>Notifications
                            </a>
                            <a href="{{route('home')}}" class="navbar-item">
                <span class="icon">
                  <i class="fa fa-fw fa-cog m-r-5"></i>
                </span>Manage
                            </a>
                            <hr class="navbar-divider">
                            <a href="{{route('logout')}}" class="navbar-item" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <span class="icon">
                  <i class="fa fa-fw fa-sign-out m-r-5"></i>
                </span>
                                Logout
                            </a>
                            @include('_includes.forms.logout')
                        </div>
                    </div>
                @endguest
            </div>
        </div>

    </div>
</nav>