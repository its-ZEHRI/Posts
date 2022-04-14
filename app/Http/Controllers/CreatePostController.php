<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CreatePostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /** * @return \Illuminate\Http\Response */

    public function index(){
        return view('createpost');
    }

    /** * @return \Illuminate\Http\Response*/
    public function create(Request $req)
    {
        $req->validate([
            'title'    => 'required',
            'body'     => 'required | max:2000',
        ]);

        $post = new Post;
        $post->title = $req->input('title');
        $post->body = $req->input('body');
        $post->author = Auth::User()->name;
        $post->user_id = Auth::User()->id;
        $post->save();
        return redirect('dashboard')->with('resp','Post Created Successfully..');
    }

}
