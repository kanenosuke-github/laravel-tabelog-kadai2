@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md-8"> <!-- 幅の取り方を調節 -->
                <h1 class="text-center">お気に入り店舗一覧</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>店舗名</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($favorites as $favorite)
                        <tr>
                            <td>
                                <a href="{{ route('favorites.show', $favorite->id) }}">{{ $favorite->name }}</a>
                            </td>
                            <td>
                                <form action="{{ route('favorites.destroy', $favorite->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">お気に入り解除</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $favorites->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
