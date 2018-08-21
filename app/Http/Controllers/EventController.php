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

    public function store(Request $request)
    {
//        $data = [
//            'activities' => $activities
//        ];

        $this->validate($request, [
            'name' => 'required',
            'frequency' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'location' => 'required',
            'lead_start_date' => 'required',
            'activities'
        ]);

        $event = $this->eventsRepository->postNewEvent($request);

        return response()->json($event);
    }

    public function show($id)
    {
        $event = $this->eventsRepository->getEvent($id);

        $activities = $event->activities()->get();

        $data = [
            'event' => $event,
            'activities' => $activities
        ];

        return view('events.show')->with('data', $data);
    }

    public function create(Request $request)
    {
        $activities = Activity::all();
        return view ('events.create', compact('activities'));
    }

    public function edit($id)
    {
//
    }

    public function update(Request $request, Event $event, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'frequency' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'location' => 'required',
            'lead_start_date' => 'required',

        ]);

        $result = $this->eventsRepository->editEvent($request, $event, $id);

        return $result ? response()->json(['status' => 'success', 'msg' => 'Event updated successfully']) :
            response()->json(['status' => 'error', 'msg' => 'Error in updating event']);
    }

    public function destroy(Event $event, $id)
    {
        $result = $this->eventsRepository->deleteEvent($event, $id);

        return $result ? response()->json(['status' => 'success', 'msg' => 'Event deleted successfully']) :
            response()->json(['status' => 'error', 'msg' => 'Error in deleting event']);
    }
}
