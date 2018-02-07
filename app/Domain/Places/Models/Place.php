<?php

namespace Genusshaus\Domain\Places\Models;

use Genusshaus\Domain\Moderators\Models\Beacon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;
use Smart6ate\Uploadcare\Traits\HasUploadcare;

class Place extends Model
{
    use SoftDeletes, HasUploadcare;

    protected $fillable = ['region_id', 'name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function beacons()
    {
        return $this->hasMany(Beacon::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
