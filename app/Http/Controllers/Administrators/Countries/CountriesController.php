<?php

namespace Genusshaus\Http\Controllers\Administrators\Countries;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Country;

class CountriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth', 'role:administrator']);
    }

    public function index()
    {
        $countries = Country::all();

        return view('app.administrators.countries.index', compact('countries'));
    }
}
