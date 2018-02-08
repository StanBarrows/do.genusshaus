<?php

namespace Genusshaus\App\Domain\Users;

use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Smart6ate\Roles\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

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

    public function getRouteKeyName()
    {
        return 'email';
    }

    public function getAvatar()
    {
        if (empty($this->avatar)) {
            return 'https://www.gravatar.com/avatar/'.md5($this->email).'x?s=500&d=mm';
        }

        return $this->avatar;
    }

    public function isSameAs(self $user)
    {
        return $this->id == $user->id;
    }

    public function places()
    {
        return $this->hasMany(Place::class);
    }

    public function scopeInactive($query)
    {
        return $query->where('active', false);
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
