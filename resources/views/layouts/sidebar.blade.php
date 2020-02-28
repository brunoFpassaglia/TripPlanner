
<nav class="sidebar" >
    <a href="{{asset(Auth::user()->avatar) }}" target="_blank">
        <div class="avatar zoom">
            <img src="{{ isset(Auth::user()->avatar) ? '/storage/'.Auth::user()->avatar : asset('/storage/avatars/default.png')}}" alt="">
        </div>
    </a>
    <h6 class="">{{ Auth::user()->name }}</h6>
    
    
    <div class="subnav">
        <a class="zoom"><i class="fas fa-home"></i> Browse trips</a>
        <div class="subnav-content">
            <a class="zoom" href="{{ route('trips.personal_trips') }}"><i class="fas fa-lock"></i> Personal Trips</a>
            <a class="zoom" href="{{ route('trips.index') }}"><i class="fas fa-lock-open"></i> Public Trips</a>
            <a class="zoom" href="{{ route('invitations') }}"><i class="fas fa-envelope-open-text"></i> Invitations <span class="badge badge-light">{{Auth::user()->unreadNotifications->count()}}</span></a>
        </div>
    </div>
    <a class="zoom" href="{{ route('profile', Auth::user()) }}">
        <i class="fas fa-user-shield"></i>
        My Page
    </a>
    
    <a class="zoom" class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    <i class="fas fa-sign-out-alt"></i>
    {{ __('Logout') }}</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</nav>


