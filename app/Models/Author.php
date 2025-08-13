<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = "authors";
    protected $fillable = [
        'name'
    ];

    // relation to books table
    public function books()  {
        return $this->hasMany(Book::class);
    }

    // relation to get rating from book model
    public function ratings()
    {
        return $this->hasManyThrough(Rating::class, Book::class);
    }
}
