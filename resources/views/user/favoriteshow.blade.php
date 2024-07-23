@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $store->name }}</h1>
        <img src="{{ asset('images/stores/' . $store->image) }}" alt="{{ $store->name }}" width="100px">
        <p>{{ $store->description }}</p>
        <p>{{ $store->business_hours }}</p>
        <p>{{ $store->price }}</p>
        <p>{{ $store->address }}</p>
        <p>{{ $store->phone_number }}</p>
        <p>{{ $store->regular_holiday }}</p>
    </div>
@endsection