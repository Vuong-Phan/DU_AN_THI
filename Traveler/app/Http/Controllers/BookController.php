<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request -> validate(['book_name' =>'required | max:255', 'isbn_no' =>'required | alpha_num', 'book_price' => 'required | numeric']);
        $book = Book::create($validatedData);
        return redirect('/book') -> wwith('success', 'Luu thanh cong');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request -> validate(['book_name' => 'required | max: 255','isbn_no' =>'required | alpha_num', 'book_price' => 'required | numeric']);
        Book::whereId($id) -> update($validatedData);
        return redirect('/book') -> with('success', '   CAP NHAT THANH CONG');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book -> deleted();
        return redirect('/book') -> with('success', 'Xoa thanh cong');
    }
}
