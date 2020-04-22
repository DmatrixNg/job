<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Job</title>


        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset('style.css')}}">

        <!-- Modernizer JS -->
        <script src="{{asset('assets/js/vandor/modernizr-3.5.0.min.js')}}"></script>

    </head>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <body>
      <!-- Preloader Start -->
      <div id="fadeout" class="loader w-100 h-100 position-absolute">
        <div class="h-100 d-flex justify-content-center align-items-center">
          <div class="one circle"></div>
          <div class="two circle"></div>
        </div>
      </div>
      <!-- Preloader End -->

      <!-- Header Start -->
      <header class="position-fixed w-100">
        <nav id="active-sticky" class="navbar navbar-light navbar-expand-lg">
          <div class="container">
            <a class="navbar-brand" href="{{ url('/')}}"><img src="assets/img/logo.png" alt="rnr"></a>
            <button class="navbar-toggler navber-toggler-right" data-toggle="collapse" data-target="#navbarToggler">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
              <ul class="navbar-nav ml-auto">
                @if(Gate::allows('admin'))
                <li class="nav-item">
                  <a href="{{ url('/stores')}}" class="nav-link">Stores</a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/product_categories')}}" class="nav-link">Product categories</a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/track_delivery')}}" class="nav-link">Track delivery</a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/all_groceries')}}" class="nav-link">All groceries</a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/restaurants')}}" class="nav-link">Restaurants</a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('/admin')}}" class="nav-link">Enter Dashboard</a>
                </li>

                @endif
                @if(Gate::allows('dispatcher'))
                  <li class="nav-item">
                    <a href="{{ url('/dispatcher')}}" class="nav-link">Enter Dashboard</a>
                  </li>

                @endif

              </ul>



              @guest
              <ul class="navbar-nav ml-auto">

              <li class="nav-item">
                <a href="{{ url('/stores')}}" class="nav-link">Stores</a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/product_categories')}}" class="nav-link">Product categories</a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/track_delivery')}}" class="nav-link">Track delivery</a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/all_groceries')}}" class="nav-link">All groceries</a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/restaurants')}}" class="nav-link">Restaurants</a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/help_desk')}}" class="nav-link">Help desk</a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/checkout')}}" class="nav-link">
                <img width="30" src="{{asset('download.png')}}" alt=""><span id="count" cart="@if(json_decode(\Cookie::get('cart'), true)){{count(json_decode(\Cookie::get('cart'), true))}}@endif" class="badge badge-pill badge-danger">@if(json_decode(\Cookie::get('cart'), true)){{count(json_decode(\Cookie::get('cart'), true))}}@endif</span> </a>
              </li>

              </ul>

                <div class="pl-20">
                      <a class="btn btn-sm btn-primary rounded" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </div>
                  @if (Route::has('register'))
                    <div class="pl-20">
                          <a <a class="btn btn-sm btn-primary rounded" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                  @endif
                  @else
                    <div class="pl-20">

                    <a class="btn btn-sm btn-primary rounded" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                                </div>

              @endguest
            </div>
          </div>
        </nav>
      </header>
      <!-- Header End -->


      <!-- Featured Section Start -->
      <section class="section-ptb bg-white">
        <div class="container">
          <div class="row text-center">
            <div class="col-12" data-aos="zoom-in">
              <div class="row">

              <div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30">

              </div>
              <div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30" style="padding:30px">
                <form class="input-group text-center" action="search">
                  <input class="form-control" type="text" name="q" placeholder="Search..">
                  <div class="input-group-append">
                    <button type="submit" class="input-group-text"><i class="ti-search"></i></button>
                  </div>
                </form>
              </div>
              <div class="col-12 col-md-6 col-lg-4 mb-sm-30 mb-md-30">

              </div>
            </div>
              <div class="heading mb-50">
                <h2>Top Stores</h2>
                <hr class="line bw-2 mx-auto line-sm mb-5">
                <hr class="line bw-2 mx-auto">
              </div>
            </div>
          </div>
          <div class="row text-center">
            @foreach(\App\Vendor::where('logo','!=','')->orWhere('logo','!=',null)->get()->take(4) as $store)
            <div class="col-12 col-md-6 col-lg-3 mb-sm-30 mb-md-30" data-aos="zoom-in">
              <div class="card featured-item">
                <div class="card-body ptb-45">
                  <div class="icon circle-icon mb-30 mx-auto">
                    <img src="{{\Illuminate\Support\Str::replaceFirst('/home/codtufbi/job.codtrix.com/job/public/', '',$store->logo)}}" alt="">
                  </div>
                  <h5>{{$store->name}}</h5>
                  <p class="mb-20">{{$store->des}}</p>
                  <a class="item-link link-btn" href="{{url('/stores')}}/p/{{$store->slug}}">Enter Store</a>
                </div>
              </div>
            </div>
            <!-- Single Featured End -->
            @endforeach
            <!-- <div class="col-12 col-md-6 col-lg-3 mb-sm-30 mb-md-30" data-aos="zoom-in" data-aos-delay="400">
              <div class="card featured-item">
                <div class="card-body ptb-45">
                  <div class="icon circle-icon mb-30 mx-auto">
                    <i class="ti-lock"></i>
                  </div>
                  <h5>Security included</h5>
                  <p class="mb-20">Cicero are also reproduc heir exact original form, accompanied pani da</p>
                  <a class="item-link link-btn" href="#">Read More</a>
                </div>
              </div>
            </div> -->

          </div>
        </div>
      </section>
      <section class="section bg-white">
        <div class="container ptb-30">
          <div class="row text-center">
            <div class="col-12" data-aos="zoom-in">

              <div class="heading mb-50">
                <h2>Top sales</h2>
                <hr class="line bw-2 mx-auto line-sm mb-5">
                <hr class="line bw-2 mx-auto">
              </div>
            </div>
          </div>
          <div class="row text-center">
            @foreach(\App\Product::all()->take(8) as $prod)

            <?php
            $cart = [];
            $cart = array(
              "store" => $prod->vendorId,
       "product" => $prod->id,
       "action" => "1");
    // dd(in_array($cart, json_decode(\Cookie::get('cart'), true)));
       ?>
            <div class="col-12 col-md-6 col-lg-3 mb-sm-30 mb-md-30" data-aos="zoom-in">
              <div class="card featured-item">
                <div class="card-body ptb-45">
                  <!-- <div class="icon circle-icon mb-30 mx-auto"> -->
                    <img src="{{$prod->product_pic}}"/>
                  <!-- </div> -->
                  <h5>{{$prod->product_name}}</h5>
                  <p class="mb-20">{{$prod->product_desc}}</p>
                  <p class="mb-20">{{$prod->product_type}}</p>
                  <p class="mb-20">N{{$prod->product_price}}</p>

                @if(json_decode(\Cookie::get('cart'), true)
                && in_array($cart, json_decode(\Cookie::get('cart'), true)))
                <button id="product-{{$prod->id}}" class="item-link link-btn btn-danger" onclick="AddCart({{ $prod->vendorId }},{{$prod->id}},0)">Remove Item</a>
                @else
                  <button id="product-{{$prod->id}}" class="item-link link-btn" onclick="AddCart({{ $prod->vendorId }},{{$prod->id}},1)">Add to Cart</a>
                    @endif
                </div>
              </div>
            </div>
            <!-- Single Featured End -->
            @endforeach
            <!-- <div class="col-12 col-md-6 col-lg-3 mb-sm-30 mb-md-30" data-aos="zoom-in" data-aos-delay="400">
              <div class="card featured-item">
                <div class="card-body ptb-45">
                  <div class="icon circle-icon mb-30 mx-auto">
                    <i class="ti-lock"></i>
                  </div>
                  <h5>Security included</h5>
                  <p class="mb-20">Cicero are also reproduc heir exact original form, accompanied pani da</p>
                  <a class="item-link link-btn" href="#">Read More</a>
                </div>
              </div>
            </div> -->

          </div>
        </div>
      </section>
      <!-- Featured Section End -->

      <!-- Promo Box Start -->
      <section class="promo-area section-ptb bg-4 bg-primary">
        <div class="container ptb-30">
          <div class="row text-center">
            <div class="col-12" data-aos="zoom-in">
              <div class="heading">
                <h1 class="text-white mb-25">Restaurants</h1>
              </div>
              <div class="row text-center">

                @foreach(\App\Vendor::where("type",'restaurants')->get() as $store)
                <div class="col-12 col-md-6 col-lg-3 mb-sm-30 mb-md-30" data-aos="zoom-in">
                  <div class="card featured-item">
                    <div class="card-body ptb-45">
                      <div class="icon circle-icon mb-30 mx-auto">
                        <img src="{{\Illuminate\Support\Str::replaceFirst('/home/codtufbi/job.codtrix.com/job/public/', '',$store->logo)}}" alt="">
                      </div>
                      <h5>{{$store->name}}</h5>
                      <p class="mb-20">{{$store->des}}</p>
                      <a class="item-link link-btn" href="{{url('/stores')}}/p/{{$store->slug}}">Enter Shop</a>
                    </div>
                  </div>
                </div>
                <!-- Single Featured End -->
                @endforeach
                <!-- <div class="col-12 col-md-6 col-lg-3 mb-sm-30 mb-md-30" data-aos="zoom-in" data-aos-delay="400">
                  <div class="card featured-item">
                    <div class="card-body ptb-45">
                      <div class="icon circle-icon mb-30 mx-auto">
                        <i class="ti-lock"></i>
                      </div>
                      <h5>Security included</h5>
                      <p class="mb-20">Cicero are also reproduc heir exact original form, accompanied pani da</p>
                      <a class="item-link link-btn" href="#">Read More</a>
                    </div>
                  </div>
                </div> -->

              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Promo Box End -->
      <!-- Footer Secion Start -->
      <footer>
        <div class="footer-widget-area bg-light ptb-100">
          <div class="container">
          </div>
        </div>
      </footer>
      <!-- Footer Secion End -->

      <!-- JS Files -->
      <script src="{{asset('assets/js/vandor/jquery-3.2.1.min.js')}}"></script>
      <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('assets/js/popper.min.js')}}"></script>
      <script src="{{asset('assets/js/plugins.js')}}"></script>
      <script src="{{asset('assets/js/main.js')}}"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      <script>
      const a = jQuery.noConflict();

      function AddCart(store, p_id, action) {

        url = "{{ url('/add_cart')}}";
        //  id=id+"&act="+action;
        a.ajax({
          url: url,
          type: "Get",
          data: {
            store: store,
            product: p_id,
            action: action
          },
          dataType: "json",
          beforeSend: function() {
            let intcount = a('#count').attr('cart');
            // console.log(a('#like'+id+" button").attr('onclick','like(0,10)'));
            if (action == 1) {
              let count = ++intcount;
              a('#count').html(count);
              a('#count').attr('cart', count);
              // console.log(a('#product-' + p_id));
              a('#product-' + p_id).toggleClass('btn-danger');

              a('#product-' + p_id).attr('onclick', 'AddCart('+store+','+p_id +',0)');
              a('#product-' + p_id).html('Remove Item');
            }
            if (action == 0) {
              let count = --intcount;
              a('#count').html(count);
              if (count==0) {
                a('#count').html('');
              }
              a('#count').attr('cart', count);
              a('#product-' + p_id).removeClass('btn-danger');
              a('#product-' + p_id).attr('onclick', 'AddCart('+store+','+p_id +',1)');
              a('#product-' + p_id).html('Add to Cart');
            }
          },

        })
        .then(
          function(data) {

            console.log(data);
            // a('#like' + id).html(data.button);
            // a('#lcount'+id).html(data.count);
            // a('#lcount'+id).toggleClass('active');

          });

        }
      </script>
    </body>
</html>
