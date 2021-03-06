<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index(Request $request)
    {
        $hasQuery = false;
        if (request()->has('query')) {
            if (request()->get('query') != '') {
                $hasQuery = true;
            }
        }
        $books = Book::with('publisher', 'course', 'user', 'status')
            ->where('is_on_rent', 1)
            ->where('status_id', 1)
            ->where('user_id', '!=', $request->user()->id)
            ->when($hasQuery, function ($query) {
                $queryString = request()->get('query');
                return $query->where('title', 'like', "%{$queryString}%");
            })
            ->paginate(12)
            ->appends(['dataOnly' => 'true']);
        // dd($books->items());
        if (request()->has('dataOnly')) {
            return response()->json([
                'books' => $books,
            ]);
        }
        return view('dashboard.rent')
            ->with('books', json_encode($books));
    }

    public function rentBook(Request $request)
    {
        $book = Book::find($request->id);
        $book->is_on_rent = 0;
        $book->is_on_sale = 0;
        $book->status_id = 2;
        $book->save();

        $book = Book::with('publisher', 'course', 'user', 'status')
            ->find($request->id);

        return $book;
    }
}
