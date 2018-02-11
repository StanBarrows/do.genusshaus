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

    public function index(Place $place)
    {
        $events = $place->events()->orderBy('start','asc')->get();

        return view('app.places.events.index',compact('place','events'));
    }

    public function create(Place $place)
    {
        return view('app.places.events.create', compact('place'));
    }

    public function edit(Place $place, Event $event)
    {
        return view('app.places.events.edit', compact('place','event'));
    }

    public function store(StoreEventsRequest $request, Place $place)
    {
        $event = $place->events()->create([
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

        return redirect()->route('places.events.index', $place);
    }

    public function update(UpdateEventsRequest $request, Place $place, Event $event)
    {
        $event->update([
            'name'        => $request->name,
            'description' => $request->description,
            'start'       => $request->start,
        ]);


        return back();

        /* if (!$place->image_processed)
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

 */


    }


    public function publish(Place $place, Event $event)
    {
        $event->published = true;
        $event->save();

        return back();
    }


    public function unpublish(Place $place, Event $event)
    {
        $event->published = false;
        $event->save();

        return back();
    }



    public function delete(Place $place, Event $event)
    {
        $event->published = false;
        $event->pushed = false;

        $event->save();

        $event->delete();

        return redirect()->route('places.events.index', compact('place'));
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

        try
        {
            $event->deleteUploadcare($uploadcare);

        } catch (\Exception $exception) {

        }
    }

    public function validateIfUploadcareObjectExists(Request $request)
    {
        $uploadcare_object_uuid = app()->uploadcare->getFile($request->uploadcare)->data['uuid'];

        $check = Uploadcare::where('uuid',$uploadcare_object_uuid)->first();

        if(!empty($check))
        {
            return true;
        }

        return false;
    }


}
