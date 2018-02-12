<?php

namespace Genusshaus\Http\Controllers\Ressources\Places;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Resources\PlaceRessource;

class PlacesController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $places = Place::all();

        return PlaceRessource::collection($places);
    }

}
