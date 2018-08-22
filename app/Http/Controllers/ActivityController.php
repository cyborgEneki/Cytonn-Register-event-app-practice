<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Repositories\ActivitiesRepository;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    protected $activitiesRepository;

    public function __construct(ActivitiesRepository $activitiesRepository)
    {
        $this->activitiesRepository = $activitiesRepository;
    }

    public function index()
    {
        $activities = $this->activitiesRepository->getActivities();

        return response()->json($activities);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $this->activitiesRepository->postNewActivity($request);

        return redirect('/activities_blade')->with('success', 'Activity added successfully');
    }

    public function show($id)
    {
        $activity = $this->activitiesRepository->getActivity($id);

        return view('activities.show')->with('activity', $activity);

    }

    public function create(Request $request)
    {
        return view ('activities.create');
    }

    public function edit($id)
    {
        $activity = $this->activitiesRepository->getActivity($id);

        return view('activities.edit')->with('activity', $activity);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $this->activitiesRepository->updateActivity($request, $id);

        return redirect('/activities_blade')->with('success', 'Activity updated successfully');
    }

    public function destroy($id)
    {
        $this->activitiesRepository->deleteActivity($id);

        return redirect('/activities_blade')->with('success', 'Activity deleted successfully');
    }
}
