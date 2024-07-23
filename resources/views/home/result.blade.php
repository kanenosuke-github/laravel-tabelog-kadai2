@extends('layouts.app')

@section('content')

<form action="{{route('home.result')}}" method="get">
    <input type="text" name="keyword" >
    <input type="submit" value="検索">
</form>

@if(isset($stores) && count($stores) > 0)
    <table>
        <tr>
            <th>店舗コード</th>
            <th>店舗名</th>
            <th>カテゴリ</th>
            <th>住所</th>
        </tr>
        @foreach($stores as $store)
        <tr>
            <td>{{$store->id}}</td>
            <td>{{$store->name}}</td>
            <td>{{$store->category}}</td>
            <td>{{$store->address}}</td>
            <td><a href="{{route('home.detail',$store->id)}}">店舗詳細</a></td>
        </tr>
        @endforeach
    </table>
@else
    <p>検索結果がありません。</p>
@endif

@endsection
