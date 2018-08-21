<?php
/**
 * Created by PhpStorm.
 * User: jeneki
 * Date: 13/08/2018
 * Time: 5:55 PM
 */

namespace App\Repositories;

use App\Event;

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

    public function postNewEvent($request)
    {

        $event = Event::create($request->except("activity_id"));

        foreach ($request["activity_id"] as $activity){

            $event->activities()->attach($activity);

        };

        return $event;
    }

    public function editEvent($request, $event, $id)
    {
        $event = $this->getEvent($id);

        if ($event->count()) {
            $event->update($request->all());
            return true;
        } else {
            return false;
        }
    }

    public function deleteEvent(Event $event, $id)
    {


        $event = $this->getEvent($id);

        if ($event->count()) {
            $event->delete();
            return true;
        } else {
            return false;
        }
    }
}