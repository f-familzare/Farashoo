<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cooperation extends Model
{
    protected $primaryKey='cooperation_id';

    protected $fillable=['cooperation_title'];
    public function job()
    {
        return $this->belongsTo(Job::class,'id','cooperation_id');
    }

}
