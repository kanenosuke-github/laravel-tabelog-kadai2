<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;

class FavoriteController extends Controller
{
    public function store($store_id)
     {
         Auth::user()->favorite_stores()->attach($store_id);
 
         return back();
     }
 
     public function destroy($store_id)
     {
         Auth::user()->favorite_stores()->detach($store_id);
 
         return back();
     }

     public function index()
    {
        $favorites = Auth::user()->favorite_stores()->paginate(10);
        return view('user/favorites', compact('favorites'));
    }

    public function show($store_id)
    {
    $store = Store::findOrFail($store_id);
    return view('user.favoriteshow', compact('store'));
    }
}
