<?php

namespace Genusshaus\Http\Controllers\Places\Events;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Event;

class PushEventsController extends Controller
{
    public function send(Event $event)
    {
        require_once 'class.fcm.php';

        $place = $event->place;

        $push = new \GooglePush();

        $data = [
                'data' => [
                        'type'       => 'event',
                        'place_uuid' => $place->uuid,
                        'place_name' => $place->name,
                        'event_name' => $event->name,
                        'created_at' => optional($event->created_at)->diffForHumans(),
                    ],

                'notification' => [
                        'title' => $place->name,
                        'body'  => $event->name,
                        'sound' => 'default',
                    ],

                'targets' =>

                    [json_encode($event->place->favourites->pluck('push_token'))]
                ,
            ];

        $response = $push->Push($data['data'], $data['targets'], $data['notification']);

        dd($response);

        return back();
    }
}
