<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Store::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
        }

        $stores = $query->paginate(10);
        return view('admin.stores.index',compact('stores'));
    }

   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.stores.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        'description' => 'nullable|string',
        'business_hours' => 'required|string',
        'price' => 'nullable|numeric',
        'postal_code' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'regular_holiday' => 'required|array',
        'category_id' => 'required|exists:categories,id',
    ]);

        $store = new Store();
        $store->name = $request->input('name');
        if($request->hasFile('image')){
            //$image = $request->file('image')->store('public/stores');
            //$store->image = basename($image);
            $imageName = time().'.'.$request->image->extension();
            $image = $request->file('image')->move(public_path('images/stores'), $imageName);
            $store->image = $imageName;
        }else{
            $store->image = "";
        }
        $store->description = $request->input('description');
        $store->business_hours = $request->input('business_hours');
        $store->price = $request->input('price');
        $store->postal_code = $request->input('postal_code');
        $store->address = $request->input('address');
        $store->phone_number = $request->input('phone_number');
        $store->regular_holiday = implode(',', $request->input('regular_holiday'));
        $store->category_id = $request->input('category_id');
        $store->save();

        return to_route('admin.stores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        $dayMapper = [
            'Monday' => '月曜日',
            'Tuesday' => '火曜日',
            'Wednesday' => '水曜日',
            'Thursday' => '木曜日',
            'Friday' => '金曜日',
            'Saturday' => '土曜日',
            'Sunday' => '日曜日',
            'None' => '年中無休'
        ];

        $regular_holidays = is_array($store->regular_holiday) ? $store->regular_holiday : explode(',', $store->regular_holiday);
        $store->regular_holiday_jp = array_map(function($day) use ($dayMapper) {
            return $dayMapper[$day] ?? $day;
        }, $regular_holidays);

        return view('admin.stores.show',compact('store'));
    }

    # これはユーザー側の詳細表示用コントローラで行うべき修正となります。
public function showUserStore(Store $store)
{
    $dayMapper = [
        'Monday' => '月曜日',
        'Tuesday' => '火曜日',
        'Wednesday' => '水曜日',
        'Thursday' => '木曜日',
        'Friday' => '金曜日',
        'Saturday' => '土曜日',
        'Sunday' => '日曜日',
        'None' => '年中無休'
    ];

    $regular_holidays = is_array($store->regular_holiday) ? $store->regular_holiday : explode(',', $store->regular_holiday);
    $store->regular_holiday_jp = array_map(function($day) use ($dayMapper) {
        return $dayMapper[$day] ?? $day;
    }, $regular_holidays);

    return view('home.detail', compact('store', 'reviews'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
{
    $categories = Category::all();
    if (is_string($store->regular_holiday)) {
        $store->regular_holiday = explode(',', $store->regular_holiday);
    } elseif (is_null($store->regular_holiday)) {
        $store->regular_holiday = [];
    }
    return view('admin.stores.edit', compact('store', 'categories'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'nullable|string',
        'business_hours' => 'required|string',
        'price' => 'nullable|numeric',
        'postal_code' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'regular_holiday' => 'required|array',
        'category_id' => 'required|exists:categories,id',
    ]);
    
    $store->name = $request->input('name');
    if($request->hasFile('image')) {
        // 新しい画像がアップロードされた場合、古い画像を削除（必要ならばこの行を追加）
        // \Storage::delete('public/images/' . $store->image);

        $imageName = time().'.'.$request->image->extension();
        $image = $request->file('image')->move(public_path('images/stores'), $imageName);
        $store->image = $imageName;
    }
    $store->description = $request->input('description');
    $store->business_hours = $request->input('business_hours');
    $store->price = $request->input('price');
    $store->postal_code = $request->input('postal_code');
    $store->address = $request->input('address');
    $store->phone_number = $request->input('phone_number');
    $store->regular_holiday = implode(',', $request->input('regular_holiday'));
    $store->category_id = $request->input('category_id');
    $store->save(); // ここをupdateからsaveに変更

    return to_route('admin.stores.index');
}

}
