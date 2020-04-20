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
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="{{ url('/add-customer') }}" class="btn btn-sm btn-neutral"><i class="fas fa-plus"></i> Add New</a>
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
            <h3 class="mb-0">Data User</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush data">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="name">Email</th>
                  <th scope="col" class="sort" data-sort="budget">Name</th>
                  <th scope="col" class="sort" data-sort="status">Password</th>
                  <th scope="col">Role</th>
                  <th scope="col" class="sort" data-sort="completion">action</th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach ($customer as $row)
                    <tr>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->password }}</td>
                        <td>{{ $row->roles->role_name }}</td>
                        <td>
                            <a href="{{ url('/delete-customer/'.$row->id) }}" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                            <a href="{{ url('/edit-customer/'.$row->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

@endsection
