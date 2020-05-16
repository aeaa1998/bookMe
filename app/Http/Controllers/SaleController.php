<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SaleController extends Controller
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
            ->where('is_on_sale', 1)
            ->where('status_id', 1)
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

        return view('dashboard.sales')
            ->with('books', json_encode($books));
    }

    public function buyBook(Request $request)
    {
        $book = Book::find($request->id);
        $book->is_on_rent = 0;
        $book->is_on_sale = 0;
        $book->status_id = 3;
        $book->save();

        $book = Book::with('publisher', 'course', 'user', 'status')
        ->find($request->id);

        return $book;
    }
}
