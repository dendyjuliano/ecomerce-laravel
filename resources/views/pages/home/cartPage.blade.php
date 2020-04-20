@php
    use Akaunting\Money\Currency;
    use Akaunting\Money\Money;
@endphp

@extends('template1.template1')

@section('content')

<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{ url('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
          <div class="site-blocks-table col-md-12">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name">Product</th>
                  <th class="product-price">Price</th>
                  <th class="product-quantity">Quantity</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Remove</th>
                </tr>
                @php
                    $customer_id = Session::get('customer_id');
                    // $items = LaraCart::getItems();
                    $items = \Cart::session($customer_id)->getContent();
                @endphp
              </thead>
              <tbody>
                  @foreach ($items as $item)
                  <tr>
                    <td class="product-thumbnail">
                      <img src="{{ URL::to($item->attributes->image) }}" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">{{ $item->name }}</h2>
                    </td>
                    <td>{{ Money::IDN($item->price,true) }}</td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <a href="{{ URL::to('/update-cart-minus/'.$item->id) }}" class="btn btn-outline-primary" >&minus;</a>
                        </div>
                        <input type="text" class="form-control text-center" value="{{ $item->quantity }}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-prepend">
                            <a href="{{ URL::to('/update-cart-plus/'.$item->id) }}" class="btn btn-outline-primary " >&plus;</a>
                          </div>
                      </div>

                    </td>
                    <td>{{ Money::IDN($item->price * $item->quantity,true) }}</td>
                    <td><a href="{{ url('/remove-cart/'.$item->id) }}" class="btn btn-primary btn-sm">X</a></td>
                  </tr>
                  @endforeach

              </tbody>
            </table>
          </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-6">
              <a href="{{ url('/') }}" class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                  <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">Subtotal</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black">{{ Money::IDN(Cart::session($customer_id)->getSubTotal(),true) }}</strong>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6">
                  <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black">{{ Money::IDN(Cart::session($customer_id)->getTotal(),true) }}</strong>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <a class="btn btn-primary btn-lg py-3 btn-block" href="{{ url('/checkout') }}">Proceed To Checkout</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

