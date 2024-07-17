@extends('layouts.app')

@section('content')
<body>
    <h1>レビュー</h1>
    <form action="{{route('home.review.store',['id' => $store->id])}}" method="POST">
    @csrf
    <input type="text" name="user_name" placeholder="お名前" required>
    <textarea name="comment" id="comment" placeholider="レビュー内容" required></textarea>
    <button type="submit">投稿</button>
    </form>

</body>
@endsection