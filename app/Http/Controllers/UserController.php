<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        return view('user.show');
    }

    public function favorites()
    {
        $favorites = Auth::user()->favorite_stores()->paginate(10);
        return view('user.favorites', compact('favorites'));
    }
}