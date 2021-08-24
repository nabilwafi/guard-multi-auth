@extends('dashboard.app')
@section('user.content')

<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3" style="margin-top: 45px;">
      <h4>User Dashboard</h4>
      <hr>
      <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ Auth::guard('web')->user()->name }}</td>
            <td>{{ Auth::guard('web')->user()->email }}</td>
            <td>
              <a href="{{ route('user.logout') }}">Logout</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection