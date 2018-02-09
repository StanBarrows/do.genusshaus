<?php

namespace Genusshaus\Domain\Places\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Smart6ate\Uploadcare\Traits\HasUploadcare;

class Post extends Model
{
    use SoftDeletes, HasUploadcare;

    protected $fillable = ['title','teaser','body','author','src'];


    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->uuid = (string) Str::uuid();
        });
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
