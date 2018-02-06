<?php

namespace Genusshaus\Http\Controllers\Users\Support;

use Genusshaus\App\Controllers\Controller;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('app.users.support.index');
    }
}
