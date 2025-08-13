<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class BookService
{
    public function getFilteredBooks(Request $request): LengthAwarePaginator
    {
        $query = Book::with('author', 'categories')
                 ->withAvg('ratings', 'rating')
                 ->withCount('ratings');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhereHas('author', function($q_author) use ($search) {
                      $q_author->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $query->orderBy('ratings_avg_rating', 'desc');

        $perPage = $request->input('item', 10);

        return $query->paginate($perPage);
    }
}
