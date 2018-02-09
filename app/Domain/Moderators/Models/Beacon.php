<?php

namespace Genusshaus\Domain\Moderators\Models;

use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class Beacon extends Model
{
    use SoftDeletes;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($beacon) {
            $beacon->uuid = (string) Str::uuid();
        });
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
