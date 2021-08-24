@extends('dashboard.app')
@section('user.content')
  
  <body style="background-color: #d7dadb">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3" style="margin-top: 45px">
          <h4>Admin Dashboard</h4>
          <hr>
          <table class="table table-striped table-inverse table-responsiv">
            <thead class="thead-inverse">
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">{{ Auth::guard('admin')->user()->name }}</td>
                <td>{{ Auth::guard('admin')->user()->email }}</td>
                <td>{{ Auth::guard('admin')->user()->phone }}</td>
                <td>
                  <a href="{{ route('admin.logout') }}">Logout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>

@endsection