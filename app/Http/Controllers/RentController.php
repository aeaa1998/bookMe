<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::with('publisher', 'course', 'user', 'status')
            ->where('is_on_rent', 1)
            ->where('status_id', 1)
            ->limit(12)
            ->get();
        // ->paginate(20);
        // dd($books->items());
        return view('dashboard.rent')->with('books', $books);
    }
}
