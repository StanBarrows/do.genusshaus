<?php

namespace Genusshaus\Http\Controllers\Moderators\Countries;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Country;

class CountriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth', 'role:moderator']);
    }

    public function index()
    {
        $countries = Country::all();

        return view('app.moderators.countries.index', compact('countries'));
    }
}
