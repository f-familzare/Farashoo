<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['permission_title', 'permission_label'];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
