@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">カテゴリー編集</h2>
            <div class="mb-3 text-right">
                <a href="{{route('admin.categories.index')}}" class="btn btn-secondary">戻る</a>
            </div>

            <form action="{{route('admin.categories.update', $category->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name"><strong>カテゴリー名:</strong></label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}" placeholder="カテゴリー名">
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">更新</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
