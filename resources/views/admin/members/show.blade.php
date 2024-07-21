@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1>会員情報詳細</h1>
                
                <div>
                    <strong>Name:</strong> {{ $member->name }}
                </div>
                <div>
                    <strong>Email:</strong> {{ $member->email }}
                </div>

                <div>
                    <a href="{{ route('admin.members.index') }}">戻る</a>
                </div>
            </div>
        </div>
    </div>
@endsection
