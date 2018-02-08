<?php

namespace Genusshaus\Domain\Places\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;
use Smart6ate\Uploadcare\Traits\HasUploadcare;

class Event extends Model
{
    use SoftDeletes, HasUploadcare;

    protected $fillable = ['name', 'description', 'start', 'finish'];


    public static function boot()
    {
        parent::boot();

        static::creating(function ($event)
        {
            $event->uuid = Uuid::uuid1();
        });

    }


    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
