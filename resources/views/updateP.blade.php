@extends('master')
@section('title','Update Product')
@section('content')
{{session('success')}}
<h1>Edit Detail</h1>
<div class="container">
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <form action="/update" method="post">
            {{ csrf_field() }}            
            <input value="{{$product['id']}}" type="hidden" name="id">
            
            <div class="form-group">
              <label for="exampleFormControlInput1">Product Name</label>
              <input value="{{$product['name']}}" type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Category</label>
                <input value="{{$product['category']}}" type="text" class="form-control" name="category" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">price</label>
                <input value="{{$product['price']}}" type="text" class="form-control" name="price" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">URL</label>
              <textarea class="form-control" name="gallery" id="exampleFormControlTextarea1" rows="3">{{$product['gallery']}}</textarea>
            </div>
            
            <button type="submit" class="mt-3 btn btn-warning">Update</button>
          </form>
        
    </div>
    <div class="col-sm-3"></div>
</div>
</div>
@endsection();