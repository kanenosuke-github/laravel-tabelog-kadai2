@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center my-4">店舗編集</h2>
            <div class="text-center mb-4">
                <a href="{{route('admin.stores.index')}}" class="btn btn-secondary">戻る</a>
            </div>

            <form action="{{route('admin.stores.update',$store->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name"><strong>店舗名:</strong></label>
                    <input type="text" id="name" name="name" class="form-control" value="{{$store->name}}" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="image"><strong>店舗画像:</strong></label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description"><strong>店舗説明:</strong></label>
                    <textarea id="description" name="description" class="form-control" placeholder="Description">{{$store->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="business_hours"><strong>営業時間:</strong></label>
                    <input type="text" id="business_hours" name="business_hours" class="form-control" value="{{$store->business_hours}}" placeholder="Business Hours">
                </div>

                <div class="form-group">
                    <label for="price"><strong>価格:</strong></label>
                    <input type="number" id="price" name="price" class="form-control" value="{{$store->price}}" placeholder="Price">
                </div>

                <div class="form-group">
                    <label for="postal_code"><strong>郵便番号:</strong></label>
                    <input type="text" id="postal_code" name="postal_code" class="form-control" value="{{$store->postal_code}}" placeholder="postal_code">
                </div>

                <div class="form-group">
                    <label for="address"><strong>住所:</strong></label>
                    <input type="text" id="address" name="address" class="form-control" value="{{$store->address}}" placeholder="Address">
                </div>

                <div class="form-group">
                    <label for="phone_number"><strong>電話番号:</strong></label>
                    <input type="tel" id="phone_number" name="phone_number" class="form-control" value="{{$store->phone_number}}" placeholder="phone_number">
                </div>

                <div class="form-group">
                    <label for="regular_holiday"><strong>定休日:</strong></label>
                    <input type="text" id="regular_holiday" name="regular_holiday" class="form-control" value="{{$store->regular_holiday}}" placeholder="Regular Holiday">
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
