<?php

namespace Genusshaus\Http\Controllers\Ressources\Places;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Resources\PlaceRessource;
use Genusshaus\Http\Resources\TagRessource;
use Spatie\Tags\Tag;

class TagsController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $tags = Tag::all();

        return TagRessource::collection($tags);
    }

}
