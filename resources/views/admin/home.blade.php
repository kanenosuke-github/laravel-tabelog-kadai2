@extends('layouts.app')

@section('content')
    <div class="container my-5"> <!-- 追加: my-5で上部余白を追加 -->
        <div class="row justify-content-center">
            @include('layouts.sidebar') <!-- Sidebar inclusion -->

            <div class="col-xxl-9 col-xl-10 col-lg-11">
                <div class="row row-cols-md-3 row-cols-1 g-3 mb-5">
                    <div class="col">
                        <div class="card bg-light h-100">
                            <div class="card-body text-center">
                                <a href="{{ route('admin.members.index') }}" class="stretched-link">
                                    <h5 class="card-title">会員一覧</h5>
                                </a>
                                <p class="card-text">会員情報を検索、一覧を表示するページ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-light h-100">
                            <div class="card-body text-center">
                                <a href="{{ route('admin.stores.index') }}" class="stretched-link">
                                    <h5 class="card-title">店舗一覧</h5>
                                </a>
                                <p class="card-text">店舗を検索、一覧を表示するページ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-light h-100">
                            <div class="card-body text-center">
                                <a href="{{ route('admin.categories.index') }}" class="stretched-link">
                                    <h5 class="card-title">カテゴリ一覧</h5>
                                </a>
                                <p class="card-text">カテゴリを検索、一覧を表示するページ</p>
                            </div>
                        </div>
                    </div>
                    <!-- 他のカードも同様に追加 -->
                </div>
            </div>
        </div>
    </div>
@endsection

<body>
