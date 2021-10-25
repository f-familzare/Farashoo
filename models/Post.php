<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'post_id';
    protected $guarded = ['post_id'];

	public function category() {
		return $this->belongsTo(Category::class,'post_category');
    }

}
