<?php

namespace App\Http\Controllers\Api;

use App\Repositories\EventsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    //
    private $eventsRepository;

    public function __construct(EventsRepository $eventsRepository)
    {
        $this->eventsRepository=$eventsRepository;
    }

    public function index()
    {
        $events = $this->eventsRepository->getEvents();

        return response()->json($events);
    }


}
