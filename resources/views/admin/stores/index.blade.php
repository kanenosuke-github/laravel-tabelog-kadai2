@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h1>店舗一覧</h1>

    <!-- Create New Store Link -->
    <div class="text-end mb-3">
        <a href="{{route('admin.stores.create')}}" class="btn btn-primary">新規店舗作成</a>
    </div>

    <!-- Search Form -->
    <form action="{{ route('admin.stores.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="店舗検索" value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-secondary">検索</button>
        </div>
    </form>

    <!-- Stores Table -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>店舗名</th>
                    <th>店舗画像</th>
                    <th>カテゴリー ID</th>
                    <th>郵便番号</th>
                    <th>住所</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $store)
                <tr>
                    <td class="fw-bold text-danger">{{$store->name}}</td>
                    <td>{{$store->image}}</td>
                    <td>{{$store->category_id}}</td>
                    <td>{{$store->postal_code}}</td>
                    <td>{{$store->address}}</td>
                    <td>
                        <form action="{{route('admin.stores.destroy', $store->id)}}" method="POST">
                           <a href="{{route('admin.stores.show', $store->id)}}" class="btn btn-info btn-sm">詳細</a>
                           <a href="{{route('admin.stores.edit', $store->id)}}" class="btn btn-warning btn-sm">編集</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{$stores->links()}}
    </div>

</div>

@endsection
