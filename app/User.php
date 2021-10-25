<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = [
        'username', 'email', 'password','level'
    ];



    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('title', $role);
        }

        return !! $role->intersect($this->roles)->count();
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function rezume()
    {
        return $this->hasOne(Rezume::class);
    }
    public function account()
    {
        return $this->hasOne(Account::class);
    }
    public function business()
    {
        return $this->hasOne(Business::class);
    }
}
