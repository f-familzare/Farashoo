<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = ['user_id','phone','social_network', 'business_status','activity_id', 'street', 'explanation', 'avatar', 'state_id', 'city_id', 'region_id', 'part_id', 'village_id', 'rural_id', 'action','map'];
    protected $guarded = ['id'];
    protected $casts=[
        'social_network'=>'array',
        'phone'=>'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function state()
    {
        return $this->hasOne(State::class,'state_id','id');
    }
}
