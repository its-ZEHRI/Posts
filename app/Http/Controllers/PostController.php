<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(('auth'));
    }

    /** * @return \Illuminate\Http\Response */

    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('post')->with('posts',$posts);
    }

    /** * @return \Illuminate\Http\Response */

    public function post($id)
    {
      $post =  Post::find($id);
      return view('viewPost')->with('post',$post);
    }

    /** * @param  int  $id
        * @return \Illuminate\Http\Response */

    public function updatePost(Request $req)
    {
        $req->validate([
            'title'     => 'required',
            'body'      => 'required | max:2000',
        ]);
        $post = Post::find($req->id);

        if($req->input('id') !== $post->id )
           return redirect('dashboard')->with('response','Error message: Sorry, you are not allowed to edit this post.');

        $post->title    = $req->title;
        $post->body     = $req->body;
        // $post->author   = Auth::User()->name;
        // $post->user_id  = Auth::User()->id;
        $post->save();
        return redirect('dashboard')->with('resp','Post Update Successfully...');
    }


    public function Editpage($id)
    {
        $post = Post::find($id);
        if(Auth::User()->id == $post->user_id)
            return view('updatepost')->with('post',$post);
        return redirect('dashboard')->with('response','You cannot Edit this Post...');
    }

    /** * @param  int  $id
        * @return \Illuminate\Http\Response */

    public function deletePost($id)
    {
        $post = Post::find($id);
        if($post->user_id !== Auth::User()->id)
            return redirect('dashboard')->with('response','Error message: Sorry, you are not allowed to Delete this post.');

        $post->delete();
        return redirect('dashboard')->with('resp','Post Deleted Successfully');
    }
}
