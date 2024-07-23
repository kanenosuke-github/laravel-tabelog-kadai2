@extends('layouts.app')

@section('content')

<a href="{{route('admin.stores.create')}}">Create New Store</a>

<!-- Search Form -->
<form action="{{ route('admin.stores.index') }}" method="GET">
    <input type="text" name="search" placeholder="店舗検索" value="{{ request('search') }}">
    <button type="submit">Search</button>
</form>

<table>
    <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Description</th>
        <th>Business Hours</th>
        <th>Price</th>
        <th>Category ID</th>
        <th>Postal Code</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Regular Holiday</th>
        <th>Action</th>
    </tr>
    @foreach ($stores as $store)
    <tr>
        <td>{{$store->name}}</td>
        <td>{{$store->image}}</td>
        <td>{{$store->description}}</td>
        <td>{{$store->business_hours}}</td>
        <td>{{$store->price}}</td>
        <td>{{$store->category_id}}</td>
        <td>{{$store->postal_code}}</td>
        <td>{{$store->address}}</td>
        <td>{{$store->phone_number}}</td>
        <td>{{$store->regular_holiday}}</td>
        <td>
            <form action="{{route('admin.stores.destroy',$store->id)}}" method="POST">
               <a href="{{route('admin.stores.show',$store->id)}}">Show</a>
               <a href="{{route('admin.stores.edit',$store->id)}}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit">DELETE</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection