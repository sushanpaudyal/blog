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

    public function favorite_to_users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', 1);
    }
    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }
}

