<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table="tags";
    protected $fillable=["title"];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function article()
    {
        return $this->belongsToMany(Article::class);        
    }
}
