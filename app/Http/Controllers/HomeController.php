<?php

namespace App\Http\Controllers;
use App\Models\Store;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('home.index',compact('stores'));
    }

    public function detail(Request $request)
    {
        $store = Store::find($request->id);
        return view('home.detail',compact('store'));
    }
}
