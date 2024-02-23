<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {

    }
    public function index(Post $post)
    {
        //posts->comment
        $posts = Post::all();
        return view('index',
        ['posts']=>$posts)
    }
}
