<?php

namespace Genusshaus\Http\Controllers\Ressources\iOS;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Ressources\Models\Device;
use Genusshaus\Http\Requests\Ressources\iOS\UpdatePushTokensRequest;

class PushTokensController extends Controller
{
    public function __construct()
    {
    }

    public function update(UpdatePushTokensRequest $request)
    {
        $device = Device::where('uuid','=',$request->device_uuid)->first();
        $device->push_token = $request->token;

        $device->save();

        return response()->json([
            'message' => 'successfully updated!'
        ], 200);
    }
}
