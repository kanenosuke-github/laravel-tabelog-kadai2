@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <!-- 中央寄せにするためのbootstrapクラス -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('home.result')}}" method="get" class="d-flex mb-4">
                <input type="text" name="keyword" class="form-control mr-2">
                <input type="submit" value="検索" class="btn btn-primary">
            </form>

            <!-- テーブルを整形 -->
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>店舗コード</th>
                        <th>店舗名</th>
                        <th>カテゴリ</th>
                        <th>住所</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stores as $store)
                    <tr>
                        <td>{{$store->id}}</td>
                        <td>{{$store->name}}</td>
                        <td></td>
                        <td></td>
                        <td><a href="{{route('home.detail', $store->id)}}" class="btn btn-info">店舗詳細</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
