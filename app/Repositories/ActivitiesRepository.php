<?php
/**
 * Created by PhpStorm.
 * User: jeneki
 * Date: 15/08/2018
 * Time: 5:50 PM
 */

namespace App\Repositories;

use App\Activity;
use Illuminate\Http\Request;

class ActivitiesRepository
{
    public function __construct()
    {
    }

    public function getActivities()
    {
        $activities = Activity::all();

        return $activities;
    }

    public function getActivity($id)
    {
        $activity = Activity::find($id);

        return $activity;
    }

    public function postNewActivity(Request $request)
    {
        $activity = new Activity;

        $activity->name = $request->get('name');

        $activity->description = $request->get('description');

        $activity->save();

        return $activity;
    }

    public function updateActivity($request, $id)
    {
        $activity = $this->getActivity($id);

        $activity->name = $request->get('name');

        $activity->description = $request->get('description');

        return $activity->save();
    }

    public function deleteActivity($id)
    {
        $activity = $this->getActivity($id);

        $activity->delete();

        return $activity;
    }
}