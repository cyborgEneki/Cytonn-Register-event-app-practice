<div class="main_admin">

    <div class="grid-x" style="padding-top: 57px;margin-left: 100px;">
        <div class="column small-12 medium-4">
            <div class="card" style="background: purple;height:200px;padding:30px;color: white;border-radius: 5px;">
                <div class="card-section" style="display: flex; align-items: center;">
                    <i class="far fa-calendar-alt" style="font-size: 100px;"></i>
                    &nbsp;&nbsp;<div style="font-size: 30px;flex: 1;">
                        <a href="/events_blade" style="color: white;">Events</a>
                    </div>&nbsp;&nbsp;
                    <div style="font-size: 30px;">{{$data['event_count']}}</div>
                </div>
            </div>
        </div>
        <div class="column small-12 medium-4" style="margin-top: 250px;">
            <div class="card" style="background: green;height:200px;padding:30px;color: white;border-radius: 5px;">
                <div class="card-section" style="display: flex; align-items: center;">
                    <i class="fas fa-chart-line" style="font-size: 100px;"></i>
                    &nbsp;&nbsp;<div style="font-size: 30px;flex: 1;">
                        <a href="/events_blade" style="color: white;">Activities</a>
                    </div>&nbsp;&nbsp;
                    <div style="font-size: 30px;">{{$data['activities_count']}}</div>
                </div>
            </div>
        </div>

        @if(Auth::check() && Auth::user()->isAdmin)
            <div class="column small-12 medium-4" style="margin-top: 450px;">
                <div class="card"
                     style="background: #827a6d;height:200px;padding:30px;color: white;border-radius: 5px;">
                    <div class="card-section" style="display: flex; align-items: center;">
                        <i class="fas fa-users" style="font-size: 100px;"></i>
                        &nbsp;&nbsp;<div style="font-size: 30px;flex: 1;">
                            <a href="/events_blade" style="color: white;">Users</a>
                        </div>&nbsp;&nbsp;
                        <div style="font-size: 30px;">{{$data['users_count']}}</div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>