<?php

namespace Genusshaus\Http\Controllers\Places\Medias;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Places\Medias\StoreMediasRequest;

class MediasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
        return view('app.places.medias.index');
    }

    public function update(StoreMediasRequest $request, Place $place)
    {

        if(optional($place->uploadcares)->count())
        {
            $uuid = $place->uploadcares->first();

            if(!$place->image_processed)
            {
                return back();
                //WITH ERROR
            }

            try
            {
                $place->deleteUploadcare($uuid);
            }
            catch (\Exception $exception)
            {

            }

            $place->image_processed = false;
            $place->save();

            $uuid->delete();
        }

        $uploadcare = app()->uploadcare->getFile($request->uploadcare);

        $place->uploadcares()->create([
            'uploadcareable_id' => $place->id,
            'uuid'              => $uploadcare->data['uuid'],
            'url'               => $uploadcare->getUrl(),
        ]);

        $uploadcare->store();


        $place->image_processed = true;
        $place->save();

        return back();

    }
}
