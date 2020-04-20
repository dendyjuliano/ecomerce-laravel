@php
    use Akaunting\Money\Currency;
    use Akaunting\Money\Money;

    $customer_id = Session::get('customer_id');
    $items = \Cart::session($customer_id)->getContent();
@endphp

@extends('template1.template1')

@section('content')
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{ url('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">My Profile</strong></div>
      </div>
    </div>
</div>

<div class="site-section">
    <form action="{{ url('/update-profile/'.$customer->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
          <h2 class="h3 mb-3 text-black">My Profile</h2>
          <div class="p-3 p-lg-5 border">

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_companyname" class="text-black">Email Address</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ $customer->email }}" id="c_companyname" name="email">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
            </div>

            <div class="form-group row mb-5">
              <div class="col-md-6">
                <label for="c_email_address" class="text-black">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ $customer->name }}" id="c_email_address" name="name">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="c_phone" class="text-black">Role<span class="text-danger">*</span></label>
                <input type="text" disabled class="form-control @error('role') is-invalid @enderror" id="c_phone" name="role" value="{{ $customer->roles->role_name }}">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_companyname" class="text-black">Foto Profile</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-md-6">

          <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Image Profile</h2>
              <div class="p-3 p-lg-5 border text-center">
                <img src="{{ URL::to($customer->image) }}" width="300" alt="">
                <br>
                <br>
                <div class="form-group">
                  <button class="btn btn-primary btn-lg py-3 btn-block" type="submit">Update Profile</button>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- </form> -->
    </div>
</form>
</div>

@endsection

