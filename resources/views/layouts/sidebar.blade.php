<a href="{{asset(Auth::user()->avatar) }}" target="_blank">
    <div class="avatar">
        <img src="{{ asset(Auth::user()->avatar) }}" alt="">
    </div>
</a>
<h6 class="">{{ Auth::user()->name }}</h6>
</a>


<div class="subnav">
    <a>Browse trips</a>
    <div class="subnav-content">
        <a href="#bring">Personal Trips</a>
        <a href="#deliver">Public Trips</a>
        <a href="#package">Invitations</a>
    </div>
</div>
<a href="{{ route('profile', Auth::user()) }}">
    My Page
</a>
<a href="">
    Account
</a>
<a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Logout') }}</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
