<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookStatus;
use App\Models\Course;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.profile')
            ->with('user', User::withCount('books')->find($request->user()->id));
    }

    public function updateUserFields(Request $request)
    {
        $fieldName = $request->field;
        $value = $request->value;
        User::where('id', $request->user()->id)
            ->update([$fieldName => $value]);

        return User::find($request->user()->id);;
    }
    public function changePassword(Request $request)
    {
        $oldPassword = $request->oldPassword;
        $password = $request->newPassword;
        $user = $request->user();
        if (Auth::attempt(['email' => $user->email, 'password' => $oldPassword])) {
            $user->password = Hash::make($password);
            $user->save();
            return response('Successfully changed password', 200);
        } else {
            return response('Failure', 402);
        }
    }

    public function getUserBooks(Request $request)
    {
        $user = $request->user();
        $books = Book::with('publisher', 'course', 'user', 'status')
            ->where('user_id', $user->id)
            ->get();
        $booksAvailable = $books
            ->filter(function ($book) {
                return $book->status_id = 1;
            });

        $publishers = Publisher::all();
        // $statuses = BookStatus::all();
        $courses = Course::all();
        return view('dashboard.userBooks')
            ->with('booksAvailable', $booksAvailable)
            ->with('booksinfo', json_encode(['publishers' => $publishers, 'courses' => $courses]))
            ->with('user', $user);
    }

    public function addUserBook(Request $request)
    {
        $user = $request->user();
        $book = new Book();
        $book->title = $request->title;
        $book->year = $request->year;
        $book->edition_number = $request->edition_number;
        $book->publisher_id = $request->publisher_id;
        $book->course_id = $request->course_id;
        $paymentDetail = [];


        if ($request->sale_active) {
            $book->is_on_sale = 1;
            $paymentDetail['sale'] = ['price' => $request->sale_price];
        }
        if ($request->rent_active) {
            $book->is_on_rent = 1;
            $paymentDetail['rent'] = ['price' => $request->rent_price];
        }
        $book->payment_detail = json_encode($paymentDetail);

        $path = Storage::disk("public")->put("books", $request->file('file'));
        $book->book_cover = $path;
        $book->user_id = $user->id;
        $book->status_id = 1;
        // return $path;
        $book->save();
        $book = Book::with('publisher', 'course', 'user', 'status')->find($book->id);
        return $book;
    }
}
