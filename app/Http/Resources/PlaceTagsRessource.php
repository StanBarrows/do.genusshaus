<?php

namespace Genusshaus\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Spatie\Tags\Tag;


class PlaceTagsRessource extends Resource
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
            'id' => $this->id
        ];
    }

}

