<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    protected $table='contact_forms';
    protected $fillable=['name','phone','related_id','request','email'];

    public function relatedTo()
    {
        return $this->belongsTo(Related::class,'id','related_id');
    }

}
