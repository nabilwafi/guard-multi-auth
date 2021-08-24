@extends('dashboard.app')
@section('user.content')
  
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4" style="margin-top: 45px">
        <h4>Doctor Login</h4>
        <hr>
        @if (Session::get('failure'))
          <div class="alert alert-danger">
            {{ Session::get('failure') }}
          </div>
        @endif
        <form action="{{ route('doctor.check') }}" method="POST" autocomplete="off">
          @csrf
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Enter email address" value="{{ old('email') }}" />
            <span class="text text-danger">
              @error('email')
                {{ $message }}
              @enderror
            </span>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" value="{{ old('password') }}" />
            <span class="text text-danger">
              @error('password')
                {{ $message }}
              @enderror
            </span>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>

          <a href="{{ route('doctor.register') }}">Create a new Account</a>
        </form>
      </div>
    </div>
  </div>

@endsection