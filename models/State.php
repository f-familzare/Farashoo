<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table="states";
    protected $fillable=["name","country_id"];

    public function country(){
        return $this->hasOne(Country::class);
    }
    public function cities() {
        return $this->hasMany( City::class);
    }
}
