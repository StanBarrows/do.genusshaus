<?php

namespace Genusshaus\Http\Resources\iOS\Places;

use Illuminate\Http\Resources\Json\Resource;

class EventsShowRessource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'uuid'        => $this->uuid,
            'name'        => $this->name,
            'description' => $this->description,

            'location' => [
                'place_uuid'    => $this->place->uuid,
                'place_name'    => $this->place->name,
                'postcode'      => $this->place->location_postcode,
                'place'         => $this->place->location_city,
                'latitude'      => $this->place->location_latitude,
                'longitude'     => $this->place->location_longitude,
            ],

            'from'          => ($this->start)->timestamp,
            'from_readable' => optional($this->start)->diffForHumans(),
            'image'         => $this->getPreviewImage(),

            'tags' => TagsIndexRessource::collection($this->tags),

        ];
    }
}
