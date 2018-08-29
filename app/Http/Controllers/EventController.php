<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Event;
use App\Http\Requests\EventRequest;
use App\Repositories\EventsRepository;
use App\Repositories\ActivitiesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    protected $eventsRepository;
    protected $activitiesRepository;

    public function __construct(EventsRepository $eventsRepository, ActivitiesRepository $activitiesRepository)
    {
        $this->eventsRepository = $eventsRepository;
        $this->activitiesRepository = $activitiesRepository;
    }

    public function index()
    {
        $events = $this->eventsRepository->getEvents();

        return view('events.index')->with('events', $events);
    }

    public function store(EventRequest $eventRequest)
    {

        $this->eventsRepository->postNewEvent($eventRequest);

        return redirect('/events_blade')->with('success', 'Event added successfully');
    }

    public function show(Event $event)
    {
        return view('events.show', compact("event"));
    }

    public function create()
    {
        $activities = $this->activitiesRepository->getActivities();

        return view('events.create')->with('activities', $activities);
    }

    public function edit(Event $event)
    {

        $activities = $this->activitiesRepository->getActivities();

        return view('events.edit')->with(['event' => $event, 'activities' => $activities]);
    }

    public function update(EventRequest $request, Event $event)
    {
        $this->eventsRepository->updateEvent($request, $event);

        return redirect('/events_blade')->with('success', 'Event updated successfully');
    }

    /**
     * @param Event $event
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Event $event)
    {
        $this->eventsRepository->deleteEvent($event);

        return redirect('/events_blade')->with('success', 'Event deleted successfully');
    }

    public function updateActivityStatus(Event $event, Activity $activity)
    {
        $event->activities()->updateExistingPivot($activity->id, ['status' => request('status')]);

        return redirect()->back();
    }
}
