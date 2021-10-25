<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rural extends Model
{
    protected $primaryKey='rural_id';

    protected $fillable=['rural_name','village_id'];

}
