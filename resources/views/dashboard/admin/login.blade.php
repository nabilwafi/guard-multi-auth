@extends('dashboard.app')
@section('user.content')

<body class="bg-dark">
  <div class="container">
    <div class="row text-white">
      <div class="col-md-6 offset-md-3" style="margin-top:45px;">
        <h4>Admin Login</h4>
        <hr>
        @if (Session::get('failure'))
          <div class="alert alert-danger">
            {{ Session::get('failure') }}
          </div>
        @endif
        <form action="{{ route('admin.check') }}" method="POST" autocomplete="off">
          @csrf

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Enter email address" value="{{ old('email') }}">
            <span class="text text-danger">
              @error('email')
                {{ $message }}
              @enderror
            </span>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" >
            <span class="text text-danger">
              @error('password')
                {{ $message }}
              @enderror
            </span>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

@endsection