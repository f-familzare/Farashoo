<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $primaryKey='skill_id';

    protected $fillable=['rezume_id','skill_title','skill_level'];
    public function rezume()
    {
        return $this->belongsTo(Rezume::class,'skill_id','id');
    }
}
