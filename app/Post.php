<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_post')->withTimestamps();
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tag')->withTimestamps();
    }
}

