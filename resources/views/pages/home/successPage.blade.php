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
        <div class="col-md-12 mb-0"><a href="{{ url('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Success</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <span class="icon-check_circle display-3 text-success"></span>
          <h2 class="display-3 text-black">Thank you!</h2>
          <p class="lead mb-5">You order was successfuly completed.</p>
          <p><a href="{{ url('/all-product') }}" class="btn btn-sm btn-primary">Back to shop</a></p>
        </div>
      </div>
    </div>
  </div>
@endsection

