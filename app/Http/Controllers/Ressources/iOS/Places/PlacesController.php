<?php

namespace Genusshaus\Http\Controllers\Ressources\iOS\Places;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Ressources\iOS\Places\ShowPlacesRequest;
use Genusshaus\Http\Resources\iOS\Places\NewPlacesIndexRessource;
use Genusshaus\Http\Resources\iOS\Places\NewPlacesShowRessource;
use Genusshaus\Http\Resources\iOS\Places\PlacesIndexRessource;
use Genusshaus\Http\Resources\iOS\Places\PlacesShowRessource;

class PlacesController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $places = Place::all();

         return PlacesIndexRessource::collection($places);
    }

    public function show(ShowPlacesRequest $request)
    {
        $place = Place::where('uuid', '=', $request->uuid)->first();

       return new PlacesShowRessource($place);



    }
}
