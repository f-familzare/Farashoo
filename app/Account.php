<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable=['user_id','avatar','name','lastname','mobile','gender','state_id','city_id','region_id','account_status'];
    protected $guarded=['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->hasOne(State::class,'state_id','id');
    }
    public function city()
    {
        return $this->hasOne(City::class,'city_id','id');
    }
    public function region()
    {
        return $this->hasOne(Region::class,'region_id','id');
    }

}
