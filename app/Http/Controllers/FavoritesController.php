<?php

namespace App\Http\Controllers;

use App\Book;
use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function store(Book $book)
    {
        $book->favorite();

        return back();
    }
}
