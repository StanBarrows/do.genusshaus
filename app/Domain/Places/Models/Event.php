<?php

namespace Genusshaus\Domain\Places\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Smart6ate\Uploadcare\Traits\HasUploadcare;

class Event extends Model
{
    use SoftDeletes, HasUploadcare;

    protected $fillable = ['name', 'description', 'start', 'finish'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'start',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            $event->uuid = (string) Str::uuid();
        });
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
