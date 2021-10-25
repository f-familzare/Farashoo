<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkReport extends Model
{
    public $table="work_reports";
    protected $fillable=["description","report","file","user_id","role_id","related_to"];
}
