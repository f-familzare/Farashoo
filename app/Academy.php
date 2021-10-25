<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    protected $fillable = ['degree_of_education_id','major_id','collage_name','education_status','start_date','end_date','mark'];
//'rezume_id',
    public function rezume()
    {
        return $this->belongsTo(Rezume::class);
    }
    public function degreeOfEducation()
    {
        return $this->hasOne(DegreeOfEducation::class,'degree_of_education_id','id');
    }

    public function major()
    {
        return $this->hasOne(Major::class,'major_id','id');
    }
}
