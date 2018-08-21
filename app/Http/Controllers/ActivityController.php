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

    public function show($id)
    {
        $activity = $this->activitiesRepository->getActivity($id);

        return response()->json($activity);
    }

    public function create(Request $request)
    {
        $activity = $this->activitiesRepository->postNewActivity($request);

        return response()->json($activity, 201);
    }

    public function update(Request $request, Activity $activity, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $result = $this->activitiesRepository->editActivity($request, $activity, $id);

        return $result ? response()->json(['status' => 'success', 'msg' => 'Activity updated successfully']) :
            response()->json(['status' => 'error', 'msg' => 'Error in updating activity']);
    }

    public function destroy(Activity $event, $id)
    {
        $result = $this->activitiesRepository->deleteActivity($event, $id);

        return $result ? response()->json(['status' => 'success', 'msg' => 'Activity deleted successfully']) :
            response()->json(['status' => 'error', 'msg' => 'Error in deleting activity']);
    }
}
