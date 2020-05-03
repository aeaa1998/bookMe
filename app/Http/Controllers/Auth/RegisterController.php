<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Register Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	 */

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = RouteServiceProvider::HOME;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest');
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function create(Request $request) {
		$request->validate([
			'email'          => 'required|email|unique:App\Models\User,email',
			'password'       => 'required',
			'license_number' => 'required|unique:App\Models\User,license_number',
			'phone_number'   => 'required|unique:App\Models\User,phone_number',
			'last_name'      => 'required',
			'first_name'     => 'required',
		]);
		$user                 = new User();
		$user->last_name      = $request->last_name;
		$user->first_name     = $request->first_name;
		$user->email          = $request->email;
		$user->license_number = $request->license_number;
		$user->phone_number   = $request->phone_number;
		$user->password       = Hash::make($request->password);
		$user->save();

		return response()->json(["message", "successfully created"]);
	}
}
