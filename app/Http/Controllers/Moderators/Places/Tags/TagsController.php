<?php

namespace Genusshaus\Http\Controllers\Moderators\Places\Tags;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;

class TagsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth', 'role:moderator']);
    }

    /**
     * Show the administrators dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Place $place)
    {
        $tags = $place->tags;

        return view('app.moderators.places.tags.index', compact('place','tags'));
    }

}
