<?php
/**
 * Created by PhpStorm.
 * User: jeneki
 * Date: 15/08/2018
 * Time: 5:50 PM
 */

namespace App\Repositories;

use App\Activity;
use App\ActivityEvent;

class ActivitiesRepository
{
    public function __construct()
    {
    }

    public function getActivities()
    {
        return Activity::all();
    }

    public function getActivity($id)
    {
        return Activity::findOrFail($id);
    }

    public function postNewActivity($request)
    {
//        $activity = new Activity();

        $activity= Activity::create([
           'name'=>$request['name'],
           'user_id'=>auth()->id(),
       ]);

       ActivityEvent::create([
           'event_id'=>$request['event_id'],
           'activity_id'=>$activity->id,
       ]);

        return $activity;

    }

    public function editActivity($request, $activity, $id)
    {
        $activity = Activity::find($id);

        if ($activity->count()) {
            $activity->update($request->except('pivot'));
            return true;
        } else {
            return false;
        }
    }

    public function deleteActivity(Activity $activity, $id)
    {

        $activity = Activity::findOrFail($id);
        $activity->delete();

            return true;

    }
}