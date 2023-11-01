<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function show(){
        $post = new Post();
        $post->all();
        
        dd($post);
        return view('home', compact('post'));
    }
}
