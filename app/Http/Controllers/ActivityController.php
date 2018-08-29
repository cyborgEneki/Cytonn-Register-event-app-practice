<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Http\Requests\ActivityRequest;
use App\Repositories\ActivitiesRepository;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    private $activitiesRepository;

    public function __construct(ActivitiesRepository $activitiesRepository)
    {
        $this->activitiesRepository = $activitiesRepository;
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
        return view ('activities.create');
    }

    public function edit(Activity $activity)
    {


        return view('activities.edit')->with('activity', $activity);
    }

    public function update(ActivityRequest $request, Activity $activity)
    {
        $this->activitiesRepository->updateActivity($request, $activity);

        return redirect('/activities_blade')->with('success', 'Activity updated successfully');
    }

    public function destroy(Activity $activity)
    {
        $this->activitiesRepository->deleteActivity($activity);

        return redirect('/activities_blade')->with('success', 'Activity deleted successfully');
    }
}
