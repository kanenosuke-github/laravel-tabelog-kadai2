<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>店舗詳細</title>
</head>
<body>
    <a href="{{route('home')}}">ホーム</a>
    <a href="{{--route('#')--}}">予約</a>
    <a href="{{--route('#')--}}">レビュー</a>
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
        <td>{{$store->image}}</td>
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

</body>
</html>