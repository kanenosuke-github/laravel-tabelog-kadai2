@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">会員情報の編集</div>

                <div class="card-body">
                    <form action="{{ route('user.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <div class="form-group mb-3">
                            <label for="name">名前</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="password">パスワード</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation">パスワード再入力</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">更新</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
