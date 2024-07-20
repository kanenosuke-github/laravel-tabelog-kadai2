@extends('layouts.app')

@section('content')
<body>
    <h1>レビュー</h1>
    <form action="{{route('home.review.store',['id' => $store->id])}}" method="POST">
    @csrf
    <textarea name="comment" id="comment" placeholder="レビュー内容" required></textarea>
    <button type="submit">投稿</button>
    </form>

    @if($store && $store->reviews && $store->reviews->count() > 0)
    <h2>レビュー一覧</h2>
    <ul>
        @foreach($store->reviews as $review)
            <li>{{ $review->user->name }}: {{ $review->comment }} ({{ $review->created_at }})</li>
        @endforeach
    </ul>
@else
    <p>まだレビューがありません。</p>
@endif

</body>
@endsection