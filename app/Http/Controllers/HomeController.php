<?php

namespace App\Http\Controllers;
use App\Models\Store;
use App\Models\Review;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('home.index',compact('stores'));
    }

    public function result(Request $request)
    {
        //$request->input('keyword');
        $stores = Store::all();
        return view('home.index',compact('stores'));
    }

    public function detail($id)
    {
        $store = Store::findOrFail($id);
        $reviews = Review::where('store_id',$id)->get();
        return view('home.detail',compact('store','reviews'));
    }
}
