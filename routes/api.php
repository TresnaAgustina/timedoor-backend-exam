<?php

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/authors/{author}/books', function (Author $author) {
    // get id and book title for dropdown menu
    return response()->json($author->books()->select('id', 'title')->get());
});
