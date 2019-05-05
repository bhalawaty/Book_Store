<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Genre $tag)
    {
        $books = $tag->books;
        return view('books.index', compact('books'));
    }
}
