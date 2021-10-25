<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityTime extends Model
{
    protected $primaryKey='activity_time_id';

    protected $fillable=['activity_time_title'];
    public function job()
    {
        return $this->belongsTo(Job::class,'activity_time_id','id');
    }

}
