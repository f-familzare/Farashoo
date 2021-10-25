<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $primaryKey = 'major_id';
    protected $fillable = ['major_id', 'major_title'];
    public $timestamps = false;
    public function Academy()
    {
        return $this->belongsTo(Academy::class,'id','major_id');
    }
}
