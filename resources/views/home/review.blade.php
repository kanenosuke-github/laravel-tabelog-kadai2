@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">レビュー</h1>
            <form action="{{route('home.review.store',['id' => $store->id])}}" method="POST" class="mb-4">
                @csrf
                <div class="form-group">
                    <textarea name="comment" id="comment" placeholder="レビュー内容" required class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">投稿</button>
            </form>

            @if($store && $store->reviews && $store->reviews->count() > 0)
                <h2>レビュー一覧</h2>
                <ul class="list-unstyled">
                    @foreach($store->reviews as $review)
                        <li class="border-bottom mb-2 pb-2">{{ $review->user->name }}: {{ $review->comment }} ({{ $review->created_at }})</li>
                    @endforeach
                </ul>
            @else
                <p>まだレビューがありません。</p>
            @endif

        </div>
    </div>
</div>

@endsection
