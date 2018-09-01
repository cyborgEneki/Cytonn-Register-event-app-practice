<?php
/**
 * Created by PhpStorm.
 * User: jeneki
 * Date: 13/08/2018
 * Time: 5:55 PM
 */

namespace App\Repositories;

use App\Event;
use App\Activity;
use Illuminate\Http\Request;

class EventsRepository
{
    public function __construct()
    {
    }

    public function getEvents()
    {
        $events = Event::all();

        return $events;
    }

    public function postNewEvent(array $request )
    {
        $event = Event::create($request);

        $event->activities()->sync($request["activity_id"]??[]);

        return $event;
    }

    public function updateEvent($request, Event $event)
    {
        $event->update($request->except("activity_id"));

        $event->activities()->sync($request["activity_id"]);

        return $event;
    }

    /**
     * @param Event $event
     * @return Event
     * @throws \Exception
     */
    public function deleteEvent(Event $event)
    {
        $event->activities()->detach();

        $event->delete();

        return $event;
    }

    public function changeActivityStatus(Event $event, Activity $activity)
    {
        $event->activities()->updateExistingPivot($activity->id, ['status' => request('status')]);

        return $event;
    }
}