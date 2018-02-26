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

                'targets' => [
                    'eFgosZOuHC8:APA91bEUzPcb8VwZl0Vi2Bk5dsIwkTs96hb9b1HkkvKwdcRrS3TQIo04Rc2Pt0-1jT3783gAslnQtBV0oS6yZbyICl4QdZrlgnQr5M9vUgzBW-Klwr9ymYZhoH3baW5yDC3xex_hOPLp',
                    'f3EyE3tirGk:APA91bFbwz3kilwJbdxBupjOK3HWCmn_mplSFxT8osgBvYUt3Ls80pzHTo66DQEXRUwCBdFMgTIsAhtdxVUb-ztEDVomYOo6c8hzZLvT6v6FfGyURIz0lFzAtI3B71L1_8ZY8lvBllFi'

                ],
            ];

        $response = $push->Push($data['data'], $data['targets'], $data['notification']);

        dd($response);

        return back();
    }
}
