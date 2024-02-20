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
            return redirect()->back()->withInput()->withErrors(['error'=>'There is an issue making post. Please contact admin.']);
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
        $post->update(['title' => $req->input('title'),'description' => $req->input('description'),]);
        try
        {
            $req->validate(['title' => ['required','min:5'],'description' => ['required','min:5']]);
            return redirect()->route('post.view')->with('success', 'Post updated Successfully');
        }
        catch(\Exception $e)
        {
            return redirect()->route('post.create')->with('error','Post not updated');
        }
    }
    public function destroy($postid) 
    {
        $deleted = Post::find($postid)->delete();
        if($deleted)
        {
            $msg = array(
            'status'=>true,
            'message'=>'Post deleted'
        );
        }
        else
        {
            $msg = array(
                'status'=>false,
                'message'=>'Post not deleted'
            );
        }
        return json_encode($msg);
    }
}