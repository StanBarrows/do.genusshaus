<?php

namespace Genusshaus\Http\Controllers\Places\Dashboard;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\Places\Events\StoreEventsRequest;
use Illuminate\Support\Facades\Route;
use Smart6ate\Roles\Models\Role;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
        return view('app.places.dashboard.index');
    }

}
