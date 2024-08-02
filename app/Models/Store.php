<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function favorited_users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    // 追加: 定休日を日本語で返すメソッド
    public function getRegularHolidayJpAttribute()
    {
        $daysOfWeek = [
            'Monday' => '月曜日',
            'Tuesday' => '火曜日',
            'Wednesday' => '水曜日',
            'Thursday' => '木曜日',
            'Friday' => '金曜日',
            'Saturday' => '土曜日',
            'Sunday' => '日曜日',
            'None' => '年中無休',
        ];

        $holidays = explode(',', $this->regular_holiday);
        $japaneseHolidays = array_map(function($holiday) use ($daysOfWeek) {
            return $daysOfWeek[$holiday] ?? $holiday;
        }, $holidays);

        return implode('、', $japaneseHolidays);
    }
    
}
