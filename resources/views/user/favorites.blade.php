@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1>お気に入り店舗一覧</h1>
                <ul>
                    @foreach($favorites as $favorite)
                    <li>
                        <a href="{{ route('store.show', $favorite->id) }}">{{ $favorite->name }}</a>
                        <form action="{{ route('favorites.destroy', $favorite->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">お気に入り解除</button>
                        </form>
                    </li>
                  s  @endforeach
                </ul>
                {{ $favorites->links() }}
            </div>
        </div>
    </div>
@endsection
