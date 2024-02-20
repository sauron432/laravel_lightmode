<?php
namespace App\Http\Controllers;
use App\Models\post;
use Illuminate\Http\Request;
class PostController extends Controller
{
    public function __construct(Post $post)
    {
        $this->model = $post;
    }
    public function view()
    {
        return view('posts.list', ['posts' => Post::all(),]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $request->validate(['title' => 'required','description' => 'required',]);
        $this->model->create(['title' => $request->title,'description' => $request->description,]);
        return redirect()->route('post.view')->with('success', 'Post added successfully');
    }
    public function edit($postid)
    {
        $post = post::find($postid);
        if (!$post) 
        {
            return redirect()->route('post.view')->with('error', 'Post not found');
        }
        return view('posts.edit', ['post' => $post]);
    }
    public function update(Request $req, $postid)
    {
        $post = post::find($postid);
        if (!$postid) 
        {
            return redirect()->route('post.view')->with('error', 'Post not found');
        }
        $req->validate(['title' => 'required','description' => 'required',]);
/* The line `->update(['title' => ->input('title'),'description' =>
->input('description'),]);` is updating the title and description of the post with the values
provided in the request. It is using the `update` method of the `Post` model to update the database
record with the new values. */
        $post->update(['title' => $req->input('title'),'description' => $req->input('description'),]);
        return redirect()->route('post.view')->with('Update', 'Post updated Successfully');
    }
}