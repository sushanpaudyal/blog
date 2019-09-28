<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function details($slug){
        $post = Post::where('slug', $slug)->first();
        $randomposts = Post::where('is_approved', 1)->get()->random(3);
        return view ('post', compact('post', 'randomposts'));
    }
}
