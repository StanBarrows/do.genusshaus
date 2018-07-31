<?php

namespace Genusshaus\Http\Controllers\Places\OpeningHours;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\OpeningHour;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Places\OpeningHours\StoreOpeningHoursRequest;

class OpeningHoursController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
        $place = current_place();

        /* $openingHours = OpeningHour::create([
             'monday' => ['09:00-12:00', '13:00-18:00'],
             'sunday' => ['09:00-12:00', '13:00-18:00'],
         ]);

         dd($openingHours->isOpen());*/

        return view('app.places.openings.index', compact('place'));
    }

    public function store(StoreOpeningHoursRequest $request)
    {
        $place = current_place();

        $place->openingHours()->create([
            'weekday' => $request->weekday,
            'open'    => $request->open,
            'close'   => $request->close,
        ]);

        return back();
    }

    public function delete(OpeningHour $openingHour)
    {
        $openingHour->delete();

        return back();
    }
}
