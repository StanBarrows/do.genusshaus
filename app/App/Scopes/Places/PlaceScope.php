<?php

namespace Genusshaus\App\Scopes\Places;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PlaceScope implements Scope
{
    protected $place;

    public function __construct(Model $place)
    {
        $this->place = $place;
    }

    public function apply(Builder $builder, Model $model)
    {
        return $builder->where($this->place->getForeignKey(), '=', $this->place->id);
    }
}
