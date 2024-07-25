@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mb-4">会員一覧検索/一覧</h1>

                <form action="{{ route('admin.members.index') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="search" placeholder="会員検索" value="{{ request('search') }}"
                               class="form-control">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">検索</button>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">名前</th>
                            <th scope="col">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>
                                <a href="{{ route('admin.members.show', $member->id) }}" class="btn btn-info btn-sm">会員詳細</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $members->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
