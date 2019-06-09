<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $books = Book::latest();
        if ($username = request('by')) {
            $user = \App\User::where('name', $username)->firstOrFail();
            $books->where('user_id', $user->id);
        }
        $books = $books->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Genre::all();

        return view('books.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Book::create([
            'genre_id' => request('tag_id'),
            'title' => request('title'),
            'author_name' => request('author_name'),
            'publisher_name' => request('publisher_name'),
            'publication_date' => request('publication_date'),
            'edition' => request('edition'),
            'available_quantity' => request('available_quantity'),
            'price' => request('price'),
            'img' => request()->file('img')->store('book_cover', 'public'),
            'description' => request('description'),
            'user_id' => auth()->id()
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $reviews = $book->reviews()->latest()->get();
        return view('books.show', compact('book', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
