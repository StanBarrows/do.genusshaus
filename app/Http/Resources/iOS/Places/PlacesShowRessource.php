<?php

namespace Genusshaus\Http\Resources\iOS\Places;

use Genusshaus\Domain\Ressources\Models\Event;
use Genusshaus\Domain\Ressources\Models\Post;
use Illuminate\Http\Resources\Json\Resource;

class PlacesShowRessource extends Resource
{
    public function toArray($request)
    {
        $articles = Post::where('place_id','=',$this->id)->get();
        $events = Event::where('place_id','=',$this->id)->get();

        return [

            'type' => $this->type,
            'icon_image' => $this->getIconImage(),
            'icon_color' => $this->getIconColor(),

            'uuid' => $this->uuid,

            'name' => $this->name,
            'description' => $this->description,

            'street' => $this->location_street,
            'postcode' => $this->location_postcode,
            'place' => $this->location_place,

            'geo_latitude' => $this->location_latitude,
            'geo_longitude' => $this->location_latitude,

            'contact' => [

                'name' => $this->contact_name,
                'avatar' => $this->contact_avatar,
                'web' => $this->contact_web,
                'email' => $this->contact_email,
                'phone' => $this->contact_phone,
                'facebook' => $this->contact_facebook,
                'twitter' => $this->contact_twitter,
                'instagram' => $this->contact_instagram,

            ],

            'image' => $this->getPreviewImage(),

            'openings' => OpeningHoursIndexRessource::collection($this->openingHours),

            'created_at' => $this->created_at->timestamp,
            'created_at_diffForHUmans' => $this->created_at->diffForHumans(),

            'tags' => TagsIndexRessource::collection($this->tags),

            'articles' => PostsIndexRessource::collection($articles),
            'events' => EventsIndexRessource::collection($events),


        ];
    }
}
