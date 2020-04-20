@php
    use Akaunting\Money\Currency;
    use Akaunting\Money\Money;
@endphp

@extends('template1.template1')

@section('content')
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{ url('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">All Product</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-9 order-2">

          <div class="row">
            <div class="col-md-12 mb-5">
              <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
              <div class="d-flex">
                <div class="dropdown mr-1 ml-md-auto">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Latest
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    @foreach ($category as $item)
                    <a class="dropdown-item" href="{{ url('/product-category/'.$item->id) }}">{{ $item->category_name }}</a>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-5">

            @foreach ($product as $item)
            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
              <div class="block-4 text-center border">
                <figure class="block-4-image">
                  <a href="{{ url('/product-detail/'.$item->id) }}"><img src="{{ $item->product_image }}" alt="Image placeholder" class="img-fluid"></a>
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="{{ url('/product-detail/'.$item->id) }}">{{ $item->product_name }}</a></h3>
                  <p class="mb-0">{{ $item->categorys->category_name }}</p>
                  <p class="text-primary font-weight-bold">{{ Money::IDN($item->product_price,true) }}</p>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>

        <div class="col-md-3 order-1 mb-5 mb-md-0">
          <div class="border p-4 rounded mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
            <ul class="list-unstyled mb-0">
                @foreach ($category as $item)
                <li class="mb-1"><a href="{{ url('/product-category/'.$item->id) }}" class="d-flex"><span class="text-uppercase">{{ $item->category_name }}</span> <span class="text-black ml-auto"></span></a></li>
                @endforeach
            </ul>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="site-section site-blocks-2">
              <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7 site-section-heading pt-4">
                  <h2>Categories</h2>
                </div>
              </div>
              <div class="row">
                  @foreach ($category as $item)
                  <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                    <a class="block-2-item" href="{{ url('/product-category/'.$item->id) }}">
                      <figure class="image">
                        <img src="{{ $item->image }}" alt="" class="img-fluid">
                      </figure>
                      <div class="text">
                        <span class="text-uppercase">Collections</span>
                        <h3 class="text-uppercase">{{ $item->category_name }}</h3>
                      </div>
                    </a>
                  </div>
                  @endforeach
              </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection

