<?php

namespace Genusshaus\Http\Controllers\Ressources\Places;

use Genusshaus\App\Controllers\Controller;
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
