<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function create(Store $store)
    {
        return view('user.reservations.create',compact('store'));
    }
    public function store(Request $request, Store $store)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'reservation_date' => 'required|date|after:today',
            'number_of_people' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('user.reservations.create', $store->id)
                ->withErrors($validator)
                ->withInput();
        }

        $reservationDate = Carbon::parse($request->input('reservation_date'));
         
        // 営業時間の確認
         if (trim($store->business_hours) !== '24時間') {
            // 営業時間のフォーマットチェックと解析
             $businessHours = explode('-', $store->business_hours);
             if (count($businessHours) !== 2) {
                 return redirect()
                     ->route('user.reservations.create', $store->id)
                     ->withErrors(['reservation_date' => 'ビジネスアワーのフォーマットが正しくありません。'])
                     ->withInput();
             }
 
             // フォーマットの確認
             try {
                 $openTime = Carbon::createFromFormat('H:i', trim($businessHours[0]))->setDateFrom($reservationDate);
                 $closeTime = Carbon::createFromFormat('H:i', trim($businessHours[1]))->setDateFrom($reservationDate);
                // 閉店時間が午前0時を過ぎる場合の処理
            if ($closeTime->lessThan($openTime)) {
                $closeTime->addDay();
            }
                } catch (\Exception $e) {
                 return redirect()
                     ->route('user.reservations.create', $store->id)
                     ->withErrors(['reservation_date' => 'ビジネスアワーのフォーマットが正しくありません。'])
                     ->withInput();
             }
 
             $reservationTime = $reservationDate->format('H:i');
             if ($reservationTime < $openTime->format('H:i') || $reservationTime > $closeTime->format('H:i')) {
                 return redirect()
                     ->route('user.reservations.create', $store->id)
                     ->withErrors(['reservation_date' => '予約日時は営業時間内で指定してください。'])
                     ->withInput();
         }
        }

    // 定休日の確認
    if (trim($store->regular_holiday) !== '年中無休') {
        $dayOfWeekJapanese = [
            'Sunday' => '日曜日',
            'Monday' => '月曜日',
            'Tuesday' => '火曜日',
            'Wednesday' => '水曜日',
            'Thursday' => '木曜日',
            'Friday' => '金曜日',
            'Saturday' => '土曜日',
        ];

    $dayOfWeek = $reservationDate->format('l');
    $regularHoliday = explode(',', $store->regular_holiday);
    
    if (in_array($dayOfWeek, $regularHoliday)) {
        return redirect()
            ->route('user.reservations.create', $store->id)
            ->withErrors(['reservation_date' => '予約日は定休日を避けてください。'])
            ->withInput();
    }
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
