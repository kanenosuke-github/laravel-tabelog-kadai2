@extends('layouts.app')

@section('content')
<div class="container">
    <h1>予約一覧</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>店舗名</th>
                <th>予約日時</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{$reservation->store->name}}</td>
                <td>{{$reservation->reservation_date}}</td>
                <td>
                    <form action="{{route('user.reservations.destroy',$reservation)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">キャンセル</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection