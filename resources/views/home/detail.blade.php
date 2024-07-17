@extends('layouts.app')

@section('content')
<body>
    <a href="{{route('home')}}">ホーム</a>
    <a href="{{--route('#')--}}">予約</a>
    <a href="{{route('home.review.create',['id' => $store->id])}}">レビュー投稿</a>
    <h1>店舗詳細</h1>
    {{$store->name}}
    <a href="{{--route('#')--}}">お気に入り</a>

    <table>
    <tr>
        <th>Image</th>
        <th>Description</th>
        <th>Business Hours</th>
        <th>Price</th>
        <th>Category ID</th>
        <th>Postal Code</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Regular Holiday</th>
    </tr>
    <tr>
        <td><img src="{{$store->image}}" alt="{{$store->name}}"></td>
        <td>{{$store->description}}</td>
        <td>{{$store->business_hours}}</td>
        <td>{{$store->price}}</td>
        <td>{{$store->category_id}}</td>
        <td>{{$store->postal_code}}</td>
        <td>{{$store->address}}</td>
        <td>{{$store->phone_number}}</td>
        <td>{{$store->regular_holiday}}</td>
        
    </tr>
    </table>

    <!--店舗詳細の下にレビューを入れる-->

    <h2>レビュー一覧</h2>
    <ul>
        @foreach($reviews as $review)
        <li>
            <p><strong>{{$review->user_name}}</strong></p>
            <p>{{$review->comment}}</p>
        </li>
        @endforeach

        @if($reviews->isEmpty())
        <li>レビューがありません。</li>
        @endif
    </ul>

</body>

@endsection