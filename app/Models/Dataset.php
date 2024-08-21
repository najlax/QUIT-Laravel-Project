<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Arr;

class Dataset extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tag(string $name): void
    {
        $tag = Tag::firstOrCreate(['name'=>$name]);

        $this->tags->attach($tag);

    }

    public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public static function find($id)
    {
        $dataset =Arr::first(static::all(),fn($dataset)=>$dataset['id']=$id);

        if(! $dataset){
            abort(404);
        }
       return $dataset;
    }
}
