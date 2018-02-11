<?php

namespace Genusshaus\Http\Controllers\Moderators\Places\Categories;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;

class CategoriesController extends Controller
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
        return view('app.moderators.places.categories.index', compact('place'));
    }

}
