@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">{{ $store->name }}</h1>
                <div class="text-center my-4">
                    <img src="{{ asset('images/stores/' . $store->image) }}" alt="{{ $store->name }}" class="img-fluid" style="width: 200px;"> <!-- 画像サイズ調整 -->
                </div>
                <dl class="row">
                    <dt class="col-sm-4">説明</dt>
                    <dd class="col-sm-8">{{ $store->description }}</dd>

                    <dt class="col-sm-4">営業時間</dt>
                    <dd class="col-sm-8">{{ $store->business_hours }}</dd>

                    <dt class="col-sm-4">価格</dt>
                    <dd class="col-sm-8">{{ $store->price }}</dd>

                    <dt class="col-sm-4">住所</dt>
                    <dd class="col-sm-8">{{ $store->address }}</dd>

                    <dt class="col-sm-4">電話番号</dt>
                    <dd class="col-sm-8">{{ $store->phone_number }}</dd>

                    <dt class="col-sm-4">定休日</dt>
                    <dd class="col-sm-8">{{ $store->regular_holiday }}</dd>
                </dl>
            </div>
        </div>
    </div>
@endsection
