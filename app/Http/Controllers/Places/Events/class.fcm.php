<?php

class GooglePush
{
    public function __construct()
    {
        $this->headers = array("Authorization: key=" . env('GOOGLE_FIREBASE_KEY'),
            "Content-Type: application/json"
        );
    }
    private $url = "https://fcm.googleapis.com/fcm/send";
    private $headers = null;

    public function Push($payload, $ids, $notification = null)
    {
        $post = array();
        $post["data"] = (array)$payload;
        $post["registration_ids"] = $ids;

        if($notification !== null)
        {
            $post["notification"] = $notification;
        }

        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $this->url );
        curl_setopt( $ch, CURLOPT_POST, true );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $this->headers );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $post ) );
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec( $ch );
        curl_close( $ch );

        return $result;
    }
}