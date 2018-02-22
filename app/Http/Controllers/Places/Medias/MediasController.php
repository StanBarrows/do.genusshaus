<?php

namespace Genusshaus\Http\Controllers\Places\Medias;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Places\Medias\StoreMediasRequest;
use Illuminate\Http\Request;
use Smart6ate\Uploadcare\Models\Uploadcare;

class MediasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
        $place = current_place();

        return view('app.places.medias.index', compact('place'));
    }

    public function deleteUploadcareObject(Place $place, Uploadcare $uploadcare)
    {
        $uploadcare->delete();

        try {
            $place->deleteUploadcare($uploadcare);
        } catch (\Exception $exception) {
        }
    }

    public function createUploadcareObject(Place $place, Request $request)
    {
        $new_uploadcare_object = app()->uploadcare->getFile($request->uploadcare);

        $place->uploadcares()->create([
            'uploadcareable_id' => $place->id,
            'uuid'              => $new_uploadcare_object->data['uuid'],
            'url'               => $new_uploadcare_object->getUrl(),
        ]);

        $new_uploadcare_object->store();
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

    public function update(StoreMediasRequest $request)
    {
        $place = current_place();

        if ($place->uploadcares->count()) {
            if ($this->validateIfUploadcareObjectExists($request)) {
                return back();
            } else {
                $this->createUploadcareObject($place, $request);

                $old_uploadcare_object = $place->uploadcares->first();
                $this->deleteUploadcareObject($place, $old_uploadcare_object);
            }
        } else {
            $this->createUploadcareObject($place, $request);
        }

        return back();
    }
}
