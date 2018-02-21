<?php

namespace Genusshaus\Http\Controllers\Ressources\iOS;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Ressources\iOS\LogPhraseRequest;
use Genusshaus\Http\Requests\Ressources\iOS\SearchPlacesRequest;
use Genusshaus\Http\Resources\iOS\Places\PlacesIndexRessource;

class SearchController extends Controller
{

    public function search(SearchPlacesRequest $request)
    {
        $places =  Place::withAllTags($request->tags)
            ->orderBy('name','asc')
            ->get();

        if($places->count())
        {
            return PlacesIndexRessource::collection($places);
        }
        return response()->json([
        ], 204);
    }

    public function log(LogPhraseRequest $request)
    {
        return response()->json([
        ], 200);
    }
}
