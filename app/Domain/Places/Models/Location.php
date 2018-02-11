<?php

namespace Genusshaus\Domain\Places\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    protected $fillable = ['google_address_id','company','street','postcode','city','latitude','country_id','longitude'];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
