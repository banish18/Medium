<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::latest()->paginate(5);
        
        return view('admin.posts.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.posts.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'tags' => 'required',
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);

        if($request->hasfile('imageFile')) {
            foreach($request->file('imageFile') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/uploads/', $name);  
                $imgData[] = $name;  
            }
        }
       
    
        Post::create(array_merge($request->all(), ['image' => json_encode($imgData),'user_id' => Auth::user()->id]));
     
        return redirect()->route('posts')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  

        $post = Post::find($id);
        $tags = Tag::all();
        return view('admin.posts.edit',compact('post','tags'));
    }

    public function deletImages(Request $request){
        $post = Post::find($request->id);
        $post->image = json_encode($request->images);
        $post->save();
        return array('status' => 1);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post = Post::find($request->id);
         $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'tags' => 'required'
        ]);
        $imgData = [];
        if($request->pre_images && $request->pre_images != ''){
            foreach ($request->pre_images as $key => $value) {
                 $imgData[] = $value; 
            }
        }
        if($request->hasfile('imageFile')) {
            foreach($request->file('imageFile') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/uploads/', $name);  
                $imgData[] = $name;  
            }
        }
        $images = [];
        if(!empty($imgData)){
            $images = ['image' => json_encode($imgData)];
        }
           
            $request->merge(['image' => json_encode($imgData)]);
        //$this->request->input('image') = $images; 

    
        $post->update($request->all());
    
        return redirect()->route('posts')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $post = Post::find($request->id);
        $post->delete();
    
        return redirect()->route('posts')
                        ->with('success','Post deleted successfully');
    }
}
