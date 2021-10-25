<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $primaryKey='salary_id';

    protected $fillable=['salary_title'];
    public function job()
    {
        return $this->belongsTo(Job::class,'salary_id','id');
    }
}
