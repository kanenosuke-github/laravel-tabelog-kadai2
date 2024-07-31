@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <!-- 中央寄せにするためのbootstrapクラス -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('home.result')}}" method="get" class="d-flex mb-4">
                <input type="text" name="keyword" class="form-control mr-2" placeholder="店舗検索">
                <select name="category_id" class="form-control mr-2">
                    <option value="">全てのカテゴリ</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <input type="submit" value="検索" class="btn btn-primary">
            </form>

            <!-- テーブルを整形 -->
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>店舗画像</th>
                        <th>店舗名</th>
                        <th>カテゴリ</th>
                        <th>住所</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stores as $store)
                    <tr>
                        <td>
                            <!-- 画像表示 -->
                            <img src="{{ asset('images/stores/' . $store->image) }}" alt="{{ $store->name }}" width="100px">
                        </td>
                        <td class="fw-bold text-danger">{{$store->name}}</td>
                        <td>{{$store->category->name}}</td>
                        <td>{{$store->address}}</td>
                        <td>
                            <a href="{{route('home.detail', $store->id)}}" class="btn btn-info">店舗詳細</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

             <!-- ページネーションリンクの追加 -->
             <div class="mt-4">
                    {{ $stores->links() }}
                </div>
        </div>
    </div>
</div>

@endsection

                        