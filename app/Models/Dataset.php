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

        $this->tags->attach($tag->id);

    }

    public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'dataset_tag');
    }
}
