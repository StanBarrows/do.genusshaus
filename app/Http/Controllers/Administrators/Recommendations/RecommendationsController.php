<?php

namespace Genusshaus\Http\Controllers\Administrators\Recommendations;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Ressources\Models\Device;
use Genusshaus\Domain\Ressources\Models\LogPlace;
use Recombee\RecommApi\Requests\AddUser;
use Recombee\RecommApi\Requests\ItemBasedRecommendation;
use Recombee\RecommApi\Requests\ListUsers;
use Recombee\RecommApi\Requests\ResetDatabase;
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
        $this->fillPlaces();

        dd('success');

        dd('save!');

        $this->storeLogs();

        dd('success');

        $this->fillDevices();

        dd('success');

        $this->resetDatabase();

        dd('deleted');
    }

    public function resetDatabase()
    {
    }

    public function getDeviceBasedRecommendation(Device $device, $count)
    {
        return app()->recombee->send(new UserBasedRecommendation($device->uuid, $count));
    }

    public function getItemBasedRecommendation(Place $place, $count)
    {
        return app()->recombee->send(new ItemBasedRecommendation($place->uuid, $count));
    }

    public function storeLogs()
    {
        $logs = LogPlace::where('id', '>=', 2251)
            ->where('id', '<=', 2500)
            ->get();

        foreach ($logs as $log) {
        }
    }

    public function fillDevices()
    {
        $devices = Device::where('id', '>=', 451)
                ->where('id', '<=', 550)
                ->get();

        foreach ($devices as $device) {
            $this->addDevice($device);
        }
    }

    public function addDevice(Device $device)
    {
        app()->recombee->send(new AddUser($device->uuid));
    }

    public function fillPlaces()
    {
        $places = Place::where('id', '>=', 1)
            ->where('id', '<=', 150)
            ->get();

        foreach ($places as $place) {
            $this->addPlace($place);
        }

        $this->setPlacesProperties();

        foreach ($places as $place) {
            $this->fillPlaceProperties($place);
        }
    }

    public function addUser($uuid)
    {
        app()->recombee->send(new AddUser($uuid));
    }

    public function getUsersList()
    {
        return app()->recombee->send(new ListUsers());
    }
}
