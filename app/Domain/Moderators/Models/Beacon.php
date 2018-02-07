<?php

namespace Genusshaus\Domain\Moderators\Models;

use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beacon extends Model
{
    use SoftDeletes;

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
