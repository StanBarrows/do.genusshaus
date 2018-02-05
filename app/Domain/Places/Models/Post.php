<?php

namespace Genusshaus\Domain\Places\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
