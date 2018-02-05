<?php

namespace Genusshaus\Domain\Places\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Smart6ate\Uploadcare\Traits\HasUploadcare;

class Event extends Model
{
    use SoftDeletes, HasUploadcare;

    protected $fillable = ['name','description','start','finish'];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
