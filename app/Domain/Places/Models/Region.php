<?php

namespace Genusshaus\Domain\Places\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use SoftDeletes;

    public function places()
    {
        return $this->hasMany(Place::class);
    }
}
