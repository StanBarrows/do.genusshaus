<?php

namespace Genusshaus\Domain\Places\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Post extends Model
{
    use SoftDeletes;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post)
        {
            $post->uuid = Uuid::uuid1();
        });

    }


    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
