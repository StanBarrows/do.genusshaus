<?php

namespace Genusshaus\App\Domain\Users;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
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


    public function getAvatar()
    {
        if(empty($this->avatar)) { return 'https://www.gravatar.com/avatar/' . md5($this->email) . 'x?s=500&d=mm';}

        return $this->avatar;
    }

}
