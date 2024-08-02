@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center my-4">店舗編集</h2>
            <div class="text-center mb-4">
                <a href="{{route('admin.stores.index')}}" class="btn btn-secondary">戻る</a>
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

            <form action="{{route('admin.stores.update', $store->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name"><strong>店舗名:</strong></label>
                    <input type="text" id="name" name="name" class="form-control" value="{{$store->name}}" placeholder="店舗名">
                </div>

                <div class="form-group">
                    <label for="image"><strong>店舗画像:</strong></label>
                    <input type="file" id="image" name="image" class="form-control" placeholder="店舗画像">
                </div>

                <div class="form-group">
                    <label for="description"><strong>店舗詳細:</strong></label>
                    <textarea id="description" name="description" class="form-control" placeholder="店舗詳細">{{$store->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="business_hours"><strong>営業時間:</strong></label>
                    <input type="text" id="business_hours" name="business_hours" class="form-control" value="{{$store->business_hours}}" placeholder="営業時間" pattern="^(\d{2}:\d{2}-\d{2}:\d{2}|24時間)$" required>
                    <small>例: 09:00-18:00 or 24時間</small>
                </div>

                <div class="form-group">
                    <label for="price"><strong>価格:</strong></label>
                    <input type="number" id="price" name="price" class="form-control" value="{{$store->price}}" placeholder="価格">
                </div>

                <div class="form-group">
                    <label for="postal_code"><strong>郵便番号:</strong></label>
                    <input type="text" id="postal_code" name="postal_code" class="form-control" value="{{$store->postal_code}}" placeholder="郵便番号">
                </div>

                <div class="form-group">
                    <label for="address"><strong>住所:</strong></label>
                    <input type="text" id="address" name="address" class="form-control" value="{{$store->address}}" placeholder="住所">
                </div>

                <div class="form-group">
                    <label for="phone_number"><strong>電話番号:</strong></label>
                    <input type="tel" id="phone_number" name="phone_number" class="form-control" value="{{$store->phone_number}}" placeholder="電話番号">
                </div>

                <div class="form-group">
                    <label for="regular_holiday"><strong>定休日:</strong></label><br>
                    @php
                        $regular_holidays = is_array($store->regular_holiday) ? $store->regular_holiday : ($store->regular_holiday ? explode(',', $store->regular_holiday) : []);
                    @endphp
                    <input type="checkbox" name="regular_holiday[]" value="Monday" {{ in_array('Monday', $regular_holidays) ? 'checked' : '' }}> 月曜日<br>
                    <input type="checkbox" name="regular_holiday[]" value="Tuesday" {{ in_array('Tuesday', $regular_holidays) ? 'checked' : '' }}> 火曜日<br>
                    <input type="checkbox" name="regular_holiday[]" value="Wednesday" {{ in_array('Wednesday', $regular_holidays) ? 'checked' : '' }}> 水曜日<br>
                    <input type="checkbox" name="regular_holiday[]" value="Thursday" {{ in_array('Thursday', $regular_holidays) ? 'checked' : '' }}> 木曜日<br>
                    <input type="checkbox" name="regular_holiday[]" value="Friday" {{ in_array('Friday', $regular_holidays) ? 'checked' : '' }}> 金曜日<br>
                    <input type="checkbox" name="regular_holiday[]" value="Saturday" {{ in_array('Saturday', $regular_holidays) ? 'checked' : '' }}> 土曜日<br>
                    <input type="checkbox" name="regular_holiday[]" value="Sunday" {{ in_array('Sunday', $regular_holidays) ? 'checked' : '' }}> 日曜日<br>
                    <input type="checkbox" name="regular_holiday[]" value="None" {{ in_array('None', $regular_holidays) ? 'checked' : '' }}> 年中無休<br>
                </div>





                <div class="form-group">
                    <label for="category_id"><strong>カテゴリー:</strong></label>
                    <select id="category_id" name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $store->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">更新</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
