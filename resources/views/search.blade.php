@extends("master")

@section('title','searh')
@section('content')
@parent
    
<div class="container mt-4 mb-4">
    <div class="row">
    @foreach ($searchProduct as $item)
    <div class="col-md-4">
    <div class="card mt-3 mb-3" style="width: 18rem;">
        <img class="card-img-top" src="{{$item['gallery']}}" style="height:18rem !important;" alt="Card image cap">
        <div class="card-body">
          <a href="detail/{{$item['id']}}"><h5 class="card-title">{{$item['name']}}</h5></a>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">add to cart</a>
          <a href="#" class="btn btn-success">Buy now</a>
        </div>
    </div>
    </div>
    @endforeach
    </div>
</div>

@endsection
