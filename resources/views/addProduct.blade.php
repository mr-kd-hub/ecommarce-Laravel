@extends('master')
@section('title','Add Product')
@section('content')
{{session('success')}}
<form action="addP" method="post">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Product Name</label>
      <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Category</label>
        <input type="text" class="form-control" name="category" id="exampleFormControlInput1" placeholder="name@example.com">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">price</label>
        <input type="text" class="form-control" name="price" id="exampleFormControlInput1" placeholder="name@example.com">
      </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">URL</label>
      <textarea class="form-control" name="gallery" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Register</button>
  </form>
@endsection();