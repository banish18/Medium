<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::count();
    
        return view('admin.dashboard',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function logout(Request $request) {
      Auth::logout();
      return redirect('/login');
    }
}
