<?php

namespace Genusshaus\Domain\Places\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [''];

    public $timestamps = false;

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
