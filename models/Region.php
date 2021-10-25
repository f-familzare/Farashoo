<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table="";
    protected $fillable=["name","city_id"];

    public function cities()
    {
        return $this->hasOne(City::class);
    }
}
