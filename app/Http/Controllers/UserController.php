<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        return view('user.show');
    }

    public function favorites()
    {
        return view('user.favorites');
    }
}
