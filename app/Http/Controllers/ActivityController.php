<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Repositories\ActivitiesRepository;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    protected $repo;

    public function __construct(ActivitiesRepository $activitiesRepository)
    {
        $this->repo = $activitiesRepository;
    }

    public function index()
    {
        $activities = $this->repo->getActivities();

        return response()->json($activities);
    }

    public function create(Request $request)
    {
        $activity = $this->repo->postNewActivity($request);

        return response()->json($activity, 201);
    }

    public function update(Request $request, Activity $activity, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $result = $this->repo->editActivity($request, $activity, $id);

        return $result ? response()->json(['status' => 'success', 'msg' => 'Activity updated successfully']) :
            response()->json(['status' => 'error', 'msg' => 'Error in updating activity']);
    }

    public function destroy(Activity $event, $id)
    {
        $result = $this->repo->deleteActivity($event, $id);

        return $result ? response()->json(['status' => 'success', 'msg' => 'Activity deleted successfully']) :
            response()->json(['status' => 'error', 'msg' => 'Error in deleting activity']);
    }
}
