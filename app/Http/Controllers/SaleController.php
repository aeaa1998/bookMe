<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        
        $books = Book::where('is_on_sale', 1)->all();

        return view('dashboard.rent')
            ->with('books', $request->books());
    }
}
