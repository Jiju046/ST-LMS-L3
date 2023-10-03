<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\DataTables\BooksDataTable;

class BookController extends Controller
{
    
    public function index(BooksDataTable $dataTable)
    {
        return $dataTable->render('books.index');
    }

    public function create()
    {
        $book = new Book();
        return view('books.create', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('books.show', compact('book'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'available_days' => 'required|array', // Ensure it's an array
            'available_days.*' => 'in:Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', // Validation for each available day
        ]);

        $book = new Book([
            'title' => $request->input('title'),
            'available_days' => implode(',', $request->input('available_days')), // Convert array to comma-separated string
        ]);

        $book->save();

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'available_days' => 'required|array', // Ensure it's an array
            'available_days.*' => 'in:Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', // Validation for each available day
        ]);

        $book->update([
            'title' => $request->input('title'),
            'available_days' => implode(',', $request->input('available_days', [])), // Convert array to comma-separated string
        ]);

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }


    

    public function destroy(Book $book, Request $request)
    {
        $book->delete();

        if ($request->ajax()) {
            return response()->json(['message' => 'Book deleted successfully']);
        }

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}

