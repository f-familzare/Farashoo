<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $primaryKey='city_id';

    protected $fillable=['city_name','state_id'];
    public function account()
    {
        return $this->belongsTo(Account::class,'','id','city_id');
    }
    public function rezume()
    {
        return $this->belongsToMany(Rezume::class,'','id','city_id');
    }
}
