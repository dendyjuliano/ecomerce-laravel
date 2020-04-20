@php
    use Akaunting\Money\Currency;
    use Akaunting\Money\Money;
@endphp

@extends('template1.template1')

@section('jumbotron')
 <div class="site-blocks-cover" style="background-image: url({{URL::to('frontend/images/hero_1.jpg')}});" data-aos="fade">
      <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
            <h1 class="mb-2">Finding Your Perfect Shoes</h1>
            <div class="intro-text text-center text-md-left">
              <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla. </p>
              <p>
                <a href="{{ url('/all-product') }}" class="btn btn-sm btn-primary">Shop Now</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('content')
<div class="site-section site-section-sm site-blocks-1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Free Shipping</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Free Returns</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Customer Support</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    @if (count($category) != 0)
    <div class="site-section site-blocks-2">
      <div class="container">
        <div class="row">
        @foreach ($category as $row)
        <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
          <a class="block-2-item" href="{{ url('/product-category/'.$row->id) }}">
            <figure class="image">
              <img src="{{ $row->image }}" alt="" class="img-fluid">
            </figure>
            <div class="text">
              <span class="text-uppercase">Collections</span>
              <h3>{{ $row->category_name }}</h3>
            </div>
          </a>
        </div>
        @endforeach
        </div>
      </div>
    </div>
    @endif

    @if (count($product) != 0)
    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
            @foreach ($product as $row)
            <div class="item">
              <div class="block-4 text-center">
                <a href="{{ url('/product-detail/'.$row->id) }}">
                    <figure class="block-4-image">
                    <img src="{{ $row->product_image }}" alt="Image placeholder" class="img-fluid">
                    </figure>
                    <div class="block-4-text p-4">
                    <h3><a href="#">{{ $row->product_name }}</a></h3>
                    <p class="mb-0">{{ $row->categorys->category_name }}</p>
                    <p class="text-primary font-weight-bold">{{ Money::IDN($row->product_price,true) }}</p>
                    </div>
                </a>
              </div>
            </div>
            @endforeach
            </div>
            <div class="text-center">
                <a href="{{ url('/all-product') }}"><h4>See All</h4></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
@endsection
