<?php

namespace Genusshaus\App\Observers\Places;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PlacesObserver
{
    protected $place;

    public function __construct($place)
    {
        $this->place = $place;
    }

    public function creating(Model $model)
    {
        if (!isset($model->uuid)) {
            $model->uuid = (string) Str::uuid();
        }

        $foreignKey = $this->getForeignKey();

        if (!isset($model->{$foreignKey})) {
            $model->setAttribute($foreignKey, $this->place->id);
        }
    }

    protected function getForeignKey()
    {
        return $this->place->getForeignKey();
    }
}
