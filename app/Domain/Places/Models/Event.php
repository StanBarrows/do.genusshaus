<?php

namespace Genusshaus\Domain\Places\Models;

use Genusshaus\App\Traits\GeneralTraits;
use Genusshaus\App\Traits\Places\ForPlaces;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Smart6ate\Uploadcare\Traits\HasUploadcare;
use Spatie\Tags\HasTags;

class Event extends Model
{
    use ForPlaces, SoftDeletes, HasUploadcare, HasTags, GeneralTraits;

    protected $fillable = ['name', 'description', 'start', 'finish'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'start',
    ];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
