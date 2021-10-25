<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class software extends Model
{
    protected $primaryKey='software_id';
    protected $fillable=['rezume_id','software_title','software_level'];
    public function rezume()
    {
        return $this->belongsTo(Rezume::class,'id','software_id');
    }
}
