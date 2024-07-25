@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex mb-4">
                <a href="{{route('home')}}" class="btn btn-secondary mr-2">ホーム</a>
                <a href="{{route('user.reservations.create',['store' => $store->id])}}" class="btn btn-primary mr-2">予約</a>
                <a href="{{route('home.review.create',['id' => $store->id])}}" class="btn btn-warning mr-2">レビュー投稿</a>
                <a href="{{route('favorites.index')}}" class="btn btn-info">お気に入り</a>
            </div>

            <h1 class="mb-4">店舗詳細</h1>
            <h3>{{$store->name}}</h3>
            <img src="{{asset('images/stores/'.$store->image)}}" alt="" width="100px" class="mb-4">

            @guest
                <!-- ゲストユーザーにはお気に入り操作を表示しない -->
            @else
                @if(Auth::user()->favorite_stores()->where('store_id',$store->id)->exists())
                    <form action="{{ route('favorites.destroy', $store->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mb-4">お気に入り解除</button>
                    </form>
                @else
                    <form action="{{ route('favorites.store', $store->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success mb-4">お気に入り</button>
                    </form>
                @endif
            @endguest

            <table class="table table-bordered table-hover mb-5">
                <thead>
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
                </thead>
                <tbody>
                    <tr>
                        <td><img src="{{$store->image}}" alt="{{$store->name}}" width="100px"></td>
                        <td>{{$store->description}}</td>
                        <td>{{$store->business_hours}}</td>
                        <td>{{$store->price}}</td>
                        <td>{{$store->category_id}}</td>
                        <td>{{$store->postal_code}}</td>
                        <td>{{$store->address}}</td>
                        <td>{{$store->phone_number}}</td>
                        <td>{{$store->regular_holiday}}</td>
                    </tr>
                </tbody>
            </table>

            <h2>レビュー一覧</h2>
            <ul class="list-unstyled">
                @foreach($reviews as $review)
                <li class="border-bottom mb-2 pb-2">
                    <p><strong>{{$review->user_name}}</strong></p>
                    <p>{{$review->comment}}</p>
                </li>
                @endforeach

                @if($reviews->isEmpty())
                <li>レビューがありません。</li>
                @endif
            </ul>
        </div>
    </div>
</div>

@endsection
