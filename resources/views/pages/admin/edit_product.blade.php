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
                <li class="breadcrumb-item"><a href="{{ url('/edit-product') }}">Edit Product</a></li>
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
            <h3 class="mb-0">Edit Data Product</h3>
          </div>
          <div class="card-body">
              <form action="{{ url('/edit-product/'.$id->id ) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label class="form-control-label" for="input-name">Product Name</label>
                          <input type="text" id="input-username" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{$id->product_name}}">
                          @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Product Category</label>
                            <select id="" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                @foreach ($category as $row)
                                    @if ($id->category_id == $row->id)
                                    <option selected value="{{ $row->id }}">{{ $row->category_name }}</option>
                                    @else
                                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Product Price</label>
                            <input type="text" id="input-username" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Name" value="{{$id->product_price}}">
                            @error('price')
                                <div class="invalid-feedback">
                                        {{ $message }}
                                </div>
                            @enderror
                        </div>
                          <div class="form-group row">
                              <div class="col-sm">
                                <label class="form-control-label" >Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                    @error('image')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                      </div>

                    <div class="col-md-6">
                        <div class="text-center">
                        <img src="{{URL::to($id->product_image)}}" width="300" alt="">
                        </div>
                    </div>
                </div>
                <br>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </form>
            </div>
            </div>
            </div>

@endsection
