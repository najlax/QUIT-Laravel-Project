<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Dataset;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
     {
         return view('tags',[
             'tags' => Tag::simplePaginate(3),
         ]);
     }

     public function __invoke(Tag $tag)
     { 
         return view('results',['datasets'=>$tag->datasets]);
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tag $tag)
    {
        return view('createtag', ['tag'=>$tag]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
        ]);

        $tag = Tag::create($attributes);


        return redirect('/index/tags');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
