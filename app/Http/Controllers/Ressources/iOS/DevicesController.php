<?php

namespace Genusshaus\Http\Controllers\Ressources\iOS;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Ressources\Models\Device;
use Genusshaus\Http\Resources\iOS\Places\DevicesIndexRessource;

class DevicesController extends Controller
{
    public function index()
    {
        $devices = Device::all();

        return DevicesIndexRessource::collection($devices);
    }

    public function register()
    {
        $device = Device::create();

            return response()->json([
                'message' => 'successfully registered!',
                'device_uuid' => $device->uuid
            ], 200);
    }


}
