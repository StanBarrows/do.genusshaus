<?php

namespace Genusshaus\Http\Controllers\Ressources\iOS\Places;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Ressources\Models\Event;
use Genusshaus\Http\Requests\Ressources\iOS\Places\ShowEventsRequest;
use Genusshaus\Http\Resources\iOS\Places\EventsIndexRessource;
use Genusshaus\Http\Resources\iOS\Places\EventsShowRessource;

class EventsController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $events = Event::all();

        return EventsIndexRessource::collection($events);
    }

    public function show(ShowEventsRequest $request)
    {
        $event = Event::where('uuid', '=',$request->uuid)->get();

        return EventsShowRessource::collection($event);
    }

}
