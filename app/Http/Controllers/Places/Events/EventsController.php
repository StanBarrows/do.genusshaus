<?php

namespace Genusshaus\Http\Controllers\Places\Events;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Event;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Places\Events\StoreEventsRequest;
use Genusshaus\Http\Requests\Places\Events\UpdateEventsRequest;
use Illuminate\Http\Request;
use Smart6ate\Uploadcare\Models\Uploadcare;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
        $events = Event::all();

        return view('app.places.events.index', compact('events'));
    }

    public function push(Event $event)
    {
        return view('app.places.events.push', compact( 'event'));
    }

    public function create()
    {
        return view('app.places.events.create');
    }

    public function edit(Event $event)
    {
        return view('app.places.events.edit', compact( 'event'));
    }

    public function store(StoreEventsRequest $request)
    {
        $event = Event::create([
            'name'        => $request->name,
            'description' => $request->description,
            'start'       => $request->start,
        ]);

        $uploadcare = app()->uploadcare->getFile($request->uploadcare);

        $event->uploadcares()->create([
            'uploadcareable_id' => $event->id,
            'uuid'              => $uploadcare->data['uuid'],
            'url'               => $uploadcare->getUrl(),
        ]);

        $uploadcare->store();

        return redirect()->route('places.events.index');
    }

    public function update(UpdateEventsRequest $request, Event $event)
    {
        $event->update([
            'name'        => $request->name,
            'description' => $request->description,
            'start'       => $request->start,
        ]);

        return back();

         if (!$place->image_processed)
         {
             return back();
         }

         if($place->uploadcares->count()) {

             if($this->validateIfUploadcareObjectExists($request))
             {
                 return back();
             }

             else
             {
                 $this->createUploadcareObject($place, $request);

                 $old_uploadcare_object = $place->uploadcares->first();
                 $this->deleteUploadcareObject($place, $old_uploadcare_object);
             }
         }
         else
         {
             $this->createUploadcareObject($place, $request);
         }

         return back(); $uploadcare = app()->uploadcare->getFile($request->uploadcare);

         $event->uploadcares()->create([
             'uploadcareable_id' => $event->id,
             'uuid'              => $uploadcare->data['uuid'],
             'url'               => $uploadcare->getUrl(),
         ]);

         $uploadcare->store();


    }

    public function publish(Event $event)
    {
        $event->published = true;
        $event->save();

        return back();
    }

    public function unpublish(Event $event)
    {
        $event->published = false;
        $event->save();

        return back();
    }

    public function delete(Event $event)
    {
        $event->published = false;
        $event->pushed = false;

        $event->save();

        $event->delete();

        return redirect()->route('places.events.index');
    }

    public function createUploadcareObject(Event $event, Request $request)
    {
        $event->image_processed = false;

        $event->save();

        $new_uploadcare_object = app()->uploadcare->getFile($request->uploadcare);

        $event->uploadcares()->create([
            'uploadcareable_id' => $event->id,
            'uuid'              => $new_uploadcare_object->data['uuid'],
            'url'               => $new_uploadcare_object->getUrl(),
        ]);

        $new_uploadcare_object->store();

        $event->image_processed = true;
        $event->save();
    }

    public function deleteUploadcareObject(Event $event, Uploadcare $uploadcare)
    {
        $uploadcare->delete();

        try {
            $event->deleteUploadcare($uploadcare);
        } catch (\Exception $exception) {
        }
    }

    public function validateIfUploadcareObjectExists(Request $request)
    {
        $uploadcare_object_uuid = app()->uploadcare->getFile($request->uploadcare)->data['uuid'];

        $check = Uploadcare::where('uuid', $uploadcare_object_uuid)->first();

        if (!empty($check)) {
            return true;
        }

        return false;
    }
}
