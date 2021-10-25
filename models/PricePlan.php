<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PricePlan extends Model
{
    protected $table="price_plans";
    protected $fillable=["plan_name","features","price","tag_id","link"];
}
