@extends('template2.template2')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Product</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ url('/admin-home') }}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ url('/product-content') }}">Product</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="{{ url('/add-product') }}" class="btn btn-sm btn-neutral"><i class="fas fa-plus"></i> Add New</a>
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
            <h3 class="mb-0">Data Product</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush data">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="name">Image</th>
                  <th scope="col" class="sort" data-sort="budget">Name</th>
                  <th scope="col" class="sort" data-sort="status">Price</th>
                  <th scope="col" class="sort" data-sort="status">Category</th>
                  <th scope="col" class="sort" data-sort="status">Status</th>
                  <th scope="col" class="sort" data-sort="completion">action</th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach ($product as $row)
                    <tr>
                        <td><img src="{{ $row->product_image }}" alt="" width="100"></td>
                        <td>{{ $row->product_name }}</td>
                        <td>{{ $row->product_price }}</td>
                        <td>{{ $row->categorys->category_name }}</td>
                        <td>
                            @if ($row->status == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Unactive</span>
                            @endif
                        </td>
                        <td>
                            @if ($row->status == 1)
                            <a class="btn btn-success btn-sm" href="{{ URL::to('/unactive-product/'.$row->id) }}">
                                <i class="ni ni-button-power text-white"></i>
                            </a>
                            @else
                                <a class="btn btn-danger btn-sm" href="{{ URL::to('/active-product/'.$row->id) }}">
                                    <i class="ni ni-button-power text-white"></i>
                                </a>
                            @endif
                            <a href="{{ url('/delete-product/'.$row->id) }}" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                            <a href="{{ url('/edit-product/'.$row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
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
