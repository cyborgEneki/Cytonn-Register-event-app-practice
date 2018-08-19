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
        return Event::with('activities')->get();
    }

    public function getEvent($id)
    {
        return Event::where('id', '=', $id)
            ->with('activities')
            ->first();
    }

    public function postNewEvent($request)
    {
        $event = new Event();

        $event->name = request('name');
        $event->frequency = request('frequency');
        $event->start_date = request('start_date');
        $event->start_time = request('start_time');
        $event->lead_start_date = request('lead_start_date');
        $event->location = request('location');
        $event->team_id = 7;
        $event->category_id = 1;

        return $event->save();

    }

    public function editEvent($request, $event, $id)
    {
        $event = Event::find($id);

        if ($event->count()) {
            $event->update($request->all());
            return true;
        } else {
            return false;
        }
    }

    public function deleteEvent(Event $event, $id)
    {


        $event = Event::find($id);

        if ($event->count()) {
            $event->delete();
            return true;
        } else {
            return false;
        }
    }
}