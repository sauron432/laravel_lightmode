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
        $request->validate(['title' => ['required','min:5'],'description' => ['required',"min:10"]]);
        try
        {
        $this->model->create(['title' => $request->title,'description' => $request->description,]);
        return redirect()->route('post.view')->with('success', 'Post added successfully');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withInput()->withErrors;
        }
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
        $post->update(['title' => $req->input('title'),'description' => $req->input('description'),]);
        return redirect()->route('post.view')->with('success', 'Post updated Successfully');
    }
}