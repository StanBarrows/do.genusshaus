<?php

namespace Genusshaus\Domain\Places\Models;

use Carbon\Carbon;
use Genusshaus\Domain\Moderators\Models\Beacon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Str;
use Smart6ate\Uploadcare\Traits\HasUploadcare;

class Place extends Model
{
    use SoftDeletes, HasUploadcare;

    protected $fillable = ['region_id', 'name'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($place) {
            $place->uuid = (string) Str::uuid();
            $place->slug = Carbon::now()->format('ymd').'-'.str_slug($place->name);
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function contact()
    {
        return $this->hasOne(Contact::class);
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

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
