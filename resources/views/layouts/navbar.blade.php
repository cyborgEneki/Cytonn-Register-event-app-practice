<div class="top-bar" style="background-color: #d77801;color: white;font-weight: 600;height: 100px;">
    <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu style="background-color: #d77801;color: white;font-weight: 600;">
            <li class="menu-text">Cytonn Register</li>
        </ul>
    </div>
    <div class="top-bar-right">
        <ul class="menu" style="background-color: #d77801;color: white;font-weight: 600;">
            <li><a class="disabled" href="#" style="color: white;"><i
                            class="fas fa-user"></i>&nbsp;{{ Auth::user()->name }}</a></li>
            <li>

                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                    {{csrf_field()}}
                </form>

            </li>


            <ul class="dropdown menu" data-dropdown-menu
                style="background-color: #d77801;color: white;font-weight: 600;">
                <li>
                    <a href="#" style="color: white;"><i class="fas fa-users-cog"></i>&nbsp;User Management</a>
                    <ul class="menu" style="background-color: #ee4f2f;color: white;font-weight: 600;">
                        <li><a href="/users_blade" style="color: white;">Users</a></li>

                        <li><a href="/roles_blade" style="color: white;">Roles</a></li>
                        <!-- ... -->
                    </ul>
                </li>
            </ul>
        </ul>
    </div>
</div>