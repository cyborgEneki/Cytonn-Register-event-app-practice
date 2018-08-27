<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Event;
use App\Role;
use App\User;
use App\Repositories\RolesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    protected $rolesRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RolesRepository $rolesRepository)
    {
        $this->middleware('auth');

        $this->rolesRepository = $rolesRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function events_index()
    {
        $events = Event::orderBy('start_date', 'desc')->paginate(15);

        return view('events.index')->with('events', $events);
    }

    public function activities_index()
    {
        $activities = Activity::orderBy('name', 'desc')->paginate(15);

        return view('activities.index')->with('activities', $activities);
    }

    public function roles_index()
    {
        $roles = Role::all();

        return view('roles.index')->with('roles', $roles);
    }

    public function users_index(RolesRepository $rolesRepository)
    {
        $users = User::orderBy('name', 'asc')->paginate(15);

        $data = [
            'users' => $users,
        ];

        return view('users.index')->with('data', $data);
    }

    public function login_index()
    {
        return view('auth.login');
    }
}
