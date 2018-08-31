<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Http\Requests\ActivityRequest;
use App\Repositories\ActivitiesRepository;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    private $activitiesRepository;

    private $usersRepository;

    public function __construct(ActivitiesRepository $activitiesRepository, UsersRepository $usersRepository)
    {
        $this->activitiesRepository = $activitiesRepository;

        $this->usersRepository = $usersRepository;
    }

    public function index()
    {
        $activities = $this->activitiesRepository->getActivities();

        return view('activities.index')->with('activities', $activities);
    }

    public function store(ActivityRequest $request)
    {
        $this->activitiesRepository->postNewActivity($request);

        return redirect('/activities_blade')->with('success', 'Activity added successfully');
    }

    public function show(Activity $activity)
    {
        return view('activities.show')->with('activity', $activity);
    }

    public function create()
    {
        $users = $this->usersRepository->getUsers();

        return view('activities.create')->with('users', $users);
    }

    public function edit(Activity $activity)
    {
        $users = $this->usersRepository->getUsers();

        return view('activities.edit')->with(['activity' => $activity, 'users' => $users]);
    }

    public function update(ActivityRequest $request, Activity $activity)
    {
        $this->activitiesRepository->updateActivity($request, $activity);

        return view('activities.show')->with(['success' => 'Activity updated successfully', 'activity' => $activity]);
    }

    public function destroy(Activity $activity)
    {
        $this->activitiesRepository->deleteActivity($activity);

        return redirect('/activities_blade')->with('success', 'Activity deleted successfully');
    }
}
