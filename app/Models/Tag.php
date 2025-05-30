<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $guarded = [];

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class);
    }

    public function posts(): BelongsToMany {
        return  $this->belongsToMany(Post::class);
    }
}
