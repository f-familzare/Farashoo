<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DegreeOfEducation extends Model
{
    protected $table='degree_of_educations';
    protected $primaryKey='degree_of_education_id';

    protected $fillable=['degree_of_education_title'];

    public function Academy()
    {
        return $this->belongsTo(Academy::class,'id','degree_of_education_id');
    }
}
