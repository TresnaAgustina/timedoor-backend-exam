<?php

namespace App\Services;

use App\Models\Author;

class AuthorService
{
    public function getTopFamousAuthors(){
        // using withCount for counting voter
        return Author::withCount(['ratings' => function ($query) { $query->where('rating', '>', 5); }])
                        ->orderBy('ratings_count', 'desc')
                        ->take(10)
                        ->get();
    }
}
