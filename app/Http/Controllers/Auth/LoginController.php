<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	 */

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = RouteServiceProvider::HOME;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	public function login(Request $request)
	{
		// title_book //columan2

		$request->validate([
			'email'    => 'required|email',
			'password' => 'required',
		]);
		$userCredentials = $request->only('email', 'password');

		if (Auth::attempt($userCredentials)) {
			session()->put('user_id', User::where('email', $request->email)->first()->id);

			return response()->json(["Authenticated"], 200);
		} else {
			return response()->json(["Invalid Credentials"], 411);
		}
	}

	public function logout()
	{
		session()->flush();
		return view('auth.login');
	}
}
