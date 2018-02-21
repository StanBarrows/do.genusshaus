<?php

namespace Genusshaus\Domain\Ressources\Models;

use Genusshaus\App\Traits\GeneralTraits;
use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Database\Eloquent\Model;
use Smart6ate\Uploadcare\Traits\HasUploadcare;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use HasUploadcare, HasTags, GeneralTraits;

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
