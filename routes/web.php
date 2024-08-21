<?php

use App\Http\Controllers\DatasetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Models\Dataset;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('/index/datasets', function(){
//     return view('datasets');
// });



Route::get('/index/datasets',[DatasetController::class, 'index']);
Route::get('/index/tags',[TagController::class,'index']);

Route::get('/index/tags/{tag:name}',TagController::class);

Route::get('/index/tags/{tag:name}/edit',function(Tag $tag){
    return view('edit-tag',['tag'=>$tag]);
});
Route::patch('/index/tags/{tag:name}',function(Tag $tag){
    $attributes= request()->validate([
        'name' => ['required','min:3'],
    ]);


    $tag->update([
        'name'=>request('name'),
    ]);

    return redirect('/index/tags');
});

Route::delete('index/tags/{tag:name}',function(Tag $tag){
    $tag->delete();

    return redirect('/index/tags');
});
 
Route::get('/index/datasets/create',[DatasetController::class, 'create']);

Route::get('/index/datasets/{dataset}',function(Dataset $dataset){
    return view('datashow',['dataset'=>$dataset]);
});

Route::post('/index/datasets',[DatasetController::class, 'store']);

//Route::get('/index/datasets/{id}',[DatasetController::class],'show');


Route::get('/index/datasets/{dataset}/edit',function(Dataset $dataset){
    return view('editdata',['dataset'=>$dataset]);
});

Route::patch('/index/datasets/{dataset}',function(Dataset $dataset){
    $attributes= request()->validate([
        'arabic_title' => ['required','min:3'],
        'english_title' => ['required'],
        'updates' => ['required', Rule::in(['سنوي', 'شهري'])],
        'status' => ['required', Rule::in(['منشور', 'غير منشور'])],
        'tags' => ['nullable'],
    ]);


    $dataset->update(Arr::except($attributes, 'tags'));

    // Update the tags for the dataset, if provided
    if ($attributes['tags'] ?? false) {
        // Split the tags into an array if they are provided as a string (comma-separated)
        $tagsArray = explode(',', $attributes['tags']);
        
        // Sync the dataset's tags in the pivot table
        $dataset->tags()->sync($tagsArray);  // Sync will update the pivot table
    }

    return redirect('/index/datasets');
});

Route::delete('index/datasets/{dataset}',function(Dataset $dataset){
    $dataset->delete();

    return redirect('/index/datasets');
});