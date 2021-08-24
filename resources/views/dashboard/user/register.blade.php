@extends('dashboard.app')
@section('user.content')
  
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4" style="margin-top:45px;">
        <h4>Register User</h4>
        <hr>
        <form action="{{ route('user.create') }}" method="POST" autocomplete="off">
          @csrf

          @if (Session::get('success'))
            <div class="alert alert-success">
              {{ Session::get('success') }}
            </div>
          @endif
          @if (Session::get('failure'))
            <div class="alert alert-danger">
              {{ Session::get('failure') }}
            </div>
          @endif
          

          <div class="form-group">
            <label for="email">Name</label>
            <input type="text" name="name" placeholder="Enter Full Name" id="email" class="form-control" value="{{ old('name') }}">
            <span class="text text-danger">
              @error('name')
                {{ $message }}
              @enderror
            </span>
          </div>
          
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter email address" id="email" class="form-control" value="{{ old('email') }}">
            <span class="text text-danger">
              @error('email')
                {{ $message }}
              @enderror
            </span>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" value="{{ old('password') }}">
            <span class="text text-danger">
              @error('password')
                {{ $message }}
              @enderror
            </span>
          </div>

          <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Enter Confirm Password" value="{{ old('cpassword') }}">
            <span class="text text-danger">
              @error('cpassword')
                {{ $message }}
              @enderror
            </span>
          </div>
          
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
          
          <a href="{{ route('user.login') }}">I already have an account</a>
        
        </form>
      </div>
    </div>
  </div>

@endsection