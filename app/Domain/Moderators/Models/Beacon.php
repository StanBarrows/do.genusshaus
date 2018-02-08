<?php

namespace Genusshaus\Domain\Moderators\Models;

use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Beacon extends Model
{
    use SoftDeletes;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($beacon) {
            $beacon->uuid = Uuid::uuid1();
        });
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
