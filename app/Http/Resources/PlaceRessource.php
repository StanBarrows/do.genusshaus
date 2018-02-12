<?php

namespace Genusshaus\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Spatie\Tags\Tag;


class PlaceRessource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'tags' => PlaceTagsRessource::collection($this->tags),
        ];
    }

}

