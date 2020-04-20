@php
    use Akaunting\Money\Currency;
    use Akaunting\Money\Money;
@endphp

@extends('template1.template1')

@section('content')
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{ url('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{ $product_id->product_name }}</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{ URL::to($product_id->product_image) }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h2 class="text-black">{{ $product_id->product_name }}</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, vitae, explicabo? Incidunt facere, natus soluta dolores iusto! Molestiae expedita veritatis nesciunt doloremque sint asperiores fuga voluptas, distinctio, aperiam, ratione dolore.</p>
          <p class="mb-4">Ex numquam veritatis debitis minima quo error quam eos dolorum quidem perferendis. Quos repellat dignissimos minus, eveniet nam voluptatibus molestias omnis reiciendis perspiciatis illum hic magni iste, velit aperiam quis.</p>
          <p><strong class="text-primary h4">{{ Money::IDN($product_id->product_price,true) }}</strong></p>
          <form action="{{ url('/add-cart') }}" method="post">
            <input type="hidden" value="{{ $product_id->id }}" name="id">
              {{ csrf_field() }}
            <div class="mb-2 d-flex">
                <input type="text" class="form-control" name="size" placeholder="Notes.....,">
            </div>
            <div class="mb-5">
                <div class="input-group mb-3" style="max-width: 120px;">
                <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div>
                <input type="text" class="form-control text-center" name="qty" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
            </div>

            </div>
            <p><button type="submit" class="buy-now btn btn-sm btn-primary">Add To Cart</button></p>
        </form>
        </div>
      </div>
    </div>
  </div>


@endsection

