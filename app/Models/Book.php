<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "books";
    protected $fillable = [
        'author_id',
        'title',
        'description'
    ];

    // relation to author table
    public function author()  {
        return $this->belongsTo(Author::class);
    }

    // relasi to category
    public function categories()  {
        return $this->belongsToMany(Category::class);
    }

    // relation to ratings table
    public function ratings()  {
        return $this->hasMany(Rating::class);
    }
}
