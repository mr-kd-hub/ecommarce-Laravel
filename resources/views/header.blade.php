<?php
  use App\Http\Controllers\UserController;
  $total=UserController::cartItem();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Orders</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="cartlist" tabindex="-1">Cart({{$total}})</a>
          </li>
          <li class="nav-item">
            @if(session()->has('email'))
              <a class="nav-link" href="logout" tabindex="-1" >Logout</a>
            @elseif(!session()->has('email'))
              <a class="nav-link" href="login" tabindex="-1" >Login</a>
            @endif
          </li>
        </ul>
        <form action="search" method="post" class="d-flex">
          @csrf
          <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>