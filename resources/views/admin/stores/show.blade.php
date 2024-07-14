<div>
    <h2>Show Store</h2>
</div>
<div>
    <a href="{{route('admin.stores.index')}}">Back</a>
</div>

<div>
    <strong>Name:</strong>
    {{$store->name}}
</div>
<div>
    <strong>Image:</strong>
    {{$store->image}}
</div>
<div>
    <strong>Description:</strong>
    {{$store->description}}
</div>
<div>
    <strong>Business Hours:</strong>
    {{$store->business_hours}}
</div>
<div>
    <strong>Pricw:</strong>
    {{$store->price}}
</div>
<div>
    <strong>Postal <Code></Code>:</strong>
    {{$store->postal_code}}
</div>
<div>
    <strong><Address></Address>:</strong>
    {{$store->address}}
</div>
<div>
    <strong>Phone Number:</strong>
    {{$store->phone_number}}
</div>
<div>
    <strong>Regular Holiday:</strong>
    {{$store->regular_holiday}}
</div>