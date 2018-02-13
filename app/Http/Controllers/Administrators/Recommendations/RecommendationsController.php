<?php

namespace Genusshaus\Http\Controllers\Administrators\Recommendations;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Ressources\Models\Device;
use Genusshaus\Domain\Ressources\Models\LogPlace;
use Recombee\RecommApi\Requests\AddDetailView;
use Recombee\RecommApi\Requests\AddItem;
use Recombee\RecommApi\Requests\AddItemProperty;
use Recombee\RecommApi\Requests\AddUser;
use Recombee\RecommApi\Requests\AddUserProperty;
use Recombee\RecommApi\Requests\ItemBasedRecommendation;
use Recombee\RecommApi\Requests\ListUsers;
use Recombee\RecommApi\Requests\ResetDatabase;
use Recombee\RecommApi\Requests\SetItemValues;
use Recombee\RecommApi\Requests\UserBasedRecommendation;


class RecommendationsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web', 'auth', 'role:administrator']);
    }

    /**
     * Show the administrators dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('app.administrators.recommendations.index');


    }

}
