@php
    use Akaunting\Money\Currency;
    use Akaunting\Money\Money;
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" href="{{ URL::to('auth/images/icons/favicon.ico') }}"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{asset('frontend/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">


    <link rel="stylesheet" href="{{asset('frontend/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

  </head>
  <body>

  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              {{-- <form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0 cari" placeholder="Search">
              </form> --}}
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.html" class="js-logo-clone">Shoppers</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>

                    @php
                        $customer_id = Session::get('customer_id');
                        if ($customer_id != null) {
                            $cek = DB::table('tbl_customer')->where('id',$customer_id)->first();
                            // $cart_total = LaraCart::getItems();
                            $cart_total = \Cart::session($customer_id)->getContent();
                            $cek2 = count($cart_total);
                        }
                    @endphp
                    @if ($customer_id != null)
                        <li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="icon icon-person">{{ $cek->name }}</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ url('/my-order/'.$cek->id) }}">My Order</a>
                                  <a class="dropdown-item" href="{{ url('/my-profile/'.$cek->id) }}">My Profile</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                                </div>
                              </li>
                        </li>
                    @else
                        <li><a href="{{url('/login')}}"><span class="icon icon-person"></span></a></li>
                    @endif
                  <li>
                    <a href="{{ url('/cart') }}" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      @if ($customer_id == null)
                        <span class="count">0</span>
                      @else
                        <span class="count">@php
                            echo $cek2;
                        @endphp</span>
                      @endif
                    </a>
                  </li>
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="active">
              <a href="{{ url('/') }}">Home</a>
            </li>
            <li>
              <a href="{{ url('/about') }}">About</a>
            </li>
            <li><a href="{{ url('/all-product') }}">Shop</a></li>
          </ul>
        </div>
      </nav>
    </header>

    @yield('jumbotron')


    @yield('content')

    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Category</h3>
              </div>

              @php
                  $category = DB::table('tbl_category')->get();
              @endphp

              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                    @foreach ($category as $item)
                    <li><a href="{{ url('/product-category/'.$item->id) }}">{{ $item->category_name }}</a></li>
                    @endforeach
                </ul>
              </div>


            </div>
          </div>
          <div class="col-md-8 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Contact Info</h3>
            <a href="#" class="block-6">
              <img src="{{URL::to('frontend/images/mee.jpg')}}" alt="Image placeholder" class="img-fluid rounded mb-4">
              <h3 class="font-weight-light  mb-0">Dendy Juliano Juanda</h3>
              <p>  Birthday 23 &mdash; 07, 2003</p>
            </a>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4"></h3>
              <ul class="list-unstyled">
                <li class="address">Indonesia,jl.Wiradikusumah Rt.02 Rw12 Cigadung</li>
                <li class="phone"><a href="tel://087797824107">+627797824107</a></li>
                <li class="email">dendyjuliano2019@gmail.com</li>
              </ul>
            </div>

          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; Created <i class="icon-heart" aria-hidden="true"></i> by <a href="https://github.com/dendyjuliano" target="_blank" class="text-primary">Dendy</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </div>
    </footer>
  </div>

  <script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery-ui.js')}}"></script>
  <script src="{{asset('frontend/js/popper.min.js')}}"></script>
  <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('frontend/js/aos.js')}}"></script>

  <script src="{{asset('frontend/js/main.js')}}"></script>

  <script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>

  </body>
</html>
