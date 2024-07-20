@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1>会員一覧</h1>
                <table>
    <tr>
        <th>Name</th>
    </tr>
    @foreach ($categories as $category)
    <tr>
        <td>{{$category->name}}</td>
        <td>
            <form action="{{route('admin.categories.destroy',$category->id)}}" method="POST">
               <a href="{{route('admin.categories.show',$category->id)}}">Show</a>
               <a href="{{route('admin.categories.edit',$category->id)}}">Edit</a>
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