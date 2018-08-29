<?php
/**
 * Created by PhpStorm.
 * User: jeneki
 * Date: 15/08/2018
 * Time: 5:50 PM
 */

namespace App\Repositories;

use App\Activity;
use App\Event;
use Illuminate\Http\Request;

class ActivitiesRepository
{
    public function __construct()
    {
    }

    public function getActivities()
    {
        $activities = Activity::all();

//        $activities = Activity::all();

        return $activities;
    }

    public function getActivity(Activity $activity)
    {
        return $activity;
    }

    public function getEventActivity(Event $event)
    {
    }

    public function postNewActivity(Request $request)
    {
        $activity = Activity::create($request->except("user_id"));

        $activity->users()->sync($request["user_id"]);

        return $activity;
    }

    public function updateActivity($request, $activity)
    {
        $activity->update($request->except("user_id"));

        $activity->users()->sync($request["user_id"]);

        return $activity;

    }

    public function deleteActivity($activity)
    {
        $activity->events()->detach();

        $activity->delete();

        return $activity;
    }
}