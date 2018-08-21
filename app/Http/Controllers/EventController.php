<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Event;
use App\Repositories\EventsRepository;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $eventsRepository;

    public function __construct(EventsRepository $eventsRepository)
    {
        $this->eventsRepository = $eventsRepository;
    }

    public function index()
    {
        $events = $this->eventsRepository->getEvents();

        return response()->json($events);
    }

    public function store($request)
    {
        $this->validate($request, [
            'name' => 'required',
            'frequency' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'location' => 'required',
            'lead_start_date' => 'required',
        ]);

        $this->eventsRepository->postNewEvent($request);

        return redirect('/events_blade')->with('success', 'Event added successfully');
    }

    public function show($id)
    {
        $event = $this->eventsRepository->getEvent($id);

        $activities = $event->activities()->get(); //From activities repository?

        $data = [
            'event' => $event,
            'activities' => $activities
        ];

        return view('events.show')->with('data', $data);
    }

    public function create()
    {
        $activities = Activity::all(); //Try calling this from the activities repository when I create it

        return view ('events.create')->with('activities', $activities);
    }

    public function edit($id)
    {
        $event = $this->eventsRepository->getEvent($id);

        $activities = Activity::all(); //Try calling this from the activities repository when I create it

        $data = [
            'event' => $event,
            'activities' => $activities
        ];

        return view('events.edit')->with('data', $data);
    }

    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'name' => 'required',
            'frequency' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'location' => 'required',
            'lead_start_date' => 'required',
        ]);

        $this->eventsRepository->editEvent($request, $event);

        return redirect('/events_blade')->with('success', 'Event updated successfully');
    }

    public function destroy($id)
    {
        $this->eventsRepository->deleteEvent($id);

        return redirect('/events_blade')->with('success', 'Event deleted successfully');
    }
}
