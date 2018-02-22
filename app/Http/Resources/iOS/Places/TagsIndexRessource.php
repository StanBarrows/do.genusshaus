<?php

namespace Genusshaus\Http\Resources\iOS\Places;

use Illuminate\Http\Resources\Json\Resource;

class TagsIndexRessource extends Resource
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
            'id'   => $this->id,
            'tag' => $this->slug,
        ];
    }
}
