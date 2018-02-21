<?php

namespace Genusshaus\Http\Controllers\Ressources\iOS;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Moderators\Models\Beacon;
use Genusshaus\Domain\Ressources\Models\Post;
use Genusshaus\Http\Requests\Ressources\iOS\GetBeaconsRequest;
use Genusshaus\Http\Resources\iOS\Places\BeaconsIndexRessource;
use Genusshaus\Http\Resources\iOS\Places\BeaconsShowPostsRessource;
use Genusshaus\Http\Resources\iOS\Places\PostsIndexRessource;

class BeaconsController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $beacons = Beacon::all();

        return BeaconsIndexRessource::collection($beacons);

    }

    public function show(GetBeaconsRequest $request)
    {
        $beacons = Beacon::where('major','=', $request->major)->where('minor','=',$request->minor)->get();
        
        if (!$beacons->count())
        {
            return response()->json([
                'message' => 'no beacon available!',

            ], 404);
        }

        return BeaconsShowPostsRessource::collection($beacons);

    }
}
