@extends('layouts.app')

@section('content')

<div>
    <h2>新規店舗追加</h2>
</div>
<div>
    <a href="{{route('admin.stores.index')}}">戻るk</a>
</div>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 

<form action="{{route('admin.stores.store')}}" method="POST" enctype="multipart/form-data"> 
    @csrf

    <div>
        <strong>店舗名:</strong>
        <input type="text" name="name" placeholder="店舗名">
    </div>
    <div>
        <strong>店舗画像:</strong>
        <input type="file" name="image" placeholder="店舗画像">
    </div>
    <div>
        <strong>店舗詳細:</strong>
        <textarea name="description" placeholder="店舗詳細"></textarea>
    </div>
    <div>
        <strong>営業時間:</strong>
        <input type="text" name="business_hours" placeholder="営業時間" pattern="^(\d{2}:\d{2}-\d{2}:\d{2}|24時間)$" required>
        <small>例: 09:00-18:00 or 24時間</small>
    </div>
    <div>
        <strong>価格:</strong>
        <input type="number" name="price" placeholder="価格">
    </div>
    <div>
        <strong>郵便番号:</strong>
        <input type="text" name="postal_code" placeholder="郵便番号">
    </div>
    <div>
        <strong>住所:</strong>
        <input type="text" name="address" placeholder="住所">
    </div>
    <div>
        <strong>電話番号:</strong>
        <input type="tel" name="phone_number" placeholder="電話番号">
    </div>
    <div>
    <strong>定休日:</strong><br>
        <input type="checkbox" name="regular_holiday[]" value="Monday"> 月曜日<br>
        <input type="checkbox" name="regular_holiday[]" value="Tuesday"> 火曜日<br>
        <input type="checkbox" name="regular_holiday[]" value="Wednesday"> 水曜日<br>
        <input type="checkbox" name="regular_holiday[]" value="Thursday"> 木曜日<br>
        <input type="checkbox" name="regular_holiday[]" value="Friday"> 金曜日<br>
        <input type="checkbox" name="regular_holiday[]" value="Saturday"> 土曜日<br>
        <input type="checkbox" name="regular_holiday[]" value="Sunday"> 日曜日<br>
        <input type="checkbox" name="regular_holiday[]" value="None"> 年中無休<br>
    </div>
    <div>
        <strong>Category:</strong>
        <select name="category_id">
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>

@endsection