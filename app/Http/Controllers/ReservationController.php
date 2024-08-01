<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
            'number_of_people' => 'required|integer|min:1',
        ]);

        $reservationDate = Carbon::parse($request->input('reservation_date'));
        // 営業時間を解析
        $businessHours = explode('-', $store->business_hours);
        $openTime = Carbon::createFromFormat('H:i', trim($businessHours[0]));
        $closeTime = Carbon::createFromFormat('H:i', trim($businessHours[1]));

    // 定休日チェック
    $regularHoliday = explode(',', $store->regular_holiday);
    if (in_array($reservationDate->format('l'), $regularHoliday)) {
        return back()->withErrors(['reservation_date' => '選択された日は定休日です。']);
    }

   // 営業時間のチェック
   $reservationTime = $reservationDate->format('H:i');
   if ($reservationTime < $openTime->format('H:i') || $reservationTime > $closeTime->format('H:i')) {
       return back()->withErrors(['reservation_date' => '営業時間外には予約できません。']);
   }

   Reservation::create([
       'store_id' => $store->id,
       'user_id' => Auth::id(),
       'reservation_date' => $request->input('reservation_date'),
       'number_of_people' => $request->input('number_of_people'),
   ]);

   return redirect()->route('user.reservations.index')->with('success', '予約が完了しました。');
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
