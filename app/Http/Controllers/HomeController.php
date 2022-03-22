<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Post::latest()->paginate(10);
        $tags = Tag::all();
        return view('home',compact('data','tags'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function post($slug){
        $data = Post::where('slug',$slug)->first();
        return view('post',compact('data'));
    }

    public function tag($id){
        $tag = Tag::find($id);
        $data = Post::where('tags',$id)->get();
        return view('tag',compact('data','tag'));
    }
}
