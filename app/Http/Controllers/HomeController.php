<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use Auth;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->admin)
        {
            $post_count = Post::all()->count();
        }
        else
        {
            $user_id = Auth::id();
            $post_count = Post::where('user_id', $user_id)->get()->count();
        }
        return view('admin.dashboard')
            ->with('post_count', $post_count)
            ->with('trashed_post_count', Post::onlyTrashed()->get()->count())
            ->with('categories_count', Category::all()->count())
            ->with('user_count', User::all()->count());
    }
}
