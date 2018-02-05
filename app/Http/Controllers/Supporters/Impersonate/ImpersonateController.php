<?php

namespace Genusshaus\Http\Controllers\Administrators\Impersonate;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Http\Requests\Places\Places\StartImpersonateRequest;
use Genusshaus\Http\Requests\Places\Regions\StoreRegionsRequest;

class ImpersonateController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','role:administrator']);

    }



    public function start(StartImpersonateRequest $request)
    {

    }
}
