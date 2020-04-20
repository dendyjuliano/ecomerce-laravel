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
        <div class="col-md-12 mb-0"><a href="{{ url('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <a href="{{ url('/cart') }}">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
      </div>
    </div>
</div>

<div class="site-section">
    <form action="{{ url('/checkout') }}" method="post">
    {{ csrf_field() }}
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
          <h2 class="h3 mb-3 text-black">Billing Details</h2>
          <div class="p-3 p-lg-5 border">

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_companyname" class="text-black">Full Name </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="c_companyname" name="name">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                <textarea type="text" ols="30" rows="5" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Write your address..."></textarea>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
            </div>

            <div class="form-group row mb-5">
              <div class="col-md-6">
                <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="c_email_address" name="email">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="col-md-6">
                <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="c_phone" name="phone" placeholder="Phone Number">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <label for="c_order_notes" class="text-black">Order Notes</label>
              <textarea name="notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
            </div>

          </div>
        </div>
        <div class="col-md-6">

          <div class="row mb-5">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black">Your Order</h2>
              <div class="p-3 p-lg-5 border">
                <table class="table site-block-order-table mb-5">
                  <thead>
                    <th>Product</th>
                    <th>Total</th>
                  </thead>
                  <tbody>
                      @foreach ($items as $row)
                      <tr>
                        <td>{{ $row->name }} <strong class="mx-2">x</strong> {{ $row->quantity }}</td>
                        <td>{{ Money::IDN($row->price,true) }}</td>
                      </tr>
                      @endforeach
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                      <td class="text-black">{{ Money::IDN(Cart::session($customer_id)->getSubTotal(),true) }}</td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                      <td class="text-black font-weight-bold"><strong>{{ Money::IDN(Cart::session($customer_id)->getTotal(),true) }}</strong></td>
                    </tr>
                  </tbody>
                </table>

                <div class="form-group">
                  <button class="btn btn-primary btn-lg py-3 btn-block" type="submit">Place Order</button>
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

