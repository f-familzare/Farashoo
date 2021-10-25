<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $primaryKey='part_id';

    protected $fillable=['part_name','region_id'];

}
