@extends('layouts.app')

@section('content')
<div>
    <h2>Edit Category</h2>
</div>
<div>
    <a href="{{route('admin.categories.index')}}">Back</a>
</div>

<form action="{{route('admin.categories.update',$category->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <strong>Name:</strong>
        <input type="text" name="name" value="{{$category->name}}" placeholder="Name">
    </div>
   
    <div>
        <button type="submit">Submit</button>
    </div>


</form>

@endsection