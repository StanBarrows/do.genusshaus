<?php

namespace Genusshaus\Domain\Ressources\Models;

use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogPlace extends Model
{
/*    use SoftDeletes;*/


    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

}
