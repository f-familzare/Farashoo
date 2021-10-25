<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $primaryKey='activity_id';
    protected $fillable=['activity_title'];
    public function job()
    {
        return $this->belongsTo(Job::class,'activity_id','id');
    }

}
