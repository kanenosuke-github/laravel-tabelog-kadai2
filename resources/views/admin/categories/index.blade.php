@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1>カテゴリー一覧</h1>
                <a href="{{route('admin.categories.create')}}">Create New Category</a>

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
            </div>
        </div>
    </div>
@endsection
