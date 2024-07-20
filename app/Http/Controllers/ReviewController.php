<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($storeId)
    {
        $store = Store::findOrFail($storeId);
        $reviews = $store->reviews;

        return view('home.detail', compact('store', 'reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */

     // 投稿フォームを表示するためのメソッド
    public function create($id)
    {
        $store = Store::findOrFail($id);
        return view('home.review', compact('store'));
    }

    // レビューを保存するためのメソッド
    public function store(Request $request, $storeId)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        Review::create([
            'store_id' => $storeId,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return redirect()->route('home.detail', ['id' => $storeId]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
