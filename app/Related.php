<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Related extends Model
{
    protected $primaryKey="related_id";
    protected $fillable=["related_title"];

    public function contact()
    {
        return $this->hasOne(Related::class,'related_id','id');
    }
}
