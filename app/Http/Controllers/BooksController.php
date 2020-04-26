<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Book;
use Illuminate\Http\Request;


class BooksController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function show(Request $request, $bookId)
    {
        $book = Book::find($bookId);
        return response()->json($book);
    }

    public function showPackages(Request $request, $packageId)
    {
        return Package::with('records')->find($packageId);
    }



    public function store(Request $request)
    {
        $package = new Package;
        $package->name = $request->name;
        $package->publisher = $request->publisher;
        $package->save();
        return $package;
    }

    public function update(Request $request, $bookId)
    {
        $book =  Book::find($bookId);
        $book->name = $request->name;
        $book->save();
        return $book;
    }
}
