@extends('dashboard.app')
@section('user.content')

<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3" style="margin-top: 45px;">
      <h4>Doctor Dashboard</h4>
      <hr>
      <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Hospital</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ Auth::guard('doctor')->user()->name }}</td>
            <td>{{ Auth::guard('doctor')->user()->email }}</td>
            <td>{{ Auth::guard('doctor')->user()->hospital }}</td>
            <td>
              <a href="{{ route('doctor.logout') }}">Logout</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection