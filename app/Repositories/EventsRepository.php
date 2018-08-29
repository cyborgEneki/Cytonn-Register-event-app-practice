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
        $events = Event::orderBy('start_date', 'desc')
            ->paginate(15);

        return $events;
    }

    public function getEvent(Event $event)
    {
        $event = Event::find($event);

        return $event;
    }

    public function postNewEvent($request)
    {
        $event = Event::create($request->except("activity_id"));

        $event->activities()->sync($request["activity_id"]);


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
}