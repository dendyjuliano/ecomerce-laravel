@extends('template2.template2')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Customer</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ url('/admin-home') }}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ url('/user-content') }}">Customer</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/add-customer') }}">Add Customer</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
          </div>
        </div>
      </div>
    </div>
</div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">Add Data User</h3>
          </div>
          <div class="card-body">
              <form action="{{ url('/add-customer') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-username">Name</label>
                          <input type="text" id="input-username" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                          @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Email address</label>
                          <input type="email" id="input-email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@gmail.com">
                          @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">Password</label>
                          <input type="password" name="password" id="input-first-name" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                          @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-last-name">Role</label>
                          <select id="" name="role_id" class="form-control @error('role') is-invalid @enderror">
                              <option disabled selected>--Select Role--</option>
                              @foreach ($role as $row)
                                <option value="{{ $row->id }}">{{ $row->role_name }}</option>
                              @endforeach
                          </select>
                          @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </form>
            </div>
            </div>
            </div>
         
@endsection
