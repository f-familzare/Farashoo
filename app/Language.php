<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $primaryKey='language_id';
    protected $fillable=['rezume_id','language_title','language_level'];
    public function rezume()
    {
        return $this->belongsTo(Rezume::class,'id','language_id');
    }
}
