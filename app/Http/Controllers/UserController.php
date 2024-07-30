<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show()
    {
        return view('user.show');
    }

    public function edit()
    {
        return view('user.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('user.show')->with('status', '会員情報が更新されました');
    }

    public function favorites()
    {
        $favorites = Auth::user()->favorite_stores()->paginate(10);
        return view('user.favorites', compact('favorites'));
    }
}