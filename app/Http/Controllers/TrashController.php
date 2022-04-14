<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TrashController extends Controller
{
    public function index(){
        $trashPosts = Post::onlyTrashed()->get();
        return view('trash')->with('trashPosts', $trashPosts);
    }

    public function destroyPost($id){
        $post = Post::onlyTrashed()->where('id',$id)->first();

        if($post->user_id !== Auth::User()->id)
            return redirect()->back()->with('response', "Error message: Sorry, you are not allowed to Delete this post.");

        $post->forceDelete();
        return redirect()->back()->with('resp', "Post is Permanently Deleted..");
    }

    public function restorePost($id){
        $post = Post::onlyTrashed()->where('id',$id)->first();

        if($post->user_id !== Auth::User()->id)
            return redirect()->back()->with('response', "Error message: Sorry, you are not allowed to Restore this post.");

        $post->restore();
        return redirect()->back()->with('resp', "Post Restore Successfully..");
    }
}
