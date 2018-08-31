<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Event;
use App\User;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    private $rolesRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
        'event_count' => Event::all()->count(),

        'activities_count' => Activity::all()->count(),

        'users_count' => User::all()->count()
        ];


        return view('home')->with('data', $data);
    }

    public function login_index()
    {
        return view('auth.login');
    }
}
