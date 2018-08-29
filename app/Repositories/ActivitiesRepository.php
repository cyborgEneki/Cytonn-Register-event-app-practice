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
        $activities = Activity::orderBy('name', 'desc')
            ->paginate(15);

//        $activities = Activity::all();

        return $activities;
    }

    public function getActivity(Activity $activity)
    {
        return $activity;
    }

    public function postNewActivity(Request $request)
    {
        $activity = Activity::create($request->all());

        return $activity;
    }

    public function updateActivity($request, $activity)
    {
        return $activity->update($request->all());

    }

    public function deleteActivity($activity)
    {
        $activity->events()->detach();

        $activity->delete();

        return $activity;
    }
}