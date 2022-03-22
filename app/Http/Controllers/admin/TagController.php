<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tag::latest()->paginate(5);
    
        return view('admin.tags.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'name' => 'required',
            'description' => 'required'
        ]);
    
        Tag::create($request->all());
     
        return redirect()->route('tags')
                        ->with('success','Tag created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $Tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $Tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $tag = Tag::find($id);
        return view('admin.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $Tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $Tag = Tag::find($request->id);
         $request->validate([
            'name' => 'required'
        ]);
       
        $Tag->update($request->all());
    
        return redirect()->route('tags')
                        ->with('success','Tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $Tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $tag = Tag::find($request->id);
        $tag->delete();
    
        return redirect()->route('tags')
                        ->with('success','Tag deleted successfully');
    }
}
