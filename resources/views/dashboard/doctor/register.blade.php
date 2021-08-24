@extends('dashboard.app')
@section('user.content')
  
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3" style="margin-top: 45px">
        <h4>Doctor Register</h4>
        <hr>
        @if (Session::get('success'))
          <div class="alert alert-success">
            {{ Session::get('success') }}
          </div>  
        @endif
        @if (Session::get('failure'))
        <div class="alert alert-success">
          {{ Session::get('failure') }}
        </div>  
        @endif
        <form action="{{ route('doctor.create') }}" method="POST" autocomplete="off">
          @csrf
          
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Full Name" value="{{ old('name') }}" />
            <span class="text text-danger">
              @error('name')
                {{ $message }}
              @enderror
            </span>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address" value="{{ old('email') }}" />
            <span class="text text-danger">
              @error('email')
                {{ $message }}
              @enderror
            </span>
          </div>

          <div class="form-group">
            <label for="hospital">Hospital</label>
            <input type="text" class="form-control" name="hospital" id="hospital" placeholder="Enter hospital name" value="{{ old('hospital') }}" />
            <span class="text text-danger">
              @error('hospital')
                {{ $message }}
              @enderror
            </span>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" />
            <span class="text text-danger">
              @error('password')
                {{ $message }}
              @enderror
            </span>
          </div>

          <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Enter Confirm password" />
            <span class="text text-danger">
              @error('cpassword')
                {{ $message }}
              @enderror
            </span>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>

          <a href="{{ route('doctor.login') }}">I already have an accountt</a>
        </form>
      </div>
    </div>
  </div>

@endsection