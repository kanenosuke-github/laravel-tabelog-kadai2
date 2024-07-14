<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{route('home')}}">ホーム</a>
    <a href="{{--route('#')--}}">予約</a>
    <a href="{{--route('#')--}}">レビュー</a>
    <h1>detail</h1>
    {{$store->name}}
    <a href="{{--route('#')--}}">お気に入り</a>
</body>
</html>