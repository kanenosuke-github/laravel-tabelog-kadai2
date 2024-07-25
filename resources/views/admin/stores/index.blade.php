@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <!-- Create New Store Link -->
    <div class="text-end mb-3">
        <a href="{{route('admin.stores.create')}}" class="btn btn-primary">Create New Store</a>
    </div>

    <!-- Search Form -->
    <form action="{{ route('admin.stores.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="店舗検索" value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-secondary">Search</button>
        </div>
    </form>

    <!-- Stores Table -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
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
            </thead>
            <tbody>
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
                        <form action="{{route('admin.stores.destroy', $store->id)}}" method="POST">
                           <a href="{{route('admin.stores.show', $store->id)}}" class="btn btn-info btn-sm">Show</a>
                           <a href="{{route('admin.stores.edit', $store->id)}}" class="btn btn-warning btn-sm">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{$stores->links()}}
    </div>

</div>

@endsection
