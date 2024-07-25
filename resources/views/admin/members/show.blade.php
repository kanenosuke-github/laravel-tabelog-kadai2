@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">会員情報詳細</h1>
                
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>名前:</strong> {{ $member->name }}
                        </div>
                        <div class="mb-3">
                            <strong>Emailアドレス:</strong> {{ $member->email }}
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <a href="{{ route('admin.members.index') }}" class="btn btn-secondary">戻る</a>
                </div>
            </div>
        </div>
    </div>
@endsection
