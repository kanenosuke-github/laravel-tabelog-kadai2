@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">レビュー編集</h1>
            <form action="{{route('home.review.update', ['storeId' => $storeId, 'reviewId' => $review->id])}}" method="POST" class="mb-4">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <textarea name="comment" id="comment" placeholder="レビュー内容" required class="form-control">{{ $review->comment }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">更新</button>
            </form>
        </div>
    </div>
</div>
@endsection
