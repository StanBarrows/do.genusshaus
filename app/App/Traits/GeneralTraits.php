<?php

namespace Genusshaus\App\Traits;

trait GeneralTraits
{
    public function scopeIsActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeIsInactive($query)
    {
        return $query->where('active', false);
    }

    public function scopeIsPublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeIsUnpublished($query)
    {
        return $query->where('published', false);
    }

    public function getPreviewImage()
    {
        if ($this->uploadcares()->count()) {
            return $this->uploadcares->first()->url;
        }
        return 'https://ucarecdn.com/f56e1eae-1bb6-4e4e-beba-0a6b4695034b/-/crop/502x335/26,0/-/preview/';
    }
}
