@extends('layouts.app')

@section('content')

<form action="{{route('home.result')}}" method="get">
    <input type="text" name="keyword" >
    <input type="submit" value="検索">
</form>
<table>
        <tr>
            <th>店舗コード</th>
            <th>店舗名</th>
            <th>カテゴリ</th>
            <th>住所</th>
        </tr>
    </table>
@foreach($stores as $store)
<table>
        <tr>
            <td>{{$store->id}}</td>
            <td>{{$store->name}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="{{route('home.detail',$store->id)}}">店舗詳細</a></td>
        </tr>
    </table>
    
@endforeach
@endsection
