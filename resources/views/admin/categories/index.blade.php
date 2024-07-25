@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mb-4">カテゴリー一覧</h1>
                <div class="text-right mb-3">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">カテゴリー作成</a>
                </div>

                <!-- 検索フォームの追加 -->
                <form action="{{ route('admin.categories.index') }}" method="GET" class="form-inline mb-4">
                    <input type="text" name="search" placeholder="カテゴリー検索" class="form-control mr-2">
                    <button type="submit" class="btn btn-primary">検索</button>
                </form>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>カテゴリー名</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-info btn-sm">編集</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">削除</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- ページネーションリンクをここに追加 -->
                <div class="mt-4">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
