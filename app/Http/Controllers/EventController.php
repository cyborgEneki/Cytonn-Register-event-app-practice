<?php

namespace App\Http\Controllers;

use App\Event;
use App\Repositories\EventsRepository;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $repo;

    public function __construct(EventsRepository $eventsRepository)
    {
        $this->repo = $eventsRepository;
    }

    public function index()
    {
        $events = $this->repo->getEvents();

        return response()->json($events);
    }

    public function show($id)
    {
        $event = $this->repo->getEvent($id);

        return response()->json($event);
    }

    public function create(Request $request)
    {
        $event = $this->repo->postNewEvent($request);

        return response()->json($event, 201);
    }

    public function update(Request $request, Event $event, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'frequency' => 'required',
            'start_date' => 'required',
            'start_time' => 'required',
            'lead_start_date' => 'required',
            'location' => 'required',
        ]);

        $result = $this->repo->editEvent($request, $event, $id);

        return $result ? response()->json(['status' => 'success', 'msg' => 'Event updated successfully']) :
            response()->json(['status' => 'error', 'msg' => 'Error in updating event']);
    }

    public function destroy(Event $event, $id)
    {
        $result = $this->repo->deleteEvent($event, $id);

        return $result ? response()->json(['status' => 'success', 'msg' => 'Event deleted successfully']) :
            response()->json(['status' => 'error', 'msg' => 'Error in deleting event']);
    }
}
