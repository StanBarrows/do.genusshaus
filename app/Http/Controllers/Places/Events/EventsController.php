<?php

namespace Genusshaus\Http\Controllers\Places\Events;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Places\Places\StartImpersonateRequest;

class EventsController extends Controller
{
    public function index()
    {
        return view('app.places.events.index');
    }

    public function store(StartImpersonateRequest $request)
    {
        /* EDIT */
        $place = Place::first();

        $event = $place->events()->create([
            'name'        => $request->name,
            'description' => $request->description,
            'start'       => $request->start,
            'finish'      => $request->finish,

        ]);

        $uploadcare = app()->uploadcare->getFile($request->uploadcare);

        $event->uploadcares()->create([
            'uploadcareable_id' => $event->id,
            'uuid'              => $uploadcare->data['uuid'],
            'url'               => $uploadcare->getUrl(),
        ]);

        $uploadcare->store();

        dd('succes');
    }
}
