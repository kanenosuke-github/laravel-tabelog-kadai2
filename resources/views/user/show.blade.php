@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">会員情報</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>名前:</th>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <th>メールアドレス:</th>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <th>パスワード:</th>
                            <td>セキュリティのため表示されません</td>
                        </tr>
                        <tr>
                            <th>登録日:</th>
                            <td>{{ Auth::user()->created_at->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <th>更新日:</th>
                            <td>{{ Auth::user()->updated_at->format('Y-m-d') }}</td>
                        </tr>
                    </table>

                    <a href="{{ route('user.edit') }}" class="btn btn-primary">編集</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

                
