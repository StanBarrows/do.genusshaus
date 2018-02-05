<?php

namespace Genusshaus\Domain\Places\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Smart6ate\Uploadcare\Traits\HasUploadcare;

class Place extends Model
{
    use SoftDeletes, HasUploadcare;

    protected $fillable = ['region_id','name'];


    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
