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

        $data['posts'] = Post::with(['comment' => function($comment){
            $comment->orderBy('created_at', 'asc');
        }])->get();
        return view ('index', $data);
    }
}
