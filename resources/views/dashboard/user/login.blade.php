@extends('dashboard.app')
@section('user.content')
  
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4" style="margin-top:45px;">
        <h4>Login User</h4>
        <hr>
        <form action="{{ route('user.check') }}" method="POST" autocomplete="off">
          @csrf

          <div class="form-group">
            @if (Session::get('failure'))
              <div class="alert alert-danger">
                {{ Session::get('failure') }}
              </div>
            @endif

            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Enter email address" id="email" class="form-control" value="{{ old('email') }}">
            <span class="text text-danger">
              @error('email')
                {{ $message }}
              @enderror
            </span>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
            <span class="text text-danger">
              @error('password')
                {{ $message }}
              @enderror
            </span>
          </div>
          
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
          
          <a href="{{ route('user.register') }}">Create new Account</a>
        
        </form>
      </div>
    </div>
  </div>

@endsection