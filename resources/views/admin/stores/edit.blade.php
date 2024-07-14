<div>
    <h2>Edit Product</h2>
</div>
<div>
    <a href="{{route('admin.stores.index')}}">Back</a>
</div>

<form action="{{route('admin.stores.update',$store->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <strong>Name:</strong>
        <input type="text" name="name" value="{{$store->name}}" placeholder="Name">
    </div>
    <div>
        <strong>Image:</strong>
        <input type="file" name="image" value="{{$store->image}}" placeholder="Image">
    </div>
    <div>
        <strong>Description:</strong>
        <textarea name="description" id="store" placeholder="Description">{{$store->description}}</textarea>
    </div>
    <div>
        <strong>Business Hours:</strong>
        <input type="text" name="business_hours" value="{{$store->business_hours}}" placeholder="Business Hours">
    </div>
    <div>
        <strong>Price:</strong>
        <input type="number" name="price" value="{{$store->price}}" placeholder="Price">
    </div>
    <div>
        <strong>Postal Code:</strong>
        <input type="text" name="postal_code" value="{{$store->postal_code}}" placeholder="postal_code">
    </div>
    <div>
        <strong>Address:</strong>
        <input type="text" name="address" value="{{$store->address}}" placeholder="Address">
    </div>
    <div>
        <strong>Phone Number:</strong>
        <input type="tel" name="phone_number" value="{{$store->phone_number}}" placeholder="phone_number">
    </div>
    <div>
        <strong>Regular Holiday:</strong>
        <input type="text" name="regular_holiday" value="{{$store->regular_holiday}}" placeholder="Regular Holiday">
    </div>
    <div>
         <strong>Category:</strong>
         <select name="category_id">
         @foreach ($categories as $category)
             @if ($category->id == $store->category_id)
                 <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
             @else
                 <option value="{{ $category->id }}">{{ $category->name }}</option>
             @endif
         @endforeach
         </select>
     </div>
    <div>
        <button type="submit">Submit</button>
    </div>

</form>