<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function getActivities(){
        $activities = Activity::all();
        return response()->json( $activities );
    }

//    public function getActivity( $id ){
////        $activity = Activity::where('id', '=', $id)
////            ->with('activities')
////            ->first();
//
//        $activity = Activity::all()->where('id', '=', $id)->first();
//
//        return response()->json( $activity );
//    }
//
//    public function postNewActivity(){
//        $activity = new Activity();
//
//        $activity->name = request('name');
//        $activity->description =request('lead_duration');
//        $activity->owner_id = auth()->id();
//        $activity->user_id = auth()->id();
//
//        return response()->json($activity, 201);
//    }
}
