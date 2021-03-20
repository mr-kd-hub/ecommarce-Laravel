@extends("master")

@section('title','welcome')
@section('content')
@parent

<div class="container">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($products as $i)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i['id']}}" class="{{$i['id']==1?'active':''}}"></li>
      @endforeach   
    </ol>
    <div class="carousel-inner">
        @foreach ($products as $item)
                  {{-- {{$item['gallery']}} --}}
                <div style="height:400px !important" class="carousel-item {{$item['id']==1?'active':''}}">
                    <img class="d-block w-100" src="{{$item['gallery']}}">
                </div>     
        @endforeach       
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="container mt-4 mb-4">
    <div class="row">
    @foreach ($products as $item)
    <div class="col-md-4">
    <div class="card mt-3 mb-3" style="width: 18rem;">
        <img class="card-img-top" src="{{$item['gallery']}}" style="height:18rem !important;" alt="Card image cap">
        <div class="card-body">
          <a href="detail/{{$item['id']}}"><h5 class="card-title">{{$item['name']}}</h5></a>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <form action="addtocart" method="POST">
              @csrf
              <input type="hidden" name="pid" value="{{$item['id']}}"/>
              <button class="btn btn-primary">add to cart</button>
              <a href="#" class="btn btn-success">Buy now</a>              
          </form>
          
         
        </div>
    </div>
    </div>
    @endforeach
    </div>
</div>





        
@endsection
