<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class HomeController extends Controller
{
    //
    public function __construct(){
    }
    public function index(){

        $data['posts'] = Post::with(['comments'])->all();
        return view ('index', $data);
    }
}
