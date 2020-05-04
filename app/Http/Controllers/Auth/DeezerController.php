<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class DeezerController extends Controller
{

    public function search(Request $request, $title, $artist)
    {
        // $deezer = new Deezer();
        // $results = $deezer->artist($artist) // string
        //     ->album() // string
        //     ->track($title) // string
        //     ->search();
    }
}
