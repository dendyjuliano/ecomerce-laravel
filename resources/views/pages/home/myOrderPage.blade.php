@php
    use Akaunting\Money\Currency;
    use Akaunting\Money\Money;
@endphp

@extends('template1.template1')

@section('content')

<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{ url('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">My Order</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
        <h1>My Order</h1>
      <div class="row mb-5">
          <div class="site-blocks-table col-md-12">
            <ul class="list-unstyled">
                @foreach ($transaction as $item)
                <li class="media">
                    <img src="{{ URL::to($item->rl_product->product_image) }}" width="150" class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">{{ $item->rl_product->product_name }}</h5>
                        <p>Quantity : {{ $item->quantity }}
                            @if ($item->rl_shipping->on_packaging == null)
                            <br> On Packaging
                            @elseif($item->rl_shipping->on_packaging == 1)
                            <br> On Delivery
                            @elseif( $item->rl_shipping->on_delivery == 1)
                            <br> Success
                            @endif
                        </p>
                        <button class="btn btn-success">Price : {{Money::IDN($item->price,true) }}</button>
                    </div>
                </li>
                <br>
                @endforeach
              </ul>
          </div>
      </div>
    </div>
  </div>
@endsection

