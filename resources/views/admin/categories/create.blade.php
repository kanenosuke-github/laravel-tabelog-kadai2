<div>
    <h2>Add New Category</h2>
</div>
<div>
    <a href="{{route('admin.categories.index')}}">Back</a>
</div>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 

<form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data"> 
    @csrf

    <div>
        <strong>New Category:</strong>
        <input type="text" name="category" placeholder="Category">
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>