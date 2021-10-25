<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";
    protected $fillable = ["title"];
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
