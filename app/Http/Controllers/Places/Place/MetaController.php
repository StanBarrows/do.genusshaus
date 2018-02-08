<?php

namespace Genusshaus\Http\Controllers\Places\Places;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Region;
use Genusshaus\Http\Requests\Places\Places\StorePlacesRequest;

class MetaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
        return view('app.places.place.address.index');
    }

    public function store(StorePlacesRequest $request)
    {
        /* EDIT */
        $region = Region::first();

        $place = Place::create([
            'region_id'   => $region->id,
            'name'        => $request->name,
            'description' => $request->description,
            'start'       => $request->start,
            'finish'      => $request->finish,

        ]);

        $uploadcare = app()->uploadcare->getFile($request->uploadcare);

        $place->uploadcares()->create([
            'uploadcareable_id' => $place->id,
            'uuid'              => $uploadcare->data['uuid'],
            'url'               => $uploadcare->getUrl(),
        ]);

        $uploadcare->store();

        dd('succes');
    }


}
