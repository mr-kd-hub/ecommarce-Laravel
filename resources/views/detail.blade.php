@extends('master')
@section('title','detail')
    
@section('content')
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col-md-6">
                <img src="{{$product['gallery']}}" style="height:500px; width:500px;"/>
            </div>
            <div class="col-md-6">
                <h2>{{$product['name']}}</h2>
                <p>{{$product['category']}}</p>
                <h2>{{$product['price']}}</h2>
                <button class="btn btn-primary">Add to cart</button>
                <button class="btn btn-success">Buy Now</button>
            </div>
        </div>
    </div>
@endsection