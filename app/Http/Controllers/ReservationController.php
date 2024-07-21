<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create(Store $store)
    {
        return view('user.reservations.create',compact('store'));
    }
    public function store(Request $request, Store $store)
    {
        $request->validate([
            'reservation_date' => 'required|date|after:today',
            'number_of_people' => 'required',
        ]);

        Reservation::create([
            'store_id' =>$store->id,
            'user_id' => Auth::id(),
            'reservation_date' =>$request->input('reservation_date'),
            'number_of_people' =>$request->input('number_of_people'),
        ]);

        return redirect()->route('user.reservations.index')->with('success','予約が完了しました。');
    }

    public function index()
    {
        $reservations = Reservation::where('user_id',Auth::id())->get();
        return view('user.reservations.index',compact('reservations'));
    }

    public function destroy(Reservation $reservation)
{
    // ユーザーがこの予約を作成した本人であることを確認します。
    if ($reservation->user_id != Auth::id()) {
        return redirect()->route('user.reservations.index')->with('error', '不正な操作です。');
    }

    // 予約を削除します。
    $reservation->delete();

    return redirect()->route('user.reservations.index')->with('success', '予約がキャンセルされました。');
}

    
    
}
