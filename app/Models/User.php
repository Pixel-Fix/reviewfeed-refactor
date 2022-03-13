<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'displayname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function fullname()
    {
        return $this->firstname." ".$this->lastname;
    }

    public function company()
    {
        return $this->hasOne('App\Models\Company');
    }

    public function companies()
    {
        return $this->hasMany('App\Models\Company');
    }

    public function getIsAdminAttribute($value)
    {
        return filter_var($value,FILTER_VALIDATE_BOOLEAN);
    }

    public function getProfilePicAttribute($value)
    {
        if(($value === null) || (strlen($value) == 0))
        {
            return asset('img/user.png');
        }

        return $value;
    }

    public function getIsActiveAttribute($value)
    {
        return filter_var($value,FILTER_VALIDATE_BOOLEAN);
    }

}
