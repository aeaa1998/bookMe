<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.profile')
            ->with('user', $request->user()->withCount('books')->first());
    }

    public function updateUserFields(Request $request)
    {
        $fieldName = $request->field;
        $value = $request->value;
        User::where('id', $request->user()->id)
            ->update([$fieldName => $value]);
        return $request->user()->first();
    }
    public function changePassword(Request $request)
    {
        $oldPassword = $request->oldPassword;
        $password = $request->newPassword;
        $user = $request->user()->first();
        if (Auth::attempt(['email' => $user->email, 'password' => $oldPassword])) {
            $user->password = Hash::make($password);
            $user->save();
            return response('Successfully changed password', 200);
        } else {
            return response('Failure', 402);
        }
    }
}
