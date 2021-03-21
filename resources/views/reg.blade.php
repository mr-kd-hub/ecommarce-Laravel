@extends("master")

@section('title','Register')
@section('content')
@parent

<div class="container mb-4 mt-4">
    <h1>Register</h1>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form action="reg" method="POST">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                @error('name')
                    {{$message}}
                @enderror
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                  @error('email')
                    {{$message}}
                @enderror
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                  @error('password')
                  {{$message}}
              @enderror
                </div>
                
                <button type="submit" class="btn btn-success">Register</button>
              </form>
             <a href="login">if You have already Account than Login</a>
        </div>
        <div class="col-sm-3">{{session('error')}}</div>
    </div>
</div>

@endsection();