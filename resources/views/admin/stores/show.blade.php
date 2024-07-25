@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">店舗詳細</h2>
    <div class="text-center mb-3">
        <a href="{{route('admin.stores.index')}}" class="btn btn-secondary">戻る</a>
    </div>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>店舗名</th>
                <td>{{$store->name}}</td>
            </tr>
            <tr>
                <th>店舗画像</th>
                <td>{{$store->image}}</td>
            </tr>
            <tr>
                <th>店舗説明</th>
                <td>{{$store->description}}</td>
            </tr>
            <tr>
                <th>営業時間</th>
                <td>{{$store->business_hours}}</td>
            </tr>
            <tr>
                <th>価格</th>
                <td>{{$store->price}}</td>
            </tr>
            <tr>
                <th>郵便番号</th>
                <td>{{$store->postal_code}}</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{$store->address}}</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{$store->phone_number}}</td>
            </tr>
            <tr>
                <th>定休日</th>
                <td>{{$store->regular_holiday}}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
