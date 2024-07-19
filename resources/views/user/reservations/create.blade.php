@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$store->name}}の予約</h1>
    <form action="{{route('user.reservations.store',$store)}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="reservation_date">予約日時</label>
        <input type="datetime-local" class="form-control" id="reservation_date" name="reservation_date" required>
    </div>
    <button type="submit" class="btn btn-primary">予約する</button>
    </form>
</div>
@endsection