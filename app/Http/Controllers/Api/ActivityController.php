<?php

namespace App\Http\Controllers\Api;

use App\Activity;
use App\Event;
use App\Repositories\ActivitiesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    //

    private $activitiesRepository;

    public function __construct(ActivitiesRepository $activitiesRepository)
    {
        $this->activitiesRepository = $activitiesRepository;
    }

    public function index()
    {
        $activities = $this->activitiesRepository->getActivities();

        return response()->json($activities);
    }

    public function check (Event $event,Activity $activity,$status)
    {
        $event->activities()->updateExistingPivot($activity->id, ["confirmed"=>$status]);
    }
}


