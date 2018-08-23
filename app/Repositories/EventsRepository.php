<?php
/**
 * Created by PhpStorm.
 * User: jeneki
 * Date: 13/08/2018
 * Time: 5:55 PM
 */

namespace App\Repositories;

use App\Event;
use Illuminate\Http\Request;

class EventsRepository
{
    public function __construct()
    {
    }

    public function getEvents()
    {
        $events = Event::with('activities')->get();

        return $events;
    }

    public function getEvent($id)
    {
        $event = Event::find($id);

        return $event;
    }

    public function postNewEvent(Request $request)
    {
        $event = Event::create($request->except("activity_id"));

        $event->activities()->sync($request["activity_id"]);
//        foreach ($request["activity_id"] as $activity) {
//
//            $event->activities()->attach($activity);
//
//        };

        return $event;
    }

    public function updateEvent(Request $request, Event $event)
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
}