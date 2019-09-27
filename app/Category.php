<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function post(){
        $this->belongsToMany(Post::class)->withTimestamps();
    }
}