<?php

namespace Genusshaus\Http\Controllers\Places\Medias;

use Genusshaus\App\Controllers\Controller;

class MediasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
        return view('app.places.medias.index');
    }
}
