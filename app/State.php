<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    protected $primaryKey='state_id';
    protected $fillable = ['state_name'];

    public function account()
    {
        return $this->belongsTo(Account::class,'','id','state_id');
    }
    public function rezume()
    {
        return $this->belongsToMany(Rezume::class,'','id','state_id');
    }
}
