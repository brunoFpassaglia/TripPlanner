<a href="{{asset(Auth::user()->avatar) }}" target="_blank">
    <div class="avatar zoom">
        <img src="{{ asset(Auth::user()->avatar) }}" alt="">
    </div>
</a>
<h6 class="">{{ Auth::user()->name }}</h6>
</a>


<div class="subnav">
    <a class="zoom">Browse trips</a>
    <div class="subnav-content">
        <a class="zoom" href="{{ route('trips.personal_trips') }}">Personal Trips</a>
        <a class="zoom" href="{{ route('trips.index') }}">Public Trips</a>
        <a class="zoom" href="#package">Invitations</a>
    </div>
</div>
<a class="zoom" href="{{ route('profile', Auth::user()) }}">
    My Page
</a>
<a class="zoom" href="">
    Account
</a>
<a class="zoom" class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Logout') }}</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
