<div class="sidebar_admin">


    <a class="disabled" href="#">{{ Auth::user()->name }}</a>
    <br><br>
    <a class="active" href="/home">Dashboard</a>
    <br>
    <a href="/events_blade">Events</a>
    <br>
    <a href="/activities_blade">Activities</a>
    <br><br>

    <a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
        Logout
    </a>

    <form id ="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
        {{csrf_field()}}
    </form>


    <ul class="dropdown menu" data-dropdown-menu>
        <li>
            <a href="#">User Management</a>
            <ul class="menu">
                <li><a href="/users_blade">Users</a></li>

                <li><a href="/roles_blade">Roles</a></li>
                <!-- ... -->
            </ul>
        </li>
    </ul>
</div>