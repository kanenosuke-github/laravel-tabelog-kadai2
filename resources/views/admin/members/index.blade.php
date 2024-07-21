@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1>会員一覧検索/一覧</h1>

                <form action="{{ route('admin.members.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Search members..." value="{{ request('search') }}">
                    <button type="submit">Search</button>
                </form>

                <table>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>
                            <a href="{{ route('admin.members.show', $member->id) }}">Show</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

                {{ $members->links() }}
            </div>
        </div>
    </div>
@endsection