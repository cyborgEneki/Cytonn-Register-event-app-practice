<div class="sidebar_admin">


    <a class="disabled" href="#">{{ Auth::user()->name }}</a>
    <br><br>
    <a class="active" href="/home">Dashboard</a>
    <br>
    <a href="/events_blade">Events</a>
    <br>
    <a href="/activities_blade">Activities</a>
    <br><br>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        Logout
    </a>
</div>