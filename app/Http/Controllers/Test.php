<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class Test extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(1);

        // Creating a token without scopes...
        $token = $user->createToken('PersonalAccess')->accessToken;

        // Creating a token with scopes...
        $token = $user->createToken('wsDiQ5m0TtN0nAe2Zmz8DvgHGOEkx7OwNuehYYHN', ['place-orders'])->accessToken;
    }
}
