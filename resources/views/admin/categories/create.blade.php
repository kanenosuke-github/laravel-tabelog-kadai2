@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">カテゴリー追加</h2>
            <div class="mb-3 text-right">
                <a href="{{route('admin.categories.index')}}" class="btn btn-secondary">戻る</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 

            <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data"> 
                @csrf

                <div class="form-group">
                    <label for="name"><strong>カテゴリー:</strong></label>
                    <input type="text" name="name" class="form-control" placeholder="カテゴリー">
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">作成</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
