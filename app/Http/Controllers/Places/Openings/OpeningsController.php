<?php

namespace Genusshaus\Http\Controllers\Places\Openings;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;

class OpeningsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index(Place $place)
    {
        /* $openingHours = OpeningHours::create([
             'monday' => ['09:00-12:00', '13:00-18:00'],
             'sunday' => ['09:00-12:00', '13:00-18:00'],
         ]);

         dd($openingHours->isOpen());*/

        return view('app.places.openings.index', compact('place'));
    }
}
