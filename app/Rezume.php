<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rezume extends Model
{
    protected $fillable = ['name','last_name','age', 'user_id' , 'email', 'avatar',
        'status', 'state_id', 'city_id', 'region_id', 'about_me','rezume_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function academy()
    {
        return $this->hasMany(Academy::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class,'rezume_id','skill_id');
    }
    public function languages()
    {
        return $this->hasMany(Language::class,'language_id','id');
    }
    public function software()
    {
        return $this->hasMany(software::class,'software_id','id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
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
    public function part()
    {
        return $this->hasOne(Part::class,'part_id','id');
    }
    public function village()
    {
        return $this->hasOne(Village::class,'village_id','id');
    }
    public function rural()
    {
        return $this->hasOne(Rural::class,'rural_id','id');
    }

}
