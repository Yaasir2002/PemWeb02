@extends('template/admin')

@section('content')
<h1>Add Product</h1>
<form action=" {{ route('produk.tb') }} " method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="price">Alamat:</label>
        <input type="text" name="address" id="price" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">No HP:</label>
        <input type="number" name="no_hp" id="description" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection