<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<h1>home</h1>
<a href=""></a>
<a href=""></a>
<a href=""></a>
<a href=""></a>
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
            <td><a href="{{route('home.detail',$store->id)}}">店舗詳細</td>
        </tr>
    </table>
    
@endforeach
</html>