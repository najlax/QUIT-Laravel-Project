<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Http\Requests\UpdateDatasetRequest;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class DatasetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('datasets', [
            'datasets' => Dataset::latest()->simplePaginate(3),
            'tags'=>Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'arabic_title' => ['required','min:3'],
            'english_title' => ['required'],
            'updates' => ['required', Rule::in(['سنوي', 'شهري'])],
            'status' => ['required', Rule::in(['منشور', 'غير منشور'])],
            'tags' => ['nullable'],
        ]);

        //$attributes['featured'] = $request->has('featured');

        $dataset =Auth::user()->datasets()->create(Arr::except($attributes, 'tags'));

        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $dataset->tag($tag);
            }
        }

        return redirect('/index/datasets');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dataset $dataset)
    {
        //$dataset = Dataset::find($id);
        //return view('show',['show'=>$dataset]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dataset $dataset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDatasetRequest $request, Dataset $dataset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dataset $dataset)
    {
        //
    }
}
