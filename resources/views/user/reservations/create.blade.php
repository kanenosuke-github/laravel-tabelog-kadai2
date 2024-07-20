@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$store->name}}の予約</h1>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 
    <form action="{{route('user.reservations.store',$store)}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="reservation_date">予約日時</label>
        <input type="datetime-local" class="form-control" id="reservation_date" name="reservation_date" required>
        <label for="number_of_people">予約人数</label>
        <input type="number" class="form-control" id="number_of_people" name="number_of_people" required>
    </div>
    <button type="submit" class="btn btn-primary">予約する</button>
    </form>
</div>
@endsection