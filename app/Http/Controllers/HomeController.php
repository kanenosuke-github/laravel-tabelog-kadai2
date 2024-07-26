<?php

namespace App\Http\Controllers;
use App\Models\Store;
use App\Models\Review;
use App\Models\Category; // 
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $stores = Store::with('category')->get();
        $categories = Category::all();
        return view('home.index',compact('stores', 'categories'));
    }

    public function result(Request $request)
    {
        $keyword = $request->input('keyword');
        $category_id = $request->input('category_id');

        $query = Store::query();

        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        if ($category_id) {
            $query->where('category_id', $category_id);
        }
        $stores = $query->with('category')->get();
        $categories = Category::all();

        return view('home.index',compact('stores', 'categories'));
    }

    public function detail($id)
    {
        $store = Store::findOrFail($id);
        $reviews = Review::where('store_id',$id)->get();
        return view('home.detail',compact('store','reviews'));
    }
}
