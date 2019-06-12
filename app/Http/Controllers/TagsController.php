<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class TagsController extends Controller
{

    public function index(Genre $tag)
    {
        $books = $tag->books;
        $books = $books->paginate(1);
        return view('books.index', compact('books'));
    }
}
