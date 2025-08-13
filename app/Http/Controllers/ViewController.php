<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Services\BookService;
use App\Services\AuthorService;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
     protected BookService $bookService;
     protected AuthorService $authorService;

    public function __construct(BookService $bookService, AuthorService $authorService) {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    public function index(Request $request) {
        $books = $this->bookService->getFilteredBooks($request); // call service

        return view('pages.home', compact('books'));
    }

    public function toplist()  {
        $authors = $this->authorService->getTopFamousAuthors(); // call service

        return view('pages.toplist', compact('authors'));
    }

    public function rating()  {
        $authors = Author::orderBy('name')->get();

        return view('pages.rating', compact('authors'));
    }
}
