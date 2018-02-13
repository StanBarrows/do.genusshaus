<?php

namespace Genusshaus\Http\Resources\Landingpage;

use Genusshaus\Http\Resources\PlaceTagsRessource;
use Illuminate\Http\Resources\Json\Resource;

class PlacesShowRessource extends Resource
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
            'region'      => $this->region->name,
            'name'        => $this->name,
            'description' => $this->description,
            'image_url'   => $this->uploadcares->first()->url,
            'tags'        => PlaceTagsRessource::collection($this->tags),
        ];
    }
}
