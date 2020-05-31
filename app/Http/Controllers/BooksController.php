<?php

namespace App\Http\Controllers;

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
	public function store(Request $request)
	{
	}

	public function update(Request $request, $bookId)
	{
		$book       = Book::find($bookId);
		$book->name = $request->name;
		$book->save();

		return $book;
	}
}
