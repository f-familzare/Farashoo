<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $primaryKey='region_id';

    protected $fillable=['region_name','city_id'];
    public function account()
    {
        return $this->belongsTo(Account::class,'','id','region_id');
    }
    public function rezume()
    {
        return $this->belongsToMany(Rezume::class,'','id','region_id');
    }
}
