<?php

namespace Genusshaus\Domain\Users\Models;

use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Smart6ate\Roles\Traits\HasRoles;

class Device extends Authenticatable
{
    use  SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['push_token', 'last_activty'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'last_activity',
    ];

    public function favourites()
     {
         return $this->belongsToMany(Place::class, 'favourites', 'device_id', 'place_id')->withTimeStamps();
     }
}
